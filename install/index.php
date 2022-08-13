<?php
error_reporting(0);
@header('Content-Type: text/html; charset=UTF-8');
$do=isset($_GET['do'])?$_GET['do']:'0';
if(file_exists('install.lock')){
	$installed=true;
	$do='0';
}

function checkfunc($f,$m = false) {
	if (function_exists($f)) {
		return '<font color="green">可用</font>';
	} else {
		if ($m == false) {
			return '<font color="black">不支持</font>';
		} else {
			return '<font color="red">不支持</font>';
		}
	}
}

function checkclass($f,$m = false) {
	if (class_exists($f)) {
		return '<font color="green">可用</font>';
	} else {
		if ($m == false) {
			return '<font color="black">不支持</font>';
		} else {
			return '<font color="red">不支持</font>';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no,minimal-ui">
<title>UK云QQ互联分发系统</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/imgs/favicon.ico">

    <!-- App css -->
    <link href="../assets/install/css/app.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../assets/install/css/layui.css"/>

</head>
<style>
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        background: #12c2e9; /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #f64f59, #c471ed, #12c2e9); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
</style>
<body>

<!-- Begin page -->
<div class="wrapper">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4 text-center">
                <div class="col-xl-6" style="margin:auto">
                    <div class="card">
                                                    <div class="card-body">
                                <div id="progressbarwizard">
                                    <ul class="nav nav-pills nav-justified form-wizard-header mb-3 ">
                                        <li class="nav-item">
                                            <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-account-circle mr-1"></i>
                                                UK云QQ互联分发系统在线安装
                                            </a>
                                        </li>
                                                                            </ul>
                                                                            
                                    <div class="tab-content b-0 mb-0">

                                        <div id="bar" class="progress mb-3" style="height: 10px;">
                                            <div
                                                    class="bar progress-bar progress-bar-striped progress-bar-animated bg-danger"></div>
                                        </div>
<?php if($do=='0'){?>
<h4 class="header-title font-weight-light">UK云工作室</h4>
		<img src="http://www.ukyun.cn/assets/img/logo.png" width="50%" height="100px" />
		<?php if($installed){ ?>
		<div class="alert alert-warning">您已经安装过，如需重新安装请删除<font color=red> install/install.lock</font></div>
		<?php }else{?>
		<br>
		<p align="center"><a class="btn btn-primary" href="index.php?do=1">开始安装</a></p>
		<?php }?>
	</div>
</div>
<?php }elseif($do=='1'){?>
<h4 class="header-title font-weight-light">安装介绍</h4>
		<p><iframe src="../readme.txt" style="width:100%;height:500px;"></iframe></p>
<p><span style="float:left"><a class="btn btn-primary" href="index.php" align="left"><<上一步</a></span>
<span style="float:right"><a class="btn btn-primary" href="index.php?do=2" align="right">下一步>></a></span></p>
	</div>
</div>

<?php }elseif($do=='2'){?>
<h4 class="header-title font-weight-light">环境检测</h4>
<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:20%">函数检测</th>
			<th style="width:15%">需求</th>
			<th style="width:15%">当前</th>
			<th style="width:50%">用途</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>PHP 5.6.x</td>
			<td>必须</td>
			<td><?php echo phpversion(); ?></td>
			<td>PHP版本支持</td>
		</tr>
		<tr>
			<td>curl_exec()</td>
			<td>必须</td>
			<td><?php echo checkfunc('curl_exec',true); ?></td>
			<td>抓取网页</td>
		</tr>
		<tr>
			<td>file_get_contents()</td>
			<td>必须</td>
			<td><?php echo checkfunc('file_get_contents',true); ?></td>
			<td>读取文件</td>
		</tr>
	</tbody>
</table>
<p><span style="float:left"><a class="btn btn-primary" href="index.php?do=1" align="left"><<上一步</a></span>
<span style="float:right"><a class="btn btn-primary" href="index.php?do=3" align="right">下一步>></a></span></p>
</div>

<?php }elseif($do=='3'){?>
<h4 class="header-title font-weight-light">数据库配置</h4>
	<?php
if(ini_get('acl.app_id') && !preg_match('/php-tae-temp/',PHP_BINDIR))
echo <<<HTML
检测到您使用的是ACE空间，请在本地填写好config.php里的数据库相关配置，再用SVN软件上传。千万不能直接用爱特等在线文件管理器直接修改，因为ACE的本地文件读写都是临时性的。<br><br>
<font color="blue">数据库信息填写提示：<br>
进入ACE管理控制台－扩展服务－数据库(MySQL)，成功开通后就可以显示数据库所需配置信息。“外网地址”即为MYSQL主机，“账户名”即为MYSQL用户名，“数据库”即为数据库名，数据库密码填写开通MySQL服务时填写的密码（并非阿里云登录密码）。</font>
<br><br>
如果已填写好config.php数据库相关配置，请点击 <a href="?do=4">下一步</a>
HTML;
elseif(defined("SAE_ACCESSKEY"))
echo <<<HTML
检测到您使用的是SAE空间，支持一键安装，请点击 <a href="?do=4">下一步</a>
HTML;
else
echo <<<HTML
		<form action="?do=4" class="form-sign" method="post">
		<label for="name">数据库地址:</label>
		<input type="text" class="form-control" name="db_host" value="localhost">
		<label for="name">数据库端口:</label>
		<input type="text" class="form-control" name="db_port" value="3306">
		<label for="name">数据库账号:</label>
		<input type="text" class="form-control" name="db_user">
		<label for="name">数据库名称:</label>
		<input type="text" class="form-control" name="db_name">
		<label for="name">数据库密码:</label>
		<input type="text" class="form-control" name="db_pwd">
		<br><input type="submit" class="btn btn-primary btn-block" name="submit" value="保存配置">
		</form><br/>
		（如果已事先填写好config.php相关数据库配置，请 <a href="?do=4&jump=1">点击此处</a> 跳过这一步！）
HTML;
?>
	</div>
</div>

<?php }elseif($do=='4'){
?>
<h4 class="header-title font-weight-light">保存数据库</h4>
<?php
require './db.class.php';
if(defined("SAE_ACCESSKEY") || (ini_get('acl.app_id') && !preg_match('/php-tae-temp/',PHP_BINDIR)) || $_GET['jump']==1){
	if(defined("SAE_ACCESSKEY"))include_once '../includes/sae.php';
	else include_once '../includes/config.php';
	if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']) {
		echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
	} else {
		if(!$con=DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port'])){
			if(DB::connect_errno()==2002)
				echo '<div class="alert alert-warning">连接数据库失败，数据库地址填写错误！</div>';
			elseif(DB::connect_errno()==1045)
				echo '<div class="alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！</div>';
			elseif(DB::connect_errno()==1049)
				echo '<div class="alert alert-warning">连接数据库失败，数据库名不存在！</div>';
			else
				echo '<div class="alert alert-warning">连接数据库失败，['.DB::connect_errno().']'.DB::connect_error().'</div>';
		}else{
			echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
			if(DB::query("select * from auth_config where 1")==FALSE)
				echo '<p align="right"><a class="btn btn-primary btn-block" href="?do=5">创建数据表>></a></p>';
			else
				echo '<div class="list-group-item list-group-item-info">系统检测到你已安装过本程序</div>
				<div class="list-group-item">
					<a href="?do=7" class="btn btn-block btn-info">跳过安装</a>
				</div>
				<div class="list-group-item">
					<a href="?do=5" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}" class="btn btn-block btn-warning">强制全新安装</a>
				</div>';
		}
	}
}else{
	$db_host=isset($_POST['db_host'])?$_POST['db_host']:NULL;
	$db_port=isset($_POST['db_port'])?$_POST['db_port']:NULL;
	$db_user=isset($_POST['db_user'])?$_POST['db_user']:NULL;
	$db_pwd=isset($_POST['db_pwd'])?$_POST['db_pwd']:NULL;
	$db_name=isset($_POST['db_name'])?$_POST['db_name']:NULL;

	if($db_host==null || $db_port==null || $db_user==null || $db_pwd==null || $db_name==null){
		echo '<div class="alert alert-danger">保存错误,请确保每项都不为空<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
	} else {
		$config="<?php
/*数据库配置*/
\$dbconfig=array(
	'host' => '{$db_host}', //数据库服务器
	'port' => {$db_port}, //数据库端口
	'user' => '{$db_user}', //数据库用户名
	'pwd' => '{$db_pwd}', //数据库密码
	'dbname' => '{$db_name}' //数据库名
);
?>";
		if(!$con=DB::connect($db_host,$db_user,$db_pwd,$db_name,$db_port)){
			if(DB::connect_errno()==2002)
				echo '<div class="alert alert-warning">连接数据库失败，数据库地址填写错误！</div>';
			elseif(DB::connect_errno()==1045)
				echo '<div class="alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！</div>';
			elseif(DB::connect_errno()==1049)
				echo '<div class="alert alert-warning">连接数据库失败，数据库名不存在！</div>';
			else
				echo '<div class="alert alert-warning">连接数据库失败，['.DB::connect_errno().']'.DB::connect_error().'</div>';
		}elseif(file_put_contents('../includes/config.php',$config)){
			echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
			if(DB::query("select * from auth_config where 1")==FALSE)
				echo '<p align="right"><a class="btn btn-primary btn-block" href="?do=5">创建数据表>></a></p>';
			else
				echo '<div class="list-group-item list-group-item-info">系统检测到你已安装过本程序</div>
				<div class="list-group-item">
					<a href="?do=7" class="btn btn-block btn-info">跳过安装</a>
				</div>
				<div class="list-group-item">
					<a href="?do=5" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}" class="btn btn-block btn-warning">强制全新安装</a>
				</div>';
		}else
			echo '<div class="alert alert-danger">保存失败，请确保网站根目录有写入权限<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
	}
}
?>
	</div>
</div>
<?php }elseif($do=='5'){?>
<h4 class="header-title font-weight-light">创建数据表</h4>
<?php
if(defined("SAE_ACCESSKEY"))include_once '../includes/sae.php';
else include_once '../includes/config.php';
if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']) {
	echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
} else {
	require './db.class.php';
	$sql=file_get_contents("install.sql");
	$sql=explode(';</explode>',$sql);
	$cn = DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
	if (!$cn) die('err:'.DB::connect_error());
	DB::query("set sql_mode = ''");
	DB::query("set names utf8");
	$t=0; $e=0; $error='';
	for($i=0;$i<count($sql);$i++) {
		if ($sql[$i]=='')continue;
		if(DB::query($sql[$i])) {
			++$t;
		} else {
			++$e;
			$error.=DB::error().'<br/>';
		}
	}
}
if($e==0) {
	echo '<div class="alert alert-success">安装成功！<br/>SQL成功'.$t.'句/失败'.$e.'句</div><p align="right"><a class="btn btn-block btn-primary" href="index.php?do=6">下一步>></a></p>';
} else {
	echo '<div class="alert alert-danger">安装失败<br/>SQL成功'.$t.'句/失败'.$e.'句<br/>错误信息：'.$error.'</div><p align="right"><a class="btn btn-block btn-primary" href="index.php?do=5">点此进行重试</a></p>';
}
?>
	</div>
