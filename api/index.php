<?php
header("Content-type:application/json");

require './include/init.php';

// 判断一波请求方式, 不是post直接拒绝好了
var_dump(strtolower($_SERVER['REQUEST_METHOD']));
//if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
//    exit(failResponse('Only POST', 403));
//}

/*
路由文件，通过识别路由进行不同的控制器处理
*/
$router = $_SERVER['REQUEST_URI']; // 获取当前的路由


if (strpos($router, '/admin/') !== false) {

    if ($router != "/admin/login") {
        if (empty($_SESSION["LOGIN"])) {
            exit(failResponse('Please Login', 401));
        }
    }

    // 后台路由
    switch ($router) {
        case '/admin/login':
            require_once("./controller/admin_login.php");
            break;
        case '/admin/test':
            exit('test');
            break;
    }
} elseif (strpos($router, '/api/') !== false) {
    // 前台路由
    switch ($router) {
        case '/api/register':
            require_once("./controller/api_register.php");
            break;
    }
}

exit(failResponse('Page Not Found', 404));

