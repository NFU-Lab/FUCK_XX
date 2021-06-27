<?php
/*
作用:框架初始化
*/

$origin = $_SERVER['HTTP_ORIGIN'] ?? '*';
header('Access-Control-Allow-Origin:' . $origin); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
ini_set('session.cookie_samesite', 'None');
// 初始化当前的绝对路径
define('ROOT', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('DEBUG', true);

require ROOT . 'include/helper.php';
require ROOT . '/vendor/autoload.php';
require ROOT . '/include/init_database.php';
$salt = 'yyds';
//开启session
session_start();

// 设置报错级别
if (defined('DEBUG')) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}
