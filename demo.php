<?php
include("./includes/common.php");
if($conf['repair']==1){
include("./template/page/weihu/index.php");
}elseif($conf['repair']!==1){
echo'
<!DOCTYPE html>
<html lang="zh">
  <head>       
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />  
    <title>'.$conf['title'].'-回调演示</title>
    <meta name="keywords" content="'.$conf['keywords'].'"/>
    <meta name="description" content="'.$conf['description'].'"/>
    <meta name="author" content="UK云工作室" />
    <link rel="icon" href="assets/imgs/favicon.ico" type="image/ico">
    <link href="./assets/index/major/static/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/index/major/cleanex/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/index/major/static/css/components.min.css">
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="./assets/index/major/static/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/index/major/static/application.fn.js"></script>
    <script type="text/javascript" src="./assets/index/major/static/application.js"></script>  
    <script type="text/javascript" src="./assets/index/major/static/server.js"></script> 
    <center><h4>
 ';
exit(var_Dump($_GET));
echo'
</h4>
</center>
</body>
</html>';
}
?> 