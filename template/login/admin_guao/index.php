<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no,minimal-ui">
<title><?php echo $conf[title]?></title>
  <link rel="shortcut icon" href="../assets/imgs/favicon.ico" type="image/x-icon" />
  <link href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="//cdn.staticfile.org/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="https://cdn.bootcss.com/sweetalert/2.1.0/sweetalert.min.js"></script>
  <link href="//cdn.bootcss.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet"/>
  <link href="//cdn.bootcss.com/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet"/>
  <link href="//cdn.bootcss.com/jquery-toast-plugin/1.3.1/jquery.toast.min.css" rel="stylesheet">
  <script src="//cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
  <script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.staticfile.org/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <script src="https://cdn.bootcss.com/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script src="//lib.baomitu.com/layer/3.1.1/layer.js"></script>
<style type="text/css">

object, embed {
	-webkit-animation-duration: .001s;
	-webkit-animation-name: playerInserted;
	-ms-animation-duration: .001s;
	-ms-animation-name: playerInserted;
	-o-animation-duration: .001s;
	-o-animation-name: playerInserted;
	animation-duration: .001s;
	animation-name: playerInserted;
}

@
-webkit-keyframes playerInserted {
	from {opacity: 0.99;
}

to {
	opacity: 1;
}

}
@
-ms-keyframes playerInserted {
	from {opacity: 0.99;
}

to {
	opacity: 1;
}

}
@
-o-keyframes playerInserted {
	from {opacity: 0.99;
}

to {
	opacity: 1;
}

}
@
keyframes playerInserted {
	from {opacity: 0.99;
}

to {
	opacity: 1;
}
}
</style>
<style>
	body {
	background-image:url("<?php echo $conf['abjapi']?>");
	background-position:center;           
	background-repeat:repeat-y；
	}
</style>
<style>
body{
background-repeat:repeat;}
.onclick{cursor: pointer;touch-action: manipulation;}
 .yj{border-radius:20px;}
</style>
</head>
<body>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./"><?=$title?></a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
		  <li class="active">
            <a href="./social.php"><span class="glyphicon glyphicon-globe"></span> QQ一键登录</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
<div class="container" style="padding-top:70px;">
<div class="yj panel panel-default">
<div class="panel-body">
<div class="text-center logo">
<img src="../assets/imgs/logo.png" height="50px" width="106px">
<br>
</br>
<form action="./login.php" method="post" class="form-horizontal" role="form">
<div class="list b-t-0 m-t padder-0">
<div class="input-group">
<span class="input-group-addon padder-0">账号</span>
<input type="text" name="user" class="form-control no-border"  placeholder="用户名" required="required" >
</div>
<br>
<div class="list b-t-0 m-t padder-0">
<div class="input-group">
<span class="input-group-addon padder-0">密码</span>
<input type="password" class="form-control no-border" name="pass" placeholder="密码" required="required" >
</div>
<br>
<div class="input-group">
<span class="input-group-addon">验证码</span>
<input type="number" class="form-control" name="code" placeholder="输入验证码" autocomplete="off" required>
<span class="input-group-addon" style="padding: 0">
<img src="../includes/code.php?r=<?php echo time();?>"height="32"onclick="this.src='../includes//code.php?r='+Math.random();" title="点击更换验证码">
</span>
</div><br/>
<center>
<button class="yj btn btn-default btn-block" type="submit" style="width:300px;">登&nbsp;&nbsp;录</button>
</center>
</div>
</div>
</div>
</div>