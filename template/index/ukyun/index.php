<?php
$dailis=$DB->count("SELECT count(*) from qqlogin_daili WHERE 1");
$users=$DB->count("SELECT count(*) from qqlogin_user WHERE 1");
$sites=$DB->count("SELECT count(*) from qqlogin_site WHERE 1");
$logs=$DB->count("SELECT count(*) from qqlogin_log WHERE 1");
?>
<!DOCTYPE html>
<html lang="zh">
  <head>       
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />  
    <title><?php echo $conf['title']?></title>
    <meta name="keywords" content="<?php echo $conf['keywords']?>"/>
    <meta name="description" content="<?php echo $conf['description']?>"/>
    <meta name="author" content="UK云工作室" />
    <link rel="icon" href="assets/imgs/favicon.ico" type="image/ico">
    <link href="../assets/index/major/static/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/index/major/cleanex/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/index/major/static/css/components.min.css">
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/index/major/static/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/index/major/static/application.fn.js"></script>
    <script type="text/javascript" src="../assets/index/major/static/application.js"></script>  
    <script type="text/javascript" src="../assets/index/major/static/server.js"></script> 
  </head>
  <body class='light home' id="body">
    <a href="#body" id="back-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
        <header>
          <div class="navbar" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="glyphicon glyphicon-align-justify"></span>
                </button>
<a class="navbar-brand" href="/"><font color="black"><?php echo $conf['title']?></font></a>
              </div>
              <div class="navbar-collapse collapse">
                <div class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
               <li><a href="doc.php" class="active">开发文档</a></li>
               <li><a href="user/login.php" class="active">用户登录</a></li>
               <li><a href="user/reg.php" class="active">免费注册</a></li>
               </ul>
               </div> 
               </div>
            </div>
          </div>    
        </header> 
<section id="mainto">
    <div class="container">
      <h3 class="text-center featureH">一种分发，无限使用</h3>
      <div class="row feature">
        <div class="col-sm-12 image">
          <div class="row">
            <div class="col-md-4">
              <div class="panelette">
                <h3><i class="glyphicon glyphicon-screenshot"></i>专业强大的功能</h3>
                <p>判断使用者的秘钥是否正确，不正确不可使用</p>
              </div>
            </div>
            <br>
            <div class="col-md-4">
              <div class="panelette panelette-grad">
                <h3><i class="glyphicon glyphicon-send"></i>专业分销</h3>
                <p>添加下级，下级再添加下级进行销售</p>                
              </div>
            </div>
            <br>
			<div class="col-md-4">
              <div class="panelette">
                <h3><i class="glyphicon glyphicon-fire"></i>扩展功能</h3>
                <p>站长设置注册赠送额度，使用完后用户可购买额度进行添加</p>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>    
  </section>
  <section class="red">
    <div class="container">
      <div class="row feature">
        <div class="col-sm-5 info">
          <h2><i class="glyphicon glyphicon-filter"></i>多种功能</h2>
          <p>系统通过判断用户秘钥的功能进行获取回调地址，然后进行回调到用户网站，最后传输获取的各种信息完成登录</p>
          <br>         
        </div>
        <div class="col-sm-7 image">
          <img src="../assets/index/major/cleanex/assets/images/landing.png" alt="多种功能等你发现">
        </div>
      </div>         
    </div>    
  </section>
<section class="calltoaction">
  <div class="container">
    <div class="actionbar">
      <h2>准备好接入你的程序了吗？快注册使用吧！</h2>
      <a href="user/reg.php" class="btn btn-secondary btn-round">免费注册</a>
    </div>
<div class="stats">
        <div class="row">
          <div class="col-xs-3">
            <strong>系统用户</strong>      
            <h3><?php echo $dailis ?><span>个</span></h3>
          </div>
          <div class="col-xs-3">
            <strong>系统站长</strong>      
            <h3><?php echo $users ?><span>个</span></h3>
          </div>
          <div class="col-xs-3">
            <strong>系统分发</strong>
            <h3><?php echo $sites ?><span>个</span></h3>
          </div>
           <div class="col-xs-3">
            <strong>系统日志</strong>      
            <h3><?php echo $logs ?><span>条</span></h3>
          </div>
        </div>           
      </div>
  </div>
</section> 
<script type="text/javascript" src="../assets/index/major/cleanex/assets/js/main.js"></script>
</body>
</html>