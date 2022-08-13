<?php
/**
 * 后台管理
**/
$mod='blank';
include("../includes/common.php");
$title='后台管理';
if($islogins==1){}else exit("<script language='javascript'>alert('您还未登录,请先登录才能进入！');window.location.href='./login.php';</script>");
include './head.php';
?>
<?php
$juzi = 'https://api.ukyun.cn/yan/api.php';
$juzis = file_get_contents($juzi); 
?>
<?php
if($udata['access_token']==''){
$kuaijie="<a href='./binding.php'>未绑定（点击绑定）</a>";
}elseif($udata['access_token'] !==''){
$kuaijie="<a href='./binding.php?jiebang'>已绑定（点击解绑）</a>";
}
?>
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<div class="block">
<div class="block-title"><h3 class="panel-title">后台首页</h3></div>
<ul class="list-group">
<li class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <b>我的额度：</b>:<?=$udata['number']?>个</li>
<li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b> <?=$date?></li>
<li class="list-group-item"><span class="fa fa-calendar sidebar-nav-icon"></span> <b>随机一言：</b> <?=$juzis?></li>
<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> <b>快捷登录：</b><?=$kuaijie?></li>
<li class="list-group-item"><span class="glyphicon glyphicon-list"></span> <b>系统菜单：</b> 
<a href="./addurl.php" class="btn btn-xs btn-success">添加分发</a>
<a href="./urllist.php" class="btn btn-xs btn-success">分发列表</a>
<a href="./password.php" class="btn btn-xs btn-danger">修改密码</a>
</div>
<div class="block">
<div class="block-title"><h3 class="panel-title">用户公告</h3></div>
<ul class="list-group">
<li class="list-group-item"></b></span>
<?php echo $conf['gg']?>
</div></div></div></div></div>