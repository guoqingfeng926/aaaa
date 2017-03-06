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
var page=1;
var pagecount=1;
addEvent(window,"load",function(){
   var datalist=document.getElementById("datalist");
   
   //json处理函数及数据显示
   function jsonView(data){
	   data=eval("("+data+")");
		 var str="";
		 for(var i in data){
			 if(i<data.length-1){
			 str+="<td>"+data[i].bookId+"</td>"+"<td>"+data[i].bookName+"<br><img src=images/"+data[i].bookPic+"></td>"+"<td class='bookOri'>"+data[i].bookOri+"元</td>"+"<td>"+data[i].bookPrice+"元</td>"+"<td>"+data[i].bookPub+"</td>"+"<td>"+data[i].bookAddTime+"</td></td><td><input name='delbook' type='button' data-bookId="+data[i].bookId+" value='删除'></td><td>更新</td><td>添加</td></tr>";
			
			 }else{
				  pagecount=data[i].pagecount;				
			 }
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
   ajax("GET","books.php?page="+page,function(data){
	     jsonView(data);
		//分页:上一页 下一页
		var pageUp=document.getElementById("pageUp");//上一页按钮
		var pageDown=document.getElementById("pageDown");//下一页按钮
		//上一页ajax请求
		addEvent(pageUp,"click",function(){
		    page=page-1;
			if(page<=1){
				page=1;
				pageUp.style.visibility="hidden";
				pageDown.style.visibility="visible";
				}else{
					pageUp.style.visibility="visible";
					}
			ajax("GET","books.php?page="+page,function(data){
				jsonView(data);
				},function(errorMessage){});	
		});
		//下一页ajax请求
		addEvent(pageDown,"click",function(){
		    page=page+1;
			if(page>=pagecount){
				page=pagecount;
				pageDown.style.visibility="hidden";
				pageUp.style.visibility="visible";
				}else{
					pageDown.style.visibility="visible";
					}
			ajax("GET","books.php?page="+page,function(data){
				jsonView(data);
				},function(errorMessage){});	
		});
		
		
		
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
             <td colspan="9"><img src="images/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="images/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="images/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="images/hourglass.gif"></td>
          </tr>
          <tr>
             <td colspan="9"><img src="images/hourglass.gif"></td>
          </tr>
          </tbody>
          <tfoot>
          <tr>
            <td style="border:none;" align='right' colspan='9'><span id='pageUp'>上一页</span>  <span id='pageDown'>下一页</span></td></tr>
          </tfoot>
       </table>
   </div>
</div>
</body>
</html>