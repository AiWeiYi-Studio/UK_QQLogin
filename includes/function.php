<?php
function checkIfActive($string) {
	$array=explode(',',$string);
	$php_self=substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/')+1,strrpos($_SERVER['REQUEST_URI'],'.')-strrpos($_SERVER['REQUEST_URI'],'/')-1);
	if (in_array($php_self,$array)){
		return 'active';
	}else
		return null;
}
function checkmobile() {
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$ualist = array('android', 'midp', 'nokia', 'mobile', 'iphone', 'ipod', 'blackberry', 'windows phone');
	if((dstrpos($useragent, $ualist) || strexists($_SERVER['HTTP_ACCEPT'], "VND.WAP") || strexists($_SERVER['HTTP_VIA'],"wap"))){
		return true;
	}else{
		return false;
	}
}
function get_curl($url,$post=0,$referer=0,$cookie=0,$header=0,$ua=0,$nobaody=0){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$httpheader[] = "Accept:*/*";
	$httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
	$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
	$httpheader[] = "Connection:close";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	if($post){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	if($header){
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
	}
	if($cookie){
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	}
	if($referer){
		if($referer==1){
			curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
		}else{
			curl_setopt($ch, CURLOPT_REFERER, $referer);
		}
	}
	if($ua){
		curl_setopt($ch, CURLOPT_USERAGENT,$ua);
	}else{
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 4.4.2; NoxW Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36');
	}
	if($nobaody){
		curl_setopt($ch, CURLOPT_NOBODY,1);
	}
	curl_setopt($ch, CURLOPT_ENCODING, "gzip");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$ret = curl_exec($ch);
	curl_close($ch);
	return $ret;
}
function send_mail($_arg_0, $_arg_1, $_arg_2)
{
	global $conf;
	if ($conf["mail_cloud"] == 1) {
		$_var_4 = "http://api.sendcloud.net/apiv2/mail/send";
		$_var_5 = array("apiUser" => $conf["mail_apiuser"], "apiKey" => $conf["mail_apikey"], "from" => $conf["mail_name"], "fromName" => $conf["sitename"], "to" => $_arg_0, "subject" => $_arg_1, "html" => $_arg_2);
		$_var_6 = curl_init($_var_4);
		curl_setopt($_var_6, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($_var_6, CURLOPT_TIMEOUT, 30);
		curl_setopt($_var_6, CURLOPT_POST, 1);
		curl_setopt($_var_6, CURLOPT_POSTFIELDS, $_var_5);
		$_var_7 = curl_exec($_var_6);
		curl_close($_var_6);
		$_var_8 = json_decode($_var_7, true);
		if ($_var_8["statusCode"] == 200) {
			return true;
		}
		return implode("\n", $_var_8["message"]);
	}
	if ((!function_exists("openssl_sign") || file_exists("/web/mini.php")) && $conf["mail_port"] == 465) {
		$_var_9 = "http://1.mail.qqzzz.net/";
	}
	if ($_var_9) {
		$_var_10[sendto] = $_arg_0;
		$_var_10[title] = $_arg_1;
		$_var_10[content] = $_arg_2;
		$_var_10[user] = $conf["mail_name"];
		$_var_10[pwd] = $conf["mail_pwd"];
		$_var_10[nick] = $conf["sitename"];
		$_var_10[host] = $conf["mail_smtp"];
		$_var_10[port] = $conf["mail_port"];
		$_var_10[ssl] = $conf["mail_port"] == 465 ? 1 : 0;
		$_var_6 = curl_init();
		curl_setopt($_var_6, CURLOPT_URL, $_var_9);
		curl_setopt($_var_6, CURLOPT_POST, 1);
		curl_setopt($_var_6, CURLOPT_POSTFIELDS, http_build_query($_var_10));
		curl_setopt($_var_6, CURLOPT_RETURNTRANSFER, 1);
		$_var_11 = curl_exec($_var_6);
		curl_close($_var_6);
		if ($_var_11 == "1") {
			return true;
		}
		return $_var_11;
	}
	include_once ROOT . "includes/smtp.class.php";
	$_var_12 = $conf["mail_name"];
	$_var_13 = $conf["mail_smtp"];
	$_var_14 = $conf["mail_port"];
	$_var_15 = 1;
	$_var_16 = $conf["mail_name"];
	$_var_17 = $conf["mail_pwd"];
	$_var_18 = $conf["sitename"];
	$_var_19 = $conf["mail_port"] == 465 ? 1 : 0;
	$_var_20 = new SMTP($_var_13, $_var_14, $_var_15, $_var_16, $_var_17, $_var_19);
	$_var_20->att = array();
	if ($_var_20->send($_arg_0, $_var_12, $_arg_1, $_arg_2, $_var_18)) {
		return true;
	}
	return $_var_20->log;
}
function sysmsg($msg = '???????????????',$die = true) {
?>  
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>??????????????????</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/imgs/favicon.ico" />
    <style type="text/css">
        *{box-sizing:border-box;margin:0;padding:0;font-family:Lantinghei SC,Open Sans,Arial,Hiragino Sans GB,Microsoft YaHei,"????????????",STHeiti,WenQuanYi Micro Hei,SimSun,sans-serif;-webkit-font-smoothing:antialiased}
        body{padding:70px 0;background:#edf1f4;font-weight:400;font-size:1pc;-webkit-text-size-adjust:none;color:#333}
        a{outline:0;color:#3498db;text-decoration:none;cursor:pointer}
        .system-message{margin:20px 5%;padding:40px 20px;background:#fff;box-shadow:1px 1px 1px hsla(0,0%,39%,.1);text-align:center}
        .system-message h1{margin:0;margin-bottom:9pt;color:#444;font-weight:400;font-size:40px}
        .system-message .jump,.system-message .image{margin:20px 0;padding:0;padding:10px 0;font-weight:400}
        .system-message .jump{font-size:14px}
        .system-message .jump a{color:#333}
        .system-message p{font-size:9pt;line-height:20px}
        .system-message .btn{display:inline-block;margin-right:10px;width:138px;height:2pc;border:1px solid #44a0e8;border-radius:30px;color:#44a0e8;text-align:center;font-size:1pc;line-height:2pc;margin-bottom:5px;}
        .success .btn{border-color:#69bf4e;color:#69bf4e}
        .error .btn{border-color:#69bf4e;color:#69bf4e}
        .info .btn{border-color:#3498db;color:#3498db}
        .copyright p{width:100%;color:#919191;text-align:center;font-size:10px}
        .system-message .btn-grey{border-color:#bbb;color:#bbb}
        .clearfix:after{clear:both;display:block;visibility:hidden;height:0;content:"."}
        @media (max-width:768px){body {padding:20px 0;}}
        @media (max-width:480px){.system-message h1{font-size:30px;}}
    </style>
</head>
<body>
<div class="system-message error">
<div class="image">
<img src="http://<?php echo $_SERVER['HTTP_HOST']?>/assets/imgs/error.svg" alt="" width="150" />
</div>
<h2>??????????????????</h2>
</br>
<?php echo $msg; ?>
</div>
</body>
</html>
<?php
    if ($die == true) {
        exit;
    }
}
function saveSetting($k, $v){
	global $DB;
	$v = daddslashes($v);
	return $DB->query("REPLACE INTO qqlogin_config SET v='$v',k='$k'");
}
function curl_get($url)
{
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$content=curl_exec($ch);
curl_close($ch);
return($content);
}
function getSetting($k, $force = false)
{
	global $DB;
	global $CACHE;
	if ($force) {
		return $setting[$k] = $DB->get_row("SELECT v FROM qqlogin_config WHERE k='".$k."' limit 1");
	}
	$cache = $CACHE->get($k);
	return $cache[$k];
}
function real_ip(){
$ip = $_SERVER['REMOTE_ADDR'];
if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
	foreach ($matches[0] AS $xip) {
		if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
			$ip = $xip;
			break;
		}
	}
} elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
	$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP'])) {
	$ip = $_SERVER['HTTP_X_REAL_IP'];
}
return $ip;
}
function ip_city_str($str){
	return str_replace(array('???','???'),'',$str);
}
function get_ip_city($ip)
{
    $url = 'http://whois.pconline.com.cn/ipJson.jsp?json=true&ip=';
    $city = curl_get($url . $ip);
	$city = mb_convert_encoding($city, "UTF-8", "GB2312");
    $city = json_decode($city, true);
    if ($city['city']) {
        $location = ip_city_str($city['pro']).ip_city_str($city['city']);
    } else {
        $location = ip_city_str($city['pro']);
    }
	if($location){
		return $location;
	}else{
		return false;
	}
}
function get_ip_city3($ip)
{
    $url = 'http://ip.taobao.com/service/getIpInfo.php?ip=';
    @$data = file_get_contents($url . $ip);
    $arr = json_decode($data, true);
	if (array_key_exists('code',$arr) && $arr['code']==0) {
		if ($arr['data']['city']) {
			$location = $arr['data']['region'].$arr['data']['city'];
		} else {
			$location = $arr['data']['region'];
		}
	}
	if($location){
		return $location;
	}else{
		return false;
	}
}
function daddslashes($string, $force = 0, $strip = FALSE) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force, $strip);
			}
		} else {
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}

function strexists($string, $find) {
	return !(strpos($string, $find) === FALSE);
}
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key ? $key : ENCRYPT_KEY);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);
	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);
	$result = '';
	$box = range(0, 255);
	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}
	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}
	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}
	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}
}
function update_version()
{
	$query = curl_get("http://qqauth.ukyun.cn/api/check.php?url=".$_SERVER["HTTP_HOST"]."&authcode=".authcode."&ver=".VERSION);
	if ($query = json_decode($query,true)) {
		return $query;
	}
		return false;
}
function random($length, $numeric = 0) {
	$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	$hash = '';
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $seed{mt_rand(0, $max)};
	}
	return $hash;
}
function showmsg($content = '???????????????',$type = 4,$back = false)
{
switch($type)
{
case 1:
	$panel="success";
break;
case 2:
	$panel="info";
break;
case 3:
	$panel="warning";
break;
case 4:
	$panel="danger";
break;
}

echo '<div class="panel panel-'.$panel.'">
      <div class="panel-heading">
        <h3 class="panel-title">????????????</h3>
        </div>
        <div class="panel-body">';
echo $content;

if ($back) {
	echo '<hr/><a href="'.$back.'"><< ??????</a>';
	echo '<br/><a href="javascript:history.back(-1)"><< ???????????????</a>';
}
else
    echo '<hr/><a href="javascript:history.back(-1)"><< ???????????????</a>';

echo '</div>
    </div>';
}
?>