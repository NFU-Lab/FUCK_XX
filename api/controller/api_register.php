<?php

use Illuminate\Database\Capsule\Manager as DB;

$u = strval($_POST['username'] ?? '');
$p = strval($_POST['password'] ?? '');

//合法性检测

//核对用户名密码

$salt = 'fuck';

$password = $result = md5(md5($p) . $salt);


$user = DB::table('user')->where(array('username' => $u))->first();
if (empty($user)) {
    if (DB::table('user')->insert(array("username" => $u, "password" => $p))) {
        exit(successResponse());
    } else {
        exit(failResponse("user register failed"));
    }
} else {
    exit(failResponse("user already exist"));
}