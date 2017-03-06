<?php
header("content-type:text/html;charset=utf-8");
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $adminName=$_POST['adminName'];
  $adminPwd=md5($_POST['adminPwd']);	
  include("conn.php");
  $rs=mysql_query("select * from admins where adminName='$adminName' and adminPwd='$adminPwd'");
  $num=mysql_num_rows($rs);
  if($num>0){
	  $info=mysql_fetch_array($rs);
	  $_SESSION['login']='success';
	  $_SESSION['adminName']=$adminName;
	  $_SESSION['adminAuth']=$info['adminAuth'];
	  $_SESSION['adminFace']=$info['adminFace'];
	  echo '1';
	  }else{
		  echo '0';
	  }
}else{
  header("location:error.php");
}
?>