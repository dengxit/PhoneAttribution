<?php

require "autoload.php";

$params = $_POST;

$phone = isset($_POST['tel']) ? $_POST['tel'] : null;

$info = app\MobileQuery::queryPhone($phone);
$data = [];
if($info){
	$data = $info;
	$data['code'] = 200;
	$data['tel'] = $phone;
}else{
	$data['msg'] = '号码不正确';
	$data['code'] = 400;
}

echo json_encode($data);
