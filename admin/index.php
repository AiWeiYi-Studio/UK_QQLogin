<?php
/**
 * 后台管理
**/
include("../includes/common.php");
$title='平台首页';
if($islogin==1){}else exit("<script language='javascript'>alert('您还未登录,请先登录才能进入！');window.location.href='./login.php';</script>");
include './head.php';
?>
<?php
$juzi = 'https://api.ukyun.cn/yan/api.php';
$juzis = file_get_contents($juzi); 
$uplog = 'http://qqauth.ukyun.cn/api/uplog.php';
$uplogs = file_get_contents($uplog); 
$notice = 'http://qqauth.ukyun.cn/api/notice.php';
$notices = file_get_contents($notice); 
$advertisement = 'http://qqauth.ukyun.cn/api/advert.php';
$advertisements = file_get_contents($advertisement); 
$ver = 'http://qqauth.ukyun.cn/api/ver.php';
$vers = file_get_contents($ver); 
$paycheck = 'http://qqauth.ukyun.cn/api/paycheck.php?url=http://'.$_SERVER['HTTP_HOST'].'/';
$paychecks = file_get_contents($paycheck); 
$paycheckss=json_decode($paychecks,true);
$dailis=$DB->count("SELECT count(*) from qqlogin_daili");
$users=$DB->count("SELECT count(*) from qqlogin_user");
$sites=$DB->count("SELECT count(*) from qqlogin_site");
$logs=$DB->count("SELECT count(*) from qqlogin_log");
$logss=$DB->count("SELECT count(*) from qqlogin_logs");
if($udata['uid']==1){
$powers='全能站长';       
}elseif($udata['power']==1){
$powers='副站长';
}elseif($udata['power']==2){
$powers='合作商';
}
if($udata['access_token']==''){
$kuaijie="<a href='./binding.php'>未绑定（点击绑定）</a>";
}elseif($udata['access_token'] !==''){
$kuaijie="<a href='./binding.php?jiebang'>已绑定（点击解绑）</a>";
}
if($_SESSION['connet']!=true){
if(file_get_contents('http://qqauth.ukyun.cn/')){//服务器系统
$connect='<font color="green">连接正常</font> <a href="http://qqauth.ukyun.cn/" class="btn btn-xs btn-info">点此访问授权站</a>';
$_SESSION['connet']==true;//防止过多访问造成卡顿
}else{
$connect='<font color="red">连接失败</font> <a href="http://qqauth.ukyun.cn/" class="btn btn-xs btn-info">点此访问授权站</a>';
$webauth='1';
$_SESSION['connet']==true;//防止过多访问造成卡顿 直接结束
}
}
if($_SESSION['connet']!=true){
if(file_get_contents('https://api.ukyun.cn/')){//服务器系统
$connect2='<font color="green">连接正常</font> <a href="https://api.ukyun.cn/" class="btn btn-xs btn-info">点此访问API站</a>';
$_SESSION['connet']==true;//防止过多访问造成卡顿
}else{
$connect2='<font color="red">连接失败</font> <a href="https://api.ukyun.cn/" class="btn btn-xs btn-info">点此访问API站</a>';
$_SESSION['connet']==true;//防止过多访问造成卡顿 直接结束
}
}
if($_SESSION['connet']!=true){
if(file_get_contents('https://api.ukyun.cn/qqlogin/')){//服务器系统
$connect3='<font color="green">连接正常</font> <a href="https://api.ukyun.cn/qqlogin/" class="btn btn-xs btn-info">点此访问资源站</a>';
$_SESSION['connet']==true;//防止过多访问造成卡顿
}else{
$connect3='<font color="red">连接失败</font> <a href="https://api.ukyun.cn/qqlogin/" class="btn btn-xs btn-info">点此访问资源站</a>';
$ukyun1==1;
$_SESSION['connet']==true;//防止过多访问造成卡顿 直接结束
}
}
if($_SESSION['connet']!=true){
if(file_get_contents('http://45.158.22.9/')){//服务器系统
$connect4='<font color="green">连接正常</font> <a href="http://45.158.22.9/" class="btn btn-xs btn-info">点此访问UK云服务器</a>';
$_SESSION['connet']==true;//防止过多访问造成卡顿
}else{
$connect4='<font color="red">连接失败</font> <a href="http://45.158.22.9/" class="btn btn-xs btn-info">点此访问UK云服务器</a>';
$_SESSION['connet']==true;//防止过多访问造成卡顿 直接结束
}
}
if($_SESSION['update']!=true){
	$update=file_get_contents('http://qqauth.ukyun.cn/api/check.php?url='.$_SERVER['HTTP_HOST']."&authcode=".$authcode."&ver=".VERSION);//获得json返回信息
	$url='http://qqauth.ukyun.cn/api/check.php?url='.$_SERVER['HTTP_HOST']."&authcode=".$authcode."&ver=".VERSION;
	$query=json_decode($update,true);//json解析
	if($query['code']=='1'){//有新版本
		$up='<font color="red">系统有新版本哟！ <a href="./update.php">点我更新</a></font>';
		$_SESSION['update']==true;//防止过多访问造成卡顿 有新版本
	}elseif($query['code']=='0'){
		$up='<font color="green">系统已是最新版本！</font>';
        $_SESSION['update']==true;//防止过多访问造成卡顿 直接结束
	}elseif($query['code']=='-1'){
		$up='很抱歉，未授权用户不可更新，如需购买正版请联系QQ：2874992246！';
		$_SESSION['update']==true;//防止过多访问造成卡顿 直接结束
	}else{
        $up='<font color="red">系统无法连接到授权站，请检查！</font>';
        $_SESSION['connet']==true;//防止过多访问造成卡顿 直接结束
	}
}
?>

