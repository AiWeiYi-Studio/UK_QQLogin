<?php

header("Content-type: text/html; charset=utf-8"); 
if(empty($_GET['token']) || $_GET['token'] == ""){
	exit('{"code":-1,"msg":"请输入有效的token！"}');
}
include "includes/common.php";

$token = $_GET['token'];

$row=$DB->get_row("select * from qqlogin_site where token='$token' limit 1");
if(!$row){
	exit('{"code":-1,"msg":"请输入有效的token！"}');
}
if($row['active'] = 0){
	exit('{"code":-1,"msg":"您的秘钥已被管理员禁止！"}');
}
$callback = $row['callback'];
?>
<html>
<head>
<title>QQ登录</title>
</head>
<?php
require_once("includes/QC.conf.php");
require_once("includes/QC.class.php");
if($callback != ""){
$urlCookie = base64_encode($callback);
setcookie("Moleft_QQLogin_CallBack",$urlCookie);
$QC=new QC($QC_config);
$QC->qq_login();
}
else{
exit('{"code":-1,"msg":"您还未填写回调地址！"}');
}
?>
</html>