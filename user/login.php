<?php
/**
 * 登录
**/
$mod='blank';
include("../includes/common.php");
if(isset($_POST['user']) && isset($_POST['pass'])){ 
	$user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
	$code=daddslashes($_POST['code']);
	$row = $DB->get_row("SELECT * FROM qqlogin_daili WHERE user='$user' limit 1");
    if(!$code || strtolower($_SESSION['ukyun_code'])!=strtolower($code)){
       exit ("<script language='javascript'>alert('登录失败，验证码错误！');history.go(-1)</script>");
	}elseif($row['user']=='') {
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('此用户不存在');history.go(-1);</script>");
	}elseif ($pass != $row['pass']) {
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('用户名或密码不正确！');history.go(-1);</script>");
	}elseif($row['active']==0){
		$city=get_ip_city($clientip);
		$DB->query("insert into `qqlogin_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','封禁账号申请登录','".$date."','".$city."','IP:".$clientip."')");
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('账号已封禁,请联系客服！');history.go(-1);</script>");
		}elseif($row['user']==$user && $row['pass']==$pass){
		$session=md5($user.$pass.$password_hash);
		$token=authcode("{$user}\t{$session}", 'ENCODE', UKYUN);
		setcookie("auth_token2", $token, time() + 604800);
		$_SESSION['auth']=true;
		@header('Content-Type: text/html; charset=UTF-8');
		$city=get_ip_city($clientip);
		$DB->query("UPDATE qqlogin_daili SET last='$date' WHERE uid='{$row['uid']}'");
		$DB->query("UPDATE qqlogin_daili SET lastip='$clientip' WHERE uid='{$row['uid']}'");
		$DB->query("UPDATE qqlogin_daili SET city='$city' WHERE uid='{$row['uid']}'");
		if($row['ip']=='' or $row['ip']==NULL){
		$DB->query("UPDATE qqlogin_daili SET ip='$clientip' WHERE uid='{$row['uid']}'");
		}
		$DB->query("insert into `qqlogin_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','登陆用户后台','".$date."','".$city."','IP:".$clientip."')");
		exit("<script language='javascript'>alert('恭喜你登录成功啦！');window.location.href='./';</script>");
	}
}elseif(isset($_GET['logout'])){
	setcookie("auth_token2", "", time() - 604800);
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已成功注销本次登陆！');window.location.href='./login.php';</script>");
}elseif($islogins==1){
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已登陆！');window.location.href='./';</script>");
}
?>
<?php
include("./includes/common.php");
if ($conf['userloginmuban'] && file_exists("./template/index/{$conf['userloginmuban']}/index.php")){
	$template = $conf['userloginmuban'];
	
}else{
	$template = "user_ukyun";
}
include("../template/login/{$template}/index.php");
?>