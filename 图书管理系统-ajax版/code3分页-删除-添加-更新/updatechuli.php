<?php
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=='POST'){
	$bookId=$_POST['bookId'];
    $bookName=$_POST['bookName'];
	$bookOri=$_POST['bookOri'];
	$bookPrice=$_POST['bookPrice'];
	$bookPub=$_POST['bookPub'];
	$fileName=time().$_FILES['bookPic']['name'];
	$fileSize=$_FILES['bookPic']['size'];
    include("conn.php");
	$num=mysql_query("update books set bookName='$bookName',bookOri='$bookOri',bookPrice='$bookPrice',bookPub='$bookPub',bookPic='$fileName' where bookId='$bookId'");
	if($num>0){
        header("location:index.php");		
	 }else{
		echo "<script>alert('更新书籍失败,请联系管理员！');</script>";	
	}
	$fileNameKZ=strstr($fileName,".");
	if($fileSize<2097152){
		if(strstr(".jpg.png.gif",$fileNameKZ)){
			 move_uploaded_file($_FILES['bookPic']['tmp_name'],'upload/'.$fileName);
		   }else{
			  echo "<script>alert('图片格式不是.jpg.png.gif');location.href='update.php?bookId='".$bookId.";</script>";
		   }
		}else{
		  echo "<script>alert('图片大小不能超过2MB');location.href='update.php?bookId='".$bookId.";</script>";	
		}
}else{
	header("location:error.php");
}
?>