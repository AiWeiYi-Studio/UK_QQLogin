<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="renderer" content="webkit"/>
  <meta name="force-rendering" content="webkit"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?php echo $conf['title']?>-后台登录</title>
  <link rel="icon" href="../assets/imgs/favicon.ico" type="image/ico">
  <meta name="keywords" content="<?php echo $conf['keywords']; ?>"/>
  <meta name="description" content="<?php echo $conf['description']; ?>"/>
  <link href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/appui/css/main.css">
  <link rel="stylesheet" href="../assets/appui/css/themes.css">
  <link id="theme-link" rel="stylesheet" href="../assets/appui/css/themes/amethyst-2.4.css">
  <script src="//cdn.staticfile.org/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="//cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
  <script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../assets/appui/js/plugins.js"></script>
  <script src="../assets/appui/js/app2.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.staticfile.org/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<img src="<?php echo $conf['abjapi']?>" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow">
<div id="login-container">
	<h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
	<i class="fa fa-cube"></i><strong><?php echo $conf['title']?></strong>
	</h1>
	<div class="block animation-fadeInQuickInv">
		<div class="block-title">
			<h2>管理员后台登录</h2>
		</div>
		<form id="form-login" action="login.php" method="post" class="form-horizontal">
			<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" id="user" name="user" class="form-control" placeholder="用户名" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" id="pass" name="pass" class="form-control" placeholder="密码" required>
					</div>
				</div>
			</div>
						<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-adjust"></span></span>
					<input type="text" id="code" name="code" class="form-control input-lg" placeholder="输入验证码" autocomplete="off" required>
					<span class="input-group-addon" style="padding: 0">
						<img id="codeimg" src="../includes/code.php" height="43" onclick="this.src='../includes/code.php?r='+Math.random();" title="点击更换验证码">
					</span>
					</div>
				</div>
			</div>
						<div class="form-group form-actions">
				<div class="col-xs-6">
					<button type="submit" class="btn btn-effect-ripple btn-block btn-primary"><i class="fa fa-check"></i>登录</button>
				</div>
				<div class="col-xs-6">
                        <a href="./social.php" class="btn btn-effect-ripple btn-block btn-primary"><i class="fa fa-qq"></i> QQ</a>
                    </div>
			</div>
		</form>
	</div>
	<footer class="text-muted text-center animation-pullUp">
	<small><span id="year-copy"></span> &copy; <a href="#"><?php echo $conf['title']?></a></small>
	</footer>
</div>
</body>
</html>