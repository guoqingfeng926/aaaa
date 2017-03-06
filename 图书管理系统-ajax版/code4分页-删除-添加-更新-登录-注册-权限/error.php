<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>错误页面</title>
<style>
div{
	width:900px;
	text-align:center;
	margin:0px auto;
	font:12px/1.5em 宋体;
	color:#666;
	margin-top:100px;
}
</style>
<script>
  window.onload=function(){
	  var i=3;
	  var div1=document.getElementById("div1");
	  var sid=setInterval(function(){
		   div1.innerHTML= "发生错误，请联系管理员！<br>系统将在"+(i--)+"秒后跳转到登录页面!";
     if(i==0){
		 location.href="default.html";
		 }
	   },1000);
	  
  };
</script>
</head>

<body>
  <div id="div1"></div>
</body>
</html>