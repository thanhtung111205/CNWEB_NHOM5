<?php
$controller = $_GET["controller"] ?? "auth";
$action = $_GET["action"] ?? "loginPage";

switch ($controller) {

    case "auth":
        require "./controllers/AuthController.php";
        $ctl = new AuthController();

        if ($action == "loginPage") $ctl->loginPage();
        if ($action == "login") $ctl->login();
        if ($action == "logout") $ctl->logout();
        break;
    default:
        echo "Không tìm thấy controller";
        break;
    // các controller khác...
}