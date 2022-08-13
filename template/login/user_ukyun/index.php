<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title><?php echo $conf['title']?>-后台登录</title>
  <link rel="icon" href="../assets/imgs/favicon.ico" type="image/ico">
  <meta name="keywords" content="<?php echo $conf['keywords']; ?>"/>
  <meta name="description" content="<?php echo $conf['description']; ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/appui/css/main.css">
  <link rel="stylesheet" href="../assets/appui/css/themes.css">
  <script src="//cdn.staticfile.org/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="//cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
  <script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../assets/appui/js/plugins.js"></script>
  <script src="../assets/appui/js/app2.js"></script>
  <link rel="stylesheet" href="../assets/appui/css/plugins.css">
</head>
<body>
<img src="<?php echo $conf['ubjapi']?>" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow">
      <div id="login-container">
            <h1 class="h2 text-light text-center push-top-bottom animation-pullDown">
                <i class="fa fa-cube text-light-op"></i> <strong><?php echo $conf['title']?></strong>
            </h1>
            <div class="block animation-fadeInQuick">
                <div class="block-title">
                    <h2>后台登录</h2>
                </div>
                <form id="form-login" action="login.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="login-email" class="col-xs-12">账号</label>
                        <div class="col-xs-12">
                            <input type="text" name="user" class="form-control" placeholder="Your username.." required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="login-password" class="col-xs-12">密码</label>
                        <div class="col-xs-12">
                            <input type="password" name="pass" class="form-control" placeholder="Your password.." required/>
                        </div>
                    </div>
<div class="input-group">
<input type="text" class="form-control input-lg" name="code" onkeyup="this.value=this.value.replace(/\D/g,'')" maxlength="4" placeholder="输入验证码" autocomplete="off" required>
<span class="input-group-addon" style="padding: 0">
<img src="../includes/code.php?r=<?php echo time();?>"height="43"onclick="this.src='../includes/code.php?r='+Math.random();" title="点击更换验证码">
</span>
</div><br/>
                    <div class="form-group form-actions">
                        <div class="col-xs-8">
                            <label class="csscheckbox csscheckbox-primary">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> 记住我?
                            </label>
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-sm btn-success">登录</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="push text-center">-Or-</div>
                <div class="row push">
                    <div class="col-xs-6">
                        <a href="./reg.php" class="btn btn-effect-ripple btn-sm btn-info btn-block">注册</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="./social.php" class="btn btn-effect-ripple btn-sm btn-primary btn-block"></i> QQ</a>
                    </div>
                </div>
            </div>
            <footer class="text-muted text-center animation-pullUp">
                <small><span id="year-copy"></span> &copy; <a href="" target="_blank"><?php echo $conf['title']?></a></small>
            </footer>
        </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>