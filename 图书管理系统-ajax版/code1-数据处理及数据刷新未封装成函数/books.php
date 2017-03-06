<?php
header("content-type:text/html;charset=utf-8");
sleep(1);
include("conn.php");
$rs=mysql_query("select * from books");
$json="[";
while($info=mysql_fetch_array($rs)){
   	$json.='{"bookId":"'.$info['bookId'].'",'.'"bookName":"'.$info['bookName'].'",'.'"bookPrice":"'.$info['bookPrice'].'",'.'"bookOri":"'.$info['bookOri'].'",'.'"bookPub":"'.$info['bookPub'].'",'.'"bookAddTime":"'.$info['bookAddTime'].'",'.'"bookPic":"'.$info['bookPic'].'"},';
}
echo substr($json,0,strlen($json)-1)."]";
?>