<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<div class="block">
<div class="block-title"><h3 class="panel-title">后台首页</h3></div>
<ul class="list-group">
<li class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <b>统计：</b>站长:<?=$users?>个,用户:<?=$dailis?>个,分发:<?=$sites?>个,日志:<?=$logs+$logss?>条</li>
<li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>时间：</b> <?=$date?></li>
<li class="list-group-item"><span class="glyphicon glyphicon-envelope"></span> <b>权限：</b><?=$powers?></li>
<li class="list-group-item"><span class="fa fa-calendar sidebar-nav-icon"></span> <b>名言：</b> <?=$juzis?></li>
<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> <b>快捷：</b><?=$kuaijie?></li>
<li class="list-group-item"><span class="glyphicon glyphicon-list"></span> <b>菜单：</b> 
<a href="./user.php" class="btn btn-xs btn-success">站长管理</a>
<a href="./ulist.php" class="btn btn-xs btn-success">用户管理</a>
<a href="./update.php" class="btn btn-xs btn-success">系统更新</a>
<a href="./info.php" class="btn btn-xs btn-danger">修改密码</a>
</div>

<div class="panel panel-info">
<ul class="nav nav-tabs">
<li class="active"><a href="#tz" data-toggle="tab">用户通知</a></li>
<li><a href="#text" data-toggle="tab">系统信息</a></li>
<li><a href="#safe" data-toggle="tab">安全中心</a></li>
<li><a href="#notice" data-toggle="tab">官方通知</a></li>
<?php
if ($paycheckss['code']==-1) {
echo'<li><a href="#advertisement" data-toggle="tab">官方广告</a></li>';
}
?>
<li><a href="#ukyun" data-toggle="tab">相关人员</a></li>
<li><a href="#uplog" data-toggle="tab">更新日志</a></li>
<li><a href="#cloud" data-toggle="tab">云端状态</a></li>
</ul>
<div class="modal-body">
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade in active" id="tz">
<ul class="list-group">
<li class="list-group-item"></b></span>
<?php echo $conf['tz']?>
</div>

<div class="tab-pane fade in" id="uplog">
<ul class="list-group">
<li class="list-group-item"></b></span>
<?=$uplogs?>
</div>

<div class="tab-pane fade in" id="notice">
<ul class="list-group">
<li class="list-group-item"></b></span>
<?=$notices?>
</div>

<div class="tab-pane fade in" id="advertisement">
<ul class="list-group">
<li class="list-group-item"></b></span>
<?=$advertisements?>
</div>

