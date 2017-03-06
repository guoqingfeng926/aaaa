<?php session_start();  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>搜索书籍</title>
<link rel="stylesheet" href="css/public.css">
<link rel="stylesheet" href="css/index.css">
<script type="text/javascript" src="js/addevent.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<?php if(@$_SESSION['adminAuth']=='admin'){ ?>
<script>
addEvent(window,"load",function(){
	var bookName=location.search.toLowerCase().substring(10);
	if(bookName!=""){
	//获得tbody id
   var datalist=document.getElementById("datalist");  
   //json处理函数及+数据显示+删除事件绑定
   function jsonView(data){
	   data=eval("("+data+")");
		 var str="";
		 for(var i in data){			
			 str+="<td>"+data[i].bookId+"</td>"+"<td>"+data[i].bookName+"<br><img src=upload/"+data[i].bookPic+"></td>"+"<td class='bookOri'>"+data[i].bookOri+"元</td>"+"<td>"+data[i].bookPrice+"元</td>"+"<td>"+data[i].bookPub+"</td>"+"<td>"+data[i].bookAddTime+"</td></td><td><input name='delbook' type='button' data-bookId="+data[i].bookId+" value='删除'></td><td><a href='update.php?bookId="+data[i].bookId+"'>更新</a></td><td><a href='upload.php'>添加</a></td></tr>";
		 }
		datalist.innerHTML=str;
		//绑定deletebook事件
		var delbooks=document.getElementsByName("delbook");
		if(delbooks!=null){
		for(var j=0;j<delbooks.length;j++){
		   addEvent(delbooks[j],"click",function(){
			  //删除数据库中的记录
			  var data="bookId="+this.getAttribute("data-bookId");
			  ajax("POST","delbook.php",function(data){
				 //ajax请求成功后回调函数
				 data=eval("("+data+")");
			  },function(errorMessage ){
				    console.log(errorMessage);  
			  },data);
			  //删除当前DOM节点
			  this.parentNode.parentNode.outerHTML="";
		   });	
		}
		}
	}
   //onload页面ajax初始化
   ajax("POST","searchchuli.php",function(data){
	     if(data!=0){
	     jsonView(data);		
		}else{
			 datalist.innerHTML="<tr><td style='border:none;color:#f00;'>没有符合条件的记录</td></tr>";
		}
		//绑定updatebook事件
	   },function(errorMessage){
		   error(errorMessage);
		   },"bookName="+bookName);
    //点击搜索按钮进行搜索
	var btn=document.getElementById("btn");
	var keywords=document.getElementById("keywords");
	addEvent(btn,"click",function(){
		ajax("POST","searchchuli.php",function(data){
		if(data!=0){
	     jsonView(data);		
		}else{
			 datalist.innerHTML="<tr><td style='border:none;color:#f00;'>没有符合条件的记录</td></tr>";
		}
		//绑定updatebook事件
	   },function(errorMessage){
		   error(errorMessage);
		   },"bookName="+keywords.value);
	  });
	
	}else{
	  location.href="index.php";	
    }
});

</script>
</head>

<body>
<div  class="container">
<h3>图书后台管理系统</h3>
<a href="index.php">返回首页</a>
<input type="text" name="keywords" id="keywords">
<input type="button" name="btn" id="btn" value="搜索">
<div>
       <table width="100%"  >
        <thead>
          <tr>
              <td>编号</td>
              <td>书名</td>
              <td>原价</td>
              <td>现价</td>
              <td>出版社</td>
              <td>上架时间</td>
              <td>删除</td>
              <td>更新</td>
              <td>添加</td>
          </tr>
          </thead>
          <tbody id="datalist">
          <tr>
             <td colspan="9"><img src="upload/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="upload/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="upload/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="upload/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="upload/hourglass.gif"></td>
          </tr>
          </tbody>
          
       </table>
   </div>
</div>
</body>
<?php }else{
	echo "<script>alert('权限不足');location.href='error.php';</script>";
	}  ?>
</html>