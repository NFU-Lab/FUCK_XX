<?php

use Illuminate\Database\Capsule\Manager as DB;

$u = strval($_POST['username'] ?? '');
$p = strval($_POST['password'] ?? '');

//合法性检测

//核对用户名密码

$password = $result = md5(md5($p) . $salt);

$user = DB::table('admin')->where('username', $u)->first();

//var_dump($user);

if (empty($user) || $user->password != $password) {
    exit(failResponse('username or password is not found!', 401));
}

$_SESSION["LOGIN"] = true;
$_SESSION['USERNAME'] = $u;

exit(successResponse());