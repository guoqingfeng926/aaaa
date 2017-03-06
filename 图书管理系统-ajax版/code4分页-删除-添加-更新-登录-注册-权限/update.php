<?php  session_start() ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>更新书籍</title>
<link rel="stylesheet" href="css/public.css">
<link rel="stylesheet" href="css/upload.css">
<script type="text/javascript" src="js/addevent.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<?php if(@$_SESSION['adminAuth']=='admin'){ ?>
<script>
addEvent(window,"load",function(){
  var bookIdUpdate=location.search.toLowerCase().substring(8);
  if(bookIdUpdate!=""){
  ajax("POST","updatedata.php",function(data){
	    data=eval("("+data+")");
		var $=function(_id){return document.getElementById(_id);}
		bookId=$("bookId");
		bookName=$("bookName");
		bookOri=$("bookOri");
		bookPrice=$("bookPrice");
		bookPub=$("bookPub"); 
		bookId.value=bookIdUpdate;
		bookName.value=data.bookName;
		bookOri.value=data.bookOri;
		bookPrice.value=data.bookPrice;
		bookPub.value=data.bookPub;	
			
    },function(){},"bookId="+bookIdUpdate);	
  }else{
	  location.href="index.php"; 
  }
});
</script>
</head>

<body>
<div>
<h3>图书后台管理系统</h3>
<a href="index.php">返回首页</a>
<form name="uploadimg" method="post" enctype="multipart/form-data" action="updatechuli.php">
  书名:<input type="text" name="bookName" id="bookName" size="30"><br>
  原价:<input type="text" size="4" name="bookOri" id="bookOri"><br>
  现价:<input type="text" size="4" name="bookPrice" id="bookPrice"><br>
  图片:<input type="file" name="bookPic" id="bookPic"><span id="tips"></span><br>
  出版社:<input type="text" name="bookPub" id="bookPub" size="50"><br>
  <input type="hidden" name="bookId" value="" id="bookId">
  <input type="submit" name="submit" value="更新书籍">
</form>
</div>
</body>
<?php }else{
	echo "<script>alert('权限不足');location.href='error.php';</script>";
	}  ?>
</html>