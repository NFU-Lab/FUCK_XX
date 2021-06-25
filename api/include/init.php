<?php
/*
作用:框架初始化
*/

// 初始化当前的绝对路径
define('ROOT', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('DEBUG', true);

require ROOT . 'include/helper.php';
require ROOT . '/vendor/autoload.php';
require ROOT . '/include/init_database.php';

//开启session
session_start();

// 设置报错级别
if (defined('DEBUG')) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}
