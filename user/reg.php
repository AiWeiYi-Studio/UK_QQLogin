<?php
/**
 * 用户注册
**/
include("../includes/common.php");
$title='用户注册';
if($conf['regrepair']==0){
include("../template/page/close/index.php");
	exit;
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?php echo $conf['title']?> -  <?=$title?></title>
  <link rel="icon" href="../assets/imgs/favicon.ico" type="image/ico">
  <meta name="keywords" content="<?php echo $conf['keywords']; ?>"/>
  <meta name="description" content="<?php echo $conf['description']; ?>"/>
  <link href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/appui/css/main.css">
  <link rel="stylesheet" href="../assets/appui/css/themes.css">
  <script src="//cdn.staticfile.org/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="//cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
  <script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../assets/appui/js/plugins.js"></script>
  <script src="../assets/appui/js/app2.js"></script>
    <script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.staticfile.org/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<img src="<?php echo $conf['ubjapi']?>" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow">
<div id="login-container">
<h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
<i class="fa fa-cloud"></i> <strong><?php echo $conf['title'] ?></strong>
</h1>
<div class="block animation-fadeInQuickInv">
<div class="block-title">
<div class="block-options pull-right">
<a href="./login.php" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="返回登录"><i class="fa fa-user"></i></a>
</div>
<h2>用户注册</h2>
</div>

<form action="./reg.php" method="POST" role="form" class="form-horizontal">

<div class="form-group">
<div class="col-xs-12">
<input type="text" name="user" class="form-control" maxlength="16" placeholder="输入登录用户名"/>
</div></div>
			
<div class="form-group">
<div class="col-xs-12">
<input type="password" name="pass" class="form-control" maxlength="16" placeholder="输入6~16位登录密码"/>
</div></div>

<div class="form-group">
<div class="col-xs-12">
<input type="text" name="qq" class="form-control" onkeyup="this.value=this.value.replace(/\D/g,'')" maxlength="10" placeholder="输入您的联系QQ号"/>
</div></div>

<div class="form-group">
<div class="col-xs-12">
<input type="text" name="name" class="form-control" maxlength="16" placeholder="输入您的昵称"/>
</div></div>


<div class="input-group">
<input type="text" class="form-control input-lg" name="code" onkeyup="this.value=this.value.replace(/\D/g,'')" maxlength="4" placeholder="输入验证码" autocomplete="off" required>
<span class="input-group-addon" style="padding: 0">
<img src="../includes/code.php?r=<?php echo time();?>"height="43"onclick="this.src='../includes/code.php?r='+Math.random();" title="点击更换验证码">
</span>
</div><br/>
                    <div class="form-group form-actions">
                        <div class="col-xs-8">
                            <label class="csscheckbox csscheckbox-primary">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> 确定注册?
                            </label>
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-sm btn-success">注册</button>
                        </div>
                    </div>
                </form>
                <hr>
<div class="push text-center">- Auth -</div>
<div class="row push">
<div class="col-xs-6">
<a href="./login.php" class="btn btn-effect-ripple btn-sm btn-info btn-block"><i class="fa fa-user"></i> 返回登录</a>
</div>
<div class="col-xs-6">
<a href="./social.php" class="btn btn-effect-ripple btn-sm btn-primary btn-block"><i class="fa fa-qq"></i> 快捷ＱＱ登录</a>
</div>
</div>
</div>
<footer class="text-muted text-center animation-pullUp">
<small>&copy; <a href="/" target="_blank"><?php echo $conf['title'] ?></a></small>
</footer>
</div>
<?php
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['qq']) && isset($_POST['name'])){
$user=daddslashes($_POST['user']);
$pass=daddslashes($_POST['pass']);
$qq=daddslashes($_POST['qq']);
$name=daddslashes($_POST['name']);
$code=daddslashes($_POST['code']);
if($user==NULL or $pass==NULL or  $qq==NULL or $name==NULL){
exit ("<script language='javascript'>alert('注册失败，请不要留空！');window.location.href='./reg.php';</script>");
}elseif(!$code || strtolower($_SESSION['ukyun_code'])!=strtolower($code)){
exit ("<script language='javascript'>alert('注册失败，验证码错误！');window.location.href='./reg.php';</script>");
}
$sql="insert into `qqlogin_daili` (`user`, `pass`, `qq`, `active`, `number`, `name`, `boss`) values ('".$user."','".$pass."','".$qq."','1','".$conf['number']."','".$name."','0')";
}
?>
<?php
$rows=$DB->get_row("select * from qqlogin_daili where user='$user' limit 1");
$row=$DB->get_row("select * from qqlogin_daili where qq='$qq' limit 1");
if($rows){
exit ("<script language='javascript'>alert('注册失败，用户名已存在！');window.location.href='./reg.php';</script>");
}elseif($row){
exit ("<script language='javascript'>alert('注册失败，绑定QQ已被使用！');window.location.href='./reg.php';</script>");
}elseif($DB->query($sql)){
$city=get_ip_city($clientip);
$DB->query("insert into `qqlogin_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','注册账号','".$date."','".$city."','IP：".$clientip."QQ：".$qq."账号：".$user."')");
exit("<script language='javascript'>alert('注册成功，返回登录！');window.location.href='./login.php';</script>");
}
?>
</body>
</html>