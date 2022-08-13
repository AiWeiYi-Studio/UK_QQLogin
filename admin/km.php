<?php
$mod='blank';
include("../includes/common.php");
$title='额度卡密生成';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
$num = $_POST['num'];
$number = $_POST['number'];
function getkmkey($len = 16)
{
    $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $strlen = strlen($str);
    $randstr = '';
    for ($i = 0; $i < $len; $i++) {
        $randstr .= $str[mt_rand(0, $strlen - 1)];
    }
    return $randstr;
}
?>
<?php
if ($_POST['do'] == 'do') {
	if ($num != '') {
		for ($i=1;$i<=$num;$i++) {
			$key = getkmkey();
			$DB->query("INSERT INTO `qqlogin_kms` (`km`, `zt`, `userid`, `addtime`, `number`) VALUES ('$key', '1', '".$udata['user']."' ,'$date' ,'$number')");
			$city=get_ip_city($clientip);
			$DB->query("insert into `qqlogin_logs` (`uid`,`type`,`date`,`city`,`data`) values ('".$udata['user']."','生成额度卡密','".$date."','".$city."','KEY:".$key." NUM:".$num."')");
			}
				}else{
		exit("<script language='javascript'>alert('数量不能为空！');history.go(-1);</script>");
}
}
$kms=$DB->count("SELECT count(*) from qqlogin_kms WHERE 1");
			?>
			<?php
	$my=isset($_GET['my'])?$_GET['my']:null;
	if($my=='del'){
		$id=$_GET['id'];
		$sql=$DB->query("DELETE FROM qqlogin_kms  WHERE id='$id'");
		if($sql){
			showmsg('删除成功！',1);
		}else{
			showmsg('删除失败！',4);
		}
		exit;
	}elseif($my=='dels'){
		if($DB->query("DELETE FROM qqlogin_kms")==true){
			showmsg('删除成功！',1);
		}else{
			showmsg('删除失败！',4);
		}exit;
	}elseif($my=='delq'){
		if($DB->query("DELETE FROM qqlogin_kms WHERE zt='0'")==true){
			showmsg('删除成功！',1);
		}else{
			showmsg('删除失败！',4);
		}exit;
	}
?>
<div class="block">
<div class="block-title">
<h3 class="panel-title">额度卡密列表 </h4><b>共有<?=$kms?>个卡密</b>
<a href="./km.php?my=delq" class="btn btn-xs btn-success">清空已使用</a>&nbsp;
<a href="./km.php?my=dels" class="btn btn-xs btn-warning"> 清空所有</a></div>
<div class="panel-body">
<form method="post" action="" >
<input type="hidden" name="do" value="do">
<div class="input-group"> 
              <span class="input-group-addon">卡密生成</span>
              <input type="text" name="num"  class="form-control" placeholder="输入需要生成的个数">
              <input type="text" name="number"  class="form-control" placeholder="输入需要生成卡密的面值">
            </div><br/>
<div class="col-sm-12"><input type="submit" value="确认生成" class="btn btn-primary form-control"/></div>
</from>
</div>
  <div class="panel-footer text-center">请填写生成卡密数量与面值再生成</div>
	</div>
			<div class="block">
				<div class="block-title">
					<h3 class="panel-title">卡密列表 </h3></div>
					<div class="table-responsive">
                    <table class="table">
          <thead><tr><th>ID</th><th>卡密</th><th>状态</th><th>用户</th><th>添加时间</th><th>使用时间</th><th>面值</th><th>操作</th></tr></thead>
          <tbody>
<?php
$gls=$DB->count("SELECT count(*) from qqlogin_kms WHERE 1");
$sql=" 1";
$pagesize=30;
if (!isset($_GET['page'])) {
	$page = 1;
	$pageu = $page - 1;
} else {
	$page = $_GET['page'];
	$pageu = ($page - 1) * $pagesize;
}

echo $con;
$rs=$DB->query("SELECT * FROM qqlogin_kms WHERE 1 order by id desc limit $pageu,$pagesize");
while($res = $DB->fetch($rs))
{
if($res['zt']==1){$zt='<font color="gree">未使用</font>';}else{$zt='<font color="red">已使用</font>';}
echo '<tr><td>'.$res['id'].'</td><td>'.$res['km'].'</td><td>'.$zt.'</td><td>'.$res['userid'].'</td><td>'.$res['addtime'].'</td><td>'.$res['usetime'].'</td><td>'.$res['number'].'</td><td><a href="./km.php?my=del&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此条授权记录吗？\');">删除</a></td></tr>';
}
?>
          </tbody>
        </table>
      </div>
<?php
echo'<ul class="pagination">';
$s = ceil($gls / $pagesize);
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$s;
if ($page>1)
{
echo '<li><a href="?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$s;$i++)
echo '<li><a href="?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$s)
{
echo '<li><a href="?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
?>
    </div>
  </div>