</div>

<?php }elseif($do=='6'){?>
<h4 class="header-title font-weight-light">安装完成</h4>
<?php
	@file_put_contents("install.lock",'UK云QQ互联分发系统安装锁');
	echo '<div class="alert alert-info"><font color="green">安装完成！管理账号和密码是:admin/123456</font><br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/>更多设置选项请登录后台管理进行修改。<br/><br/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录建立 install.lock 文件！</font></div>';
?>
	</div>
</div>

<?php }elseif($do=='7'){?>
<h4 class="header-title font-weight-light">安装完成</h4>
<?php
	@file_put_contents("install.lock",'UK云QQ互联分发系统安装锁');
	echo '<div class="alert alert-info"><font color="green">安装完成！管理账号和密码是:admin/123456</font><br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/>更多设置选项请登录后台管理进行修改。<br/><br/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录建立install.lock 文件！</font></div>';
?>
	</div>
</div>


<?php }?>


</div>
<!-- END wrapper -->
<div class="rightbar-overlay"></div>
<!-- /Right-bar -->
<!-- App js -->
<script src="../assets/install/js/app.min.js"></script>
<!-- demo app -->
<script src="../assets/install/js/demo.form-wizard.js"></script>
<script src="../assets/install/js/layui.all.js"></script>
<!-- end demo js-->
</body>
</html>
