<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__);
define('CONFIG_PATH', ROOT_PATH . '/config');
define('CONTROLLER_PATH', ROOT_PATH . '/controllers');
define('MODEL_PATH', ROOT_PATH . '/models');
define('VIEW_PATH', ROOT_PATH . '/views');

// Tự động detect base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$script_name = dirname($_SERVER['SCRIPT_NAME']);
define('BASE_URL', $protocol . "://" . $host . $script_name);

// XỬ LÝ ROUTE
$request_uri = trim($_SERVER['REQUEST_URI'], '/');

// Tách query string
$query_string = '';
if (strpos($request_uri, '?') !== false) {
    list($request_uri, $query_string) = explode('?', $request_uri, 2);
    parse_str($query_string, $_GET);
}

// Loại bỏ base path: BaiTH_Nhom5/onlinecourse hoặc onlinecourse
$possible_bases = ['BaiTH_Nhom5/onlinecourse', 'onlinecourse'];
foreach ($possible_bases as $base) {
    if (strpos($request_uri, $base) === 0) {
        $request_uri = trim(substr($request_uri, strlen($base)), '/');
        break;
    }
}

// Nếu request_uri rỗng, set về home
if (empty($request_uri)) {
    $request_uri = 'home/index';
}

$parts = explode('/', $request_uri);

// Controller
$controller_name = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'HomeController';

// Action
$action_name = $parts[1] ?? 'index';

// Param (vd: /course/detail/5) - nếu có thì đưa vào $_GET['id']
if (isset($parts[2]) && !empty($parts[2])) {
    $_GET['id'] = $parts[2];
}

$controller_file = CONTROLLER_PATH . '/' . $controller_name . '.php';

if (file_exists($controller_file)) {
    require_once $controller_file;

    if (class_exists($controller_name)) {
        $controller = new $controller_name();

        if (method_exists($controller, $action_name)) {
            // Gọi action, các param đã được set vào $_GET
            $controller->$action_name();

        } else {
            http_response_code(404);
            echo "404 Not Found: Action '{$action_name}' not found.";
        }

    } else {
        http_response_code(500);
        echo "500 Error: Controller class '{$controller_name}' not exists.";
    }

} else {
    http_response_code(404);
    echo "404 Not Found: Controller file '{$controller_name}.php' not found.";
}
?>
