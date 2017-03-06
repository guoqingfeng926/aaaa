<?php
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=='POST'){
include("conn.php");
$bookId=$_POST['bookId'];
$rs=mysql_query("select * from books where bookId='$bookId'");
$info=mysql_fetch_array($rs);
echo '{"bookId":"'.$info['bookId'].'",'.'"bookName":"'.$info['bookName'].'",'.'"bookOri":"'.$info['bookOri'].'",'.'"bookPrice":"'.$info['bookPrice'].'",'.'"bookPic":"'.$info['bookPic'].'",'.'"bookPub":"'.$info['bookPub'].'"'.'}';
}else{
  echo "<script>location.href='error.php';</script>";	
}
?>