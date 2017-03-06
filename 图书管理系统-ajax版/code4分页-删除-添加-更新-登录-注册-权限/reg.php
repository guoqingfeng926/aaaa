<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>欢迎注册</title>
<link rel="stylesheet" href="css/public.css">
<link rel="stylesheet" href="css/login.css">
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/addevent.js"></script>
<script>
addEvent(window,"load",function(){
   var $=function(_id){return document.getElementById(_id);};
   adminName=$("adminName");
   adminPwd=$("adminPwd");
   adminFace=$("adminFace");
   qq=$("qq");	
   phone=$("phone");
   face=$("face");
   reg=$("reg");
   btn=$("btn");
   addEvent(adminFace,"change",function(){
	   face.src="img/face/"+this.value;   
   });
   
   //检测用户名是否被占用
   //提交表单数据
   addEvent(btn,"click",function(){
	   alert();
	   var data="adminName="+adminName.value+"&adminPwd="+adminPwd.value+"&adminFace="+adminFace.value+"&qq="+qq.value+"&phone="+phone.value;
	     ajax("POST","regchuli.php",function(data){
	   if(data==1){	      
		  var i=3;
		  var sid=setInterval(function(){
			    reg.innerHTML="恭喜您,会员注册成功，"+(i--)+"秒后跳转到登录页面！";				
				if(i==0){
					location.href="default.html";
					clearInterval(sid);
					}
		  },1000);
	   }else{
		  alert("会员注册失败，请联系管理员！");
	   }   
     },function(){},data);
   });
 
});
</script>
</head>

<body>
<div class="container" id="reg">
  <h3>图书管理系统会员预注册</h3>
<form name="reg" action="regchuli.php" method="post">
 用 &nbsp;户&nbsp;名&nbsp;:<input type="text" name="adminName" id="adminName"><span id="adminNameTips"></span><br>
  密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:<input type="password" name="adminPwd" id="adminPwd"><br>
  确认密码:<input type="password" name="adminPwd2" id="adminPwd2"><br>
  头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像:<select name="adminFace" id="adminFace">
       <option value="1.gif" selected>男力士</option>
       <option value="2.gif" selected>男剑客</option>
       <option value="3.gif" selected>男武士</option>
       <option value="4.gif" selected>女武士</option>
       <option value="5.gif" selected>男武士2</option>
       <option value="6.gif" selected>男力士</option>
      </select><img id="face" src="img/face/1.gif" width="30"><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ:<input type="text" name="qq" id="qq"><br>
  联系电话:<input type="text" name="phone" id="phone"><br>
<input type="button" name="btn" id="btn" value="注册" class="submit">
</form>
</div>
</body>
</html>