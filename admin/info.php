<?php
/**
 * 站长管理
**/
include("../includes/common.php");
$title='站长管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>alert('您还未登录,请先登录才能进入！');window.location.href='./login.php';</script>");
echo '<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">';
?>
<?php
$my=isset($_GET['my'])?$_GET['my']:info;

if($my=='info'){
echo '
<div class="block">
<div class="block-title"><h3 class="panel-title">用户信息</h3></div>
<div class="card-body">
<div class="text-left">
<div style="margin-top:10px;">
<label>用户UID：</label>
<input class="form-control" readonly value="'.$udata['uid'].'">
</div>
<div style="margin-top:10px;">
<label>用户名：</label>
<input class="form-control" readonly value="'.$udata['user'].'">
</div>
<div style="margin-top:10px;">
<label>用户QQ：</label>
<input class="form-control" readonly value="'.$udata['qq'].'">
</div>
<div style="margin-top:10px;">
<label>用户昵称：</label>
<input class="form-control" readonly value="'.$udata['name'].'">
</div>
<div style="margin-top:10px;">
<label>用户IP：</label>
<input class="form-control" readonly value="'.$udata['ip'].'">
</div>
<div style="margin-top:10px;">
<label>快捷登录：</label>
<input class="form-control" readonly value="'.$udata['access_token'].'">
</div>
<div style="margin-top:10px;" class="text-center">
<a href="./info.php?my=edit&id='.$udata['uid'].'" class="btn btn-primary btn-block">信息修改</a>
</div>
</div>
</div>
<br>';
}
?>

<?php
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='edit')
{
$id=intval($_GET['id']);
$row=$DB->get_row("select * from qqlogin_user where uid='$id' limit 1");
if($row['uid']!==$udata['uid']){
	showmsg('你还想改其他用户的账号？',3);
	exit;
}
echo '
<div class="block">
<div class="block-title"><h3 class="panel-title">用户信息修改</h3></div>
<div class="card-body">
<form action="./info.php?my=edit_submit&id='.$id.'" method="POST">
<div class="form-group">
<label>站长用户名:</label><br>
<input type="text" class="form-control" name="user" value="'.$row['user'].'" required>
</div>
<div class="form-group">
<label>密码:</label><br>
<input type="text" class="form-control" name="pwd" value="'.$row['pass'].'" required>
</div>
<div class="form-group">
<label>联系QQ:</label><br>
<input type="text" class="form-control" name="qq" value="'.$row['qq'].'">
</div>
<div class="form-group">
<label>站长名:</label><br>
<input type="text" class="form-control" name="name" value="'.$row['name'].'">
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定修改"></form>';
echo '<br/><a href="./info.php">>>返回用户信息</a>';
echo '</div></div>';
}
elseif($my=='edit_submit')
{
$id=intval($_GET['id']);
$rows=$DB->get_row("select * from qqlogin_user where uid='$id' limit 1");
if(!$rows)
	showmsg('当前记录不存在！',3);
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$qq=$_POST['qq'];
$name=$_POST['name'];
if($user==NULL or $pwd==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
if($DB->query("update qqlogin_user set user='$user',pass='$pwd',qq='$qq',name='$name' where uid='{$id}'"))
showmsg('修改信息成功！<br/><br/><a href="./info.php">>>返回用户信息</a>',1);
else
	showmsg('修改信息失败！'.$DB->error(),4);
}
}
?>