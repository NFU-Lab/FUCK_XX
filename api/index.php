<?php
/*
路由文件，通过识别路由进行不同的控制器处理
*/
require('./include/init.php');
header("Content-type:application/json");
$session = $_SESSION["FPHPX"];
$router = $_POST("router"); // 获取当前的路由

// 身份校验
if (!($router == "login" || $router == "register")) {
    if (!(isset($_SESSION["FPHPX"]) && $_SESSION["FPHPX"] === true)) {
        $_SESSION["FPHPX"] = false;
        $resp["code"] = 403;
        $resp["msg"] = "Forbidden";
        exit;
    }
}

// 处理路由
switch ($router) {
    case 'index':
        require_once("./controller/index.php");
        break;
    case 'login':
        require_once("./controller/login.php");
        break;
    case 'register':
        require_once("./controller/regAct.php");
    default:
        $resp["code"] = 404;
        $resp["msg"] = "Page Not Found";
        echo $resp;
        break;
}
