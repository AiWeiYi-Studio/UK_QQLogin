<?php
/**
 * 添加分发
**/
include("../includes/common.php");
$title='添加分发';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
if(isset($_POST['qq']) && isset($_POST['url'])){
$token=daddslashes($_POST['token']);
$qq=daddslashes($_POST['qq']);
$url=daddslashes($_POST['url']);
$title=daddslashes($_POST['title']);
$callback=daddslashes($_POST['callback']);
$active=daddslashes($_POST['active']);
$sql="insert into `qqlogin_site` (`token`,`qq`,`url`,`title`,`callback`,`addtime`,`active`,`user`) values ('".$token."','".$qq."','".$url."','".$title."','".$callback."','".$date."','".$active."','".站长.$udata['uid']."')";
$DB->query($sql);
$city=get_ip_city($clientip);
$DB->query("insert into `qqlogin_logs` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','添加分发','".$date."','".$city."','IP:".$clientip." QQ:".$qq." URL:".$url."')");
exit("<script language='javascript'>alert('添加成功');window.location.href='./urllist.php';</script>");
} ?>
<div class="block">
<div class="block-title"><h3 class="panel-title">添加分发</h3></div>
<div class="card-body">
<form action="./addurl.php" method="post" class="form-horizontal" role="form">
<div class="input-group">
<span class="input-group-addon">TOKEN</span>
<input type="text" name="token" value="<?=strtoupper(md5(time()."^%$#"))?>" class="form-control" placeholder="这里填秘钥" autocomplete="off" required/>
</div><br/>
<div class="input-group">
<span class="input-group-addon">站长QQ</span>
<input type="text" name="qq" value="" class="form-control" placeholder="这里填站长的QQ哦" autocomplete="off" required/>
</div><br/>
<div class="input-group">
<span class="input-group-addon">网站首页</span>
<input type="text" name="url" value="" class="form-control" placeholder="这里填网站的首页哦" autocomplete="off" required/>
</div><br/>
<div class="input-group">
<span class="input-group-addon">网站标题</span>
<input type="text" name="title" value="" class="form-control" placeholder="这里填网站的标题哦" autocomplete="off" required/>
</div><br/>
<div class="input-group">
<span class="input-group-addon">回调地址</span>
<input type="text" name="callback" value="" class="form-control" placeholder="这里填登录回调地址哦" autocomplete="off" required/>
</div><br/>
<div class="input-group">
<span class="input-group-addon">是否激活</span>
<select name="active" class="form-control">
<option value="1">1_激活</option>
<option value="0">0_封禁</option>
</select></div><br>
<div class="form-group">
              <div class="col-sm-12"><input type="submit" value="添加" class="btn btn-primary form-control"/></div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>