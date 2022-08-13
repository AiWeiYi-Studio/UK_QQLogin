<?php
/**
 * 卡密额度添加
**/
include("../includes/common.php");
@header('Content-Type: text/html; charset=UTF-8');
$title='卡密额度添加';
if($islogins==1){}else exit("<script language='javascript'>alert('您还未登录,请先登录才能进入！');window.location.href='./login.php';</script>");
include './head.php';
echo '<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">';
if($_POST['do'] == 'pay'){
	$km = daddslashes($_POST['km']);
    $kmlist=$DB->get_row("SELECT * FROM qqlogin_kms WHERE km='$km' limit 1");
    if(!$kmlist){
        echo "<script language='javascript'>alert('卡密不存在！');</script>";
    }elseif($kmlist['zt']==0){
        echo "<script language='javascript'>alert('该卡密已使用！');</script>";
    }else{
           $ednumber = $udata['number']+$kmlist['number'];
           $DB -> query("update qqlogin_kms set zt=0 where id='{$kmlist['id']}'");
           $DB -> query("update qqlogin_kms set usetime='$date' where id='{$kmlist['id']}'");
	       $DB->query("UPDATE qqlogin_daili SET number='$ednumber' WHERE uid='{$udata['uid']}'");
	       $DB->query($sql);
	       $city=get_ip_city($clientip);
        $DB->query("insert into `qqlogin_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','使用卡密添加额度','".$date."','".$city."','IP：".$clientip." KM：".$km."')");
        exit("<script language='javascript'>alert('添加额度成功！');window.location.href='./index.php';</script>");
    }
  }
?>
<div class="block">
<div class="block-title"><h3 class="panel-title">卡密额度添加</h3></div>
<div class="card-body">
<form class="form-horizontal" method="post" name="auth">
<input type="hidden" name="do" value="pay">
<form action="?" class="form-sign" method="post">
<div class="input-group">
<span class="input-group-addon">卡密</span>
<input type="text" class="form-control" name="km" placeholder="请输入购买的卡密" required>
</div><br>

<input type="submit" class="btn btn-primary btn-block" name="submit" value="点击添加">
</div><br>
</div>
</div>