<div class="tab-pane fade in" id="text">
<ul class="list-group">
<li class="list-group-item"><b>PHP 版本：</b><?php echo phpversion() ?><?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?></li>
<li class="list-group-item"><b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?></li>		
<li class="list-group-item"><b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s</li>
<li class="list-group-item"><b>POST许可：</b><?php echo ini_get('post_max_size'); ?></li>
<li class="list-group-item"><b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?></li>
<li class="list-group-item"><b>数据库当前版本：</b><?php echo SQLVER ?></li>
<li class="list-group-item"><b>程序当前版本：</b><?php echo VER ?></li>
<li class="list-group-item"><b>程序最新版本：</b><?php if($webauth!=='1'){ echo $vers;}else{echo 系统无法连接到授权站;}?></li>
<li class="list-group-item"><b>系统更新检测：</b><?=$up?></li>
</ul>
</div>

<div class="tab-pane fade in" id="ukyun">
<table class="table table-striped table-borderless table-vcenter remove-margin-bottom">
<tbody>
<tr class="shuaibi-tip animation-bigEntrance">
<td class="text-center" style="width: 100px;">
<img src="http://www.ukyun.cn/assets/favicon.ico" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
</td>
<td>
<h4><strong>UK云工作室</strong></h4>
<i class="fa fa-globe sidebar-nav-icon"></i> www.ukyun.cn<br><i class="fa fa-fw fa-history text-danger"></i>本程序版权所有者
</td>
<td class="text-right" style="width: 20%;">
<a href="http://www.ukyun.cn" target="_blank" data-toggle="modal" class="btn btn-sm btn-info">进入</a>
</td>
</tr>
</tbody>
</table>
<br>
<table class="table table-striped table-borderless table-vcenter remove-margin-bottom">
<tbody>
<tr class="shuaibi-tip animation-bigEntrance">
<td class="text-center" style="width: 100px;">
<img src="//q4.qlogo.cn/headimg_dl?dst_uin=2874992246&spec=100" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
</td>
<td>
<h4><strong>辉辉很乖</strong></h4>
<i class="fa fa-fw fa-qq text-primary"></i>2874992246<br><i class="fa fa-fw fa-history text-danger"></i>程序开发者、程序维护者
</td>
<td class="text-right" style="width: 20%;">
<a href="http://wpa.qq.com/msgrd?v=3&uin=2874992246&site=qq&menu=yes" target="_blank" data-toggle="modal" class="btn btn-sm btn-info">联系</a>
</td>
</tr>
</tbody>
</table>
<br>
<table class="table table-striped table-borderless table-vcenter remove-margin-bottom">
<tbody>
<tr class="shuaibi-tip animation-bigEntrance">
<td class="text-center" style="width: 100px;">
<img src="http://www.ukyun.cn/assets/favicon.ico" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
</td>
<td>
<h4><strong>官方客服</strong></h4>
<i class="fa fa-cog sidebar-nav-icon"></i> kefu.ukyun.cn<br><i class="fa fa-fw fa-history text-danger"></i>UK云工作室客服
</td>
<td class="text-right" style="width: 20%;">
<a href="http://kefu.ukyun.cn/" target="_blank" data-toggle="modal" class="btn btn-sm btn-info">联系</a>
</td>
</tr>
</tbody>
</table>
</div>

<div class="tab-pane fade in" id="cloud">
<ul class="list-group">
<li class="list-group-item"><b>授权服务器：</b><?php echo $connect?></li>
<li class='list-group-item'><b>API服务器：</b><?php echo $connect2?></li>
<li class='list-group-item'><b>资源服务器：</b><?php echo $connect3?></li>
<li class='list-group-item'><b>UK云服务器：</b><?php echo $connect4?></li>
</ul>
</div>

<div class="tab-pane fade in" id="safe">
<ul class="list-group">
<?php
if($udata['user']==$udata['pass']){
echo '<li class="list-group-item"><span class="btn-sm btn-danger">危险</span>&nbsp;用户名与密码一样会很容易破解，建议修改</li>';
}
?>
<?php
if($dbconfig['user']==$dbconfig['pwd']){
echo '<li class="list-group-item"><span class="btn-sm btn-danger">危险</span>&nbsp;数据库用户名与密码一样会很容易破解，建议修改</li>';
}
?>
<?php
if($udata['user']!==$udata['pass'] and $dbconfig['user']!==$dbconfig['pwd']){
echo '<li class="list-group-item"><span class="btn-sm btn-success">正常</span>&nbsp;暂未发现任何关于程序安全问题</li>';
}
?>
</ul>
</div>