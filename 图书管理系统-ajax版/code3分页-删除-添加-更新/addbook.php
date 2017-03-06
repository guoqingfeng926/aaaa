<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>添加书籍</title>
<link rel="stylesheet" href="css/public.css">
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/addevent.js"></script>
<script>
addEvent(window,"load",function(){
   var bookName=document.getElementById("bookName");	
   var ufile=document.getElementById("ufile");	
   var btn=document.getElementById("btn");	
   addEvent(btn,"click",function(){
	   var xmlHttp=new XMLHttpRequest();
	   xmlHttp.open("POST","addbookchuli.php");
	    
  }); 
});
</script>
</head>

<body>

</body>
</html>