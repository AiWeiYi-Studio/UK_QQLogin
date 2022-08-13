<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $conf['title']?>-后台登录</title>
<link rel="icon" href="../assets/imgs/favicon.ico" type="image/ico">
<meta name="keywords" content="<?php echo $conf['keywords']; ?>"/>
<meta name="description" content="<?php echo $conf['description']; ?>"/>
<link href="../assets/login/admin_caihongs/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="login">
	<h2><?php echo $conf['title']?>-后台登录</h2>
<form action="./login.php" method="post" role="form">
    <div class="login-top">
       <input type="text" name="user" value="" class="form-control" placeholder="用户名" required="required"/>
       <br>
       <br>
       <input type="password" name="pass" class="form-control" placeholder="密码" required="required"/>
       <br>
       <br>
	   <input type="text" id="code" name="code" class="form-control input-lg" placeholder="输入验证码" autocomplete="off" required>
	   <br>
	   <br>
	   <center>
	   <img id="codeimg" src="../includes/code.php" height="43" onclick="this.src='../includes/code.php?r='+Math.random();" title="点击更换验证码">
	   <center>
       <br>
	</div>
    <div class="forgot">
        <input type="submit" value="Login" >
    </div>
    </form>
</div>	

</body>
</html>