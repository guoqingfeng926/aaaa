<?php
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=='POST'){
$bookName=$_POST['bookName'];
  if(!empty($bookName)){
   include("conn.php");
$rs=mysql_query("select * from books where bookName like '%$bookName%'");
$num=mysql_num_rows($rs);
if($num>0){
  
$json="[";
while($info=mysql_fetch_array($rs)){	
   	$json.='{"bookId":"'.$info['bookId'].'",'.'"bookName":"'.$info['bookName'].'",'.'"bookPrice":"'.$info['bookPrice'].'",'.'"bookOri":"'.$info['bookOri'].'",'.'"bookPub":"'.$info['bookPub'].'",'.'"bookAddTime":"'.$info['bookAddTime'].'",'.'"bookPic":"'.$info['bookPic'].'"},';

}
	
echo substr($json,0,strlen($json)-1)."]"; 
}else{
	   echo "0";
	   }
  }else{
    header("location:search.php");
  }
}else{
  echo "<script>location.href='error.php';</script>";	
}
?>