<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>添加书籍</title>
<link rel="stylesheet" href="css/public.css">
<link rel="stylesheet" href="css/upload.css">
</head>

<body>
<div>
<h3>图书后台管理系统</h3>
<a href="index.php">返回首页</a>
<form name="uploadimg" method="post" enctype="multipart/form-data" action="uploadchuli.php">
  书名:<input type="text" name="bookName" size="30"><br>
  原价:<input type="text" size="4" name="bookOri"><br>
  现价:<input type="text" size="4" name="bookPrice"><br>
  图片:<input type="file" name="bookPic" ><span id="tips"></span><br>
  出版社:<input type="text" name="bookPub" size="50"><br>
  <input type="submit" name="submit" value="添加图书">
</form>
</div>
</body>
</html>