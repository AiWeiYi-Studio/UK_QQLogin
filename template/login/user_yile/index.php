<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title><?php echo $conf['title']?>-后台登录</title>
    <link rel="icon" href="../assets/imgs/favicon.ico" type="image/ico">
    <meta name="keywords" content="<?php echo $conf['keywords']; ?>"/>
    <meta name="description" content="<?php echo $conf['description']; ?>"/>
    <link href="http://assets.yilep.com/ylsq/assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://assets.yilep.com/ylsq/assets/common/css/style.css?v=1.1">
</head>
<body>
<a href="/" class="show-xs limit web_name"><?php echo $conf['title']?></a>
<div id="vue" class="login_page">
<div class="login_content">
<div class="hidden-xs">
<a class="web_name limit" href="/"><?php echo $conf['title']?></a>
<div class="login_img"></div>
</div>
            <div class="block animation-fadeInQuick">
                <div class="block-title">
                    <h4>后台登录</h4>
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
                        <a href="./social.php" class="third_btn mt30" style="margin: 0 auto"></a>
             <br> <br>
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
