<?php
header("Content-type:application/json");

require './include/init.php';

// 判断一波请求方式, 不是post直接拒绝好了
if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
    exit(failResponse('Only POST', 403));
}

/*
路由文件，通过识别路由进行不同的控制器处理
*/
$router = $_SERVER['REQUEST_URI']; // 获取当前的路由


if (strpos($router, '/admin/') !== false) {

    if (!($router == "/admin/login" || $router == "/admin/register")) {
        if (empty($_SESSION["LOGIN"])) {
            exit(failResponse('Please Login', 401));
        }
    }

    // 后台路由
    switch ($router) {
        case '/admin/login':
            require_once("./controller/admin_login.php");
            break;
        case '/admin/register':
            require_once("./controller/admin_register.php");
            break;
        case '/admin/status_list':
            require_once("./controller/class_status.php");
            break;
        case '/admin/upload':
            require_once("./controller/upload_student_list.php");
            break;
        case '/admin/change_status':
            require_once("./controller/change_checkout_status.php");
            break;
        case '/admin/class_list':
            require_once("./controller/class_list.php");
            break;
        case '/admin/new_list':
            require_once("./controller/new_class.php");
            break;
        case '/admin/stu_list':
            require_once("./controller/get_class_list.php");
            break;
    }
}

exit(failResponse('Page Not Found', 404));

