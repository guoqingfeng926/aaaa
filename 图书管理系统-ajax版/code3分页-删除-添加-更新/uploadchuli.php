<?php
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=='POST'){
    $bookName=$_POST['bookName'];
	$bookOri=$_POST['bookOri'];
	$bookPrice=$_POST['bookPrice'];
	$bookPub=$_POST['bookPub'];
	$fileName=time().$_FILES['bookPic']['name'];
	$fileSize=$_FILES['bookPic']['size'];
    include("conn.php");
	$num=mysql_query("insert into books(bookName,bookOri,bookPrice,bookPic,bookPub,bookAddTime) values('$bookName','$bookOri','$bookPrice','$fileName','bookPub',now())");
	if($num>0){
        header("location:upload.php");		
	 }else{
		echo "<script>alert('添加书籍失败,请联系管理员！');</script>";	
	}
	$fileNameKZ=strstr($fileName,".");
	if($fileSize<2097152){
		if(strstr(".jpg.png.gif",$fileNameKZ)){
			 move_uploaded_file($_FILES['bookPic']['tmp_name'],'upload/'.$fileName);
		   }else{
			  echo "<script>alert('图片格式不是.jpg.png.gif');location.href='uploadchuli.php';</script>";
		   }
		}else{
		  echo "<script>alert('图片大小不能超过2MB');location.href='uploadchuli.php';</script>";	
		}
}else{
	header("location:error.php");
}
?>