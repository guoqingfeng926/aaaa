<?php
header("content-type:text/html;charset=utf-8");
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $adminName=$_POST['adminName'];
  $adminPwd=md5($_POST['adminPwd']);
  $adminFace=$_POST['adminFace'];
  $qq=$_POST['qq'];	
  $phone=$_POST['phone'];
  include("conn.php");
  $num=mysql_query("insert into admins(adminName,adminPwd,adminFace,qq,phone) values('$adminName','$adminPwd','$adminFace','qq','phone')");
  if($num>0){
	 echo "1";
	  }else{
		  echo '0';
	  }
}else{
  header("location:error.php");
}
?>