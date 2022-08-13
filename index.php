<?php
include("./includes/common.php");
if($conf['repair']==1){
include("./template/page/weihu/index.php");
include("./includes/txprotect.php");
}elseif ($conf['muban'] && file_exists("./template/index/{$conf['muban']}/index.php")){
	$template = $conf['muban'];
	
}else{
	$template = "ukyun";
}
include("./template/index/{$template}/index.php");
?>