<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书管理系统</title>
<link rel="stylesheet" href="css/public.css">
<link rel="stylesheet" href="css/index.css">
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/addevent.js"></script>
<script>
addEvent(window,"load",function(){
   var datalist=document.getElementById("datalist");
   //页面ajax初始化
   ajax("GET","books.php",function(data){
	     data=eval("("+data+")");
		 var str="<tr><td>编号</td><td>书名</td><td>原价</td><td>现价</td><td>出版社</td><td>上架时间</td><td>删除</td><td>更新</td><td>添加</td></tr><tr>";
		 for(var i in data){
			 str+="<td>"+data[i].bookId+"</td>"+"<td>"+data[i].bookName+"<br><img src=images/"+data[i].bookPic+"></td>"+"<td class='bookOri'>"+data[i].bookOri+"元</td>"+"<td>"+data[i].bookPrice+"元</td>"+"<td>"+data[i].bookPub+"</td>"+"<td>"+data[i].bookAddTime+"</td></td><td><input name='delbook' type='button' data-bookId="+data[i].bookId+" value='删除'></td><td>更新</td><td>添加</td></tr>";
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
				 switch(data.status){
				     case "0":
					 console.log(data.msg);
					 break;
					 case "1":
					 console.log(data.msg);
					 break;
					 case "2":
					 console.log(data.msg);
					 break;
					 default:
					 console.log("返回参数错误");	 
			     }
			  },function(errorMessage ){
				    console.log(errorMessage);  
			  },data);
			  //删除当前DOM节点
			  this.parentNode.parentNode.outerHTML="";
		   });	
		}
		}
		//绑定updatebook事件
	   },function(errorMessage){
		   error(errorMessage);
		   });
});

</script>
</head>

<body>
<div class="container">
   <h3 id="h3">图书管理系统</h3>
   <div>
       <table width="100%"  id="datalist">
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
          <tr>
             <td colspan="9"><img src="images/loading.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="images/loading.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="images/loading.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="images/loading.gif"></td>
          </tr>
       </table>
   </div>
</div>
</body>
</html>