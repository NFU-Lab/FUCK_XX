<?php

/*
用户登录页面
*/

define('ACC', true);
require('./include/init.php');


$u = strval($_POST['username'] ?? '');
$p = strval($_POST['passwd'] ?? '');

//合法性检测

//核对用户名密码
$user = new UserModel();
$row = $user->checkUser($u, $p);
if (empty($row)) {
	$resp["msg"] = '用户名密码错误';
	$resp["code"] = 403;
} else {
	$resp["msg"] = '登陆成功';
	$resp["code"] = 200;
	$_SESSION["FPHPX"] = true;
	$_SESSION = $row;
}

echo $resp;
