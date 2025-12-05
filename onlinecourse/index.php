<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| PATH CONSTANTS
|--------------------------------------------------------------------------
*/
define('ROOT_PATH', __DIR__);
define('CONFIG_PATH', ROOT_PATH . '/config');
define('CONTROLLER_PATH', ROOT_PATH . '/controllers');
define('MODEL_PATH', ROOT_PATH . '/models');
define('VIEW_PATH', ROOT_PATH . '/views');   // FIXED: VIEW_PATH luôn tồn tại

/*
|--------------------------------------------------------------------------
| AUTOLOAD DATABASE & CONFIG
|--------------------------------------------------------------------------
*/
require_once CONFIG_PATH . '/Database.php';

/*
|--------------------------------------------------------------------------
| BASE URL DETECTION (CHUẨN)
|--------------------------------------------------------------------------
*/
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$base_dir = rtrim($base_dir, '/');

define('BASE_URL', $protocol . "://" . $host . $base_dir);

/*
|--------------------------------------------------------------------------
| CLEAN REQUEST URI
|--------------------------------------------------------------------------
*/
// Lấy request URI nhưng bỏ query string
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Loại bỏ base directory khỏi URI
if ($base_dir !== '' && strpos($request_uri, $base_dir) === 0) {
    $request_uri = substr($request_uri, strlen($base_dir));
}

$request_uri = trim($request_uri, '/');

// Nếu rỗng → mặc định /home/index
if ($request_uri === '') {
    $request_uri = 'home/index';
}

/*
|--------------------------------------------------------------------------
| PHÂN TÍCH ROUTE
|--------------------------------------------------------------------------
*/

// Hỗ trợ cả query string (?controller=auth&action=login) và clean URL (/auth/login)
if (isset($_GET['controller']) && isset($_GET['action'])) {
    // Query string style: ?controller=auth&action=login
    $controller_name = ucfirst($_GET['controller']) . 'Controller';
    $action_name = $_GET['action'];
} else {
    // Clean URL style: /auth/login
    $parts = explode('/', $request_uri);
    $controller_name = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'HomeController';
    $action_name = $parts[1] ?? 'index';
    
    // Lấy param nếu có: /course/detail/5
    if (!empty($parts[2])) {
        $_GET['id'] = $parts[2];
    }
}

/*
|--------------------------------------------------------------------------
| LOAD CONTROLLER
|--------------------------------------------------------------------------
*/
$controller_file = CONTROLLER_PATH . '/' . $controller_name . '.php';

if (file_exists($controller_file)) {

    require_once $controller_file;

    if (!class_exists($controller_name)) {
        http_response_code(500);
        die("500 Error: Controller class '{$controller_name}' not found.");
    }

    $controller = new $controller_name();

    if (!method_exists($controller, $action_name)) {
        http_response_code(404);
        die("404 Not Found: Action '{$action_name}' not found.");
    }

    // RUN ACTION
    $controller->$action_name();
    exit;
}

/*
|--------------------------------------------------------------------------
| FALLBACK CHO AUTH CONTROLLER (nếu cần)
|--------------------------------------------------------------------------
*/
if ($controller_name === "AuthController") {

    require_once CONTROLLER_PATH . "/AuthController.php";
    $ctl = new AuthController();

    switch ($action_name) {
        case "loginPage": $ctl->loginPage(); break;
        case "login": $ctl->login(); break;
        case "logout": $ctl->logout(); break;
        default: echo "Không tìm thấy action trong AuthController"; break;
    }

    exit;
}

/*
|--------------------------------------------------------------------------
| 404 MẶC ĐỊNH
|--------------------------------------------------------------------------
*/
http_response_code(404);
echo "404 Not Found: Controller '{$controller_name}.php' not found.";
?>
