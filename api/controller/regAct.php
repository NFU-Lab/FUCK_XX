<?php

/*
regAct.php

接收用户注册的表单信息，完成注册
*/

define('ACC', true);
require('../include/init.php');
header("Content-type:application/json");

$user = new UserModel();


/*
调用自动检验

*/
if (!$user->_validate($_POST)) {
	$resp["msg"] = implode('<br />', $user->getErr());
	$resp["code"] = 400;
	echo $resp;
	exit;
}

/*
检验用户名是否已存在
*/
if ($user->checkuser($_POST['username'])) {
	$resp["msg"] = "用户名已存在！";
	$resp["code"] = 400;
	echo $resp;
	exit;
}




// 调用自动填充
$data = $user->_autoFill($_POST);

$data = $user->_facade($data);  //自动过滤

$resp["code"] = 200;
if ($user->reg($data)) {
	$msg = '用户注册成功';
} else {
	$msg = '注册失败，请重新注册';
}

// 返回resp
echo $resp;
