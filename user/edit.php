<?php
/**
 * 分发编辑
**/
include("../includes/common.php");
$title='分发编辑';
include './head.php';
if($islogins==1){}else exit("<script language='javascript'>alert('您还未登录,请先登录才能进入！');window.location.href='./login.php';</script>");
echo '<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">';
?>
<?php
if($_GET['my']=='edit') {
$uid=intval($_GET['uid']);
$row=$DB->get_row("SELECT * FROM qqlogin_site WHERE uid='{$uid}' limit 1");
if($row=='')exit("<script language='javascript'>alert('平台不存在该记录！');history.go(-1);</script>");
if($row['user']!==$udata['uid'])exit("<script language='javascript'>alert('这都不是你添加的记录，你还想修改？');history.go(-1);</script>");
if(isset($_POST['submit'])) {
$token=daddslashes($_POST['token']);
$qq=daddslashes($_POST['qq']);
$url=daddslashes($_POST['url']);
$title=daddslashes($_POST['title']);
$callback=daddslashes($_POST['callback']);
$sql="update `qqlogin_site` set `token` ='{$token}',`qq` ='{$qq}',`url` ='{$url}',`title` ='{$title}',`callback` ='{$callback}' where `uid`='{$uid}'";
$city=get_ip_city($clientip);
$DB->query("insert into `qqlogin_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','修改分发','".$date."','".$city."','IP：".$clientip."标题：".$title."首页：".$url."')");
if($DB->query($sql))showmsg('修改成功！');
else showmsg('修改失败！<br/>'.$DB->error(),4);
}else{
?>
<div class="block">
<div class="block-title"><h3 class="panel-title">分发编辑</h3></div>
<div class="card-body">
<form action="./edit.php?my=edit&uid=<?php echo $uid; ?>" method="post" class="form-horizontal" role="form">
<div class="form-group">
<label class="col-sm-2 control-label">TOKEN</label>
<div class="col-sm-10"><input type="text" name="token" value="<?php echo $row['token']; ?>" class="form-control" required/></div>
</div><br/>
<div class="form-group">
<label class="col-sm-2 control-label">QQ</label>
<div class="col-sm-10"><input type="text" name="qq" value="<?php echo $row['qq']; ?>" class="form-control" required/></div>
</div><br/>
<div class="form-group">
<label class="col-sm-2 control-label">首页</label>
<div class="col-sm-10"><input type="text" name="url" value="<?php echo $row['url']; ?>" class="form-control" placeholder/></div>
</div><br/>
<div class="form-group">
<label class="col-sm-2 control-label">标题</label>
<div class="col-sm-10"><input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control"/></div>
</div><br/>
<div class="form-group">
<label class="col-sm-2 control-label">回调地址</label>
<div class="col-sm-10"><input type="text" name="callback" value="<?php echo $row['callback']; ?>" class="form-control"/></div>
</div><br/>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
<a href="urllist.php">返回列表</a></div>
</div>
</form>
</div>
</div>
<?php
}
}elseif($_GET['my']=='del'){
	$uid=intval($_GET['uid']);
	$row=$DB->get_row("SELECT * FROM qqlogin_site WHERE uid='{$uid}' limit 1");
if($row['user']!==$udata['uid'])exit("<script language='javascript'>alert('这都不是你添加的记录，你还想删除？');history.go(-1);</script>");
	$sql="DELETE FROM qqlogin_site WHERE uid='$uid' limit 1";
	$city=get_ip_city($clientip);
    $DB->query("insert into `qqlogin_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','删除分发','".$date."','".$city."','".$clientip."')");
	if($DB->query($sql)){showmsg('删除成功！',1,$_SERVER['HTTP_REFERER']);
	}
	else showmsg('删除失败！<br/>'.$DB->error(),4,$_SERVER['HTTP_REFERER']);
}
?>

    </div>
  </div>