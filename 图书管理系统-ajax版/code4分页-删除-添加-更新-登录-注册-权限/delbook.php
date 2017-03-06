<?php
header("content-type:text/html;charset=utf-8");
$bookId=$_POST['bookId'];
if(!empty($bookId)){
   include("conn.php");
   $num=mysql_query("delete from books where bookId='$bookId'");
   if($num>0){
	  echo '{"status":"0","msg":"删除成功"}';   
   }else{
	   echo '{"status":"1","msg":"删除失败"}';
	   }  	
}else{
	echo '{"status":"2","msg":"bookId为空"}';
}
?>