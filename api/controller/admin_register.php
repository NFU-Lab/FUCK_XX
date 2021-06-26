<?php

use Illuminate\Database\Capsule\Manager as DB;

$u = strval($_POST['username'] ?? '');
$p = strval($_POST['password'] ?? '');

//合法性检测

//核对用户名密码

$password = $result = md5(md5($p) . $salt);


$user = DB::table('admin')->where(array('username' => $u))->first();
if (empty($user)) {
    if (DB::table('admin')->insert(array("username" => $u, "password" => $password))) {
        exit(successResponse());
    } else {
        exit(failResponse("admin register failed"));
    }
} else {
    exit(failResponse("admin already exist"));
}