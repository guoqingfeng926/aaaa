<?php
session_start();
if(@$_SESSION['login']=='success'){
header("content-type:text/html;charset=utf-8");
//分页
$page=$_GET['page'];
if($page<1){
  $page=1;
}
//分页
include("conn.php");
$rs=mysql_query("select * from books");
$rscount=mysql_num_rows($rs);
if($rscount%5==0){
  $pagecount=floor($rscount/5);	
}else{
  $pagecount=ceil($rscount/5);	
}
if($page>$pagecount){
   $page=$pagecount;
   $status=1;	
}
mysql_data_seek($rs,($page-1)*5);
$json="[";
for($i=1;$i<=5;$i++){
	if($info=mysql_fetch_array($rs)){
   	$json.='{"bookId":"'.$info['bookId'].'",'.'"bookName":"'.$info['bookName'].'",'.'"bookPrice":"'.$info['bookPrice'].'",'.'"bookOri":"'.$info['bookOri'].'",'.'"bookPub":"'.$info['bookPub'].'",'.'"bookAddTime":"'.$info['bookAddTime'].'",'.'"bookPic":"'.$info['bookPic'].'"},';
	}
}

$json.='{"pagecount":'.$pagecount.'}';	

echo $json."]";
}else{
	echo "";
	}
?>