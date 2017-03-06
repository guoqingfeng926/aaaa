function ajax(method,uri,success,error,data){
	//method 请求方法GET/POST
	//uri 请求目标地址
	//success 成功回调函数
	//error 异常回调函数
	//data 方法
	try{
		 //创建ajax对象
		 if(window.XMLHttpRequest){
		   var xmlHttp=new XMLHttpRequest();	
		 }else{
			//IE6
			var xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			 //设置请求方法和目标地址
		 xmlHttp.open(method,uri,false);
		 //设置请求参数或post方法提交数据的编码格式
		 if(data){
			 //带请求参数
			   if(method=="GET"){
				   //get方法带请求参数
				   uri=uri+"?"+data;
				   }else{
					   //post方法带请求参数
					   xmlHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
					   }
			 }
        //事件绑定
		xmlHttp.onreadystatechange=function(){
		   if(xmlHttp.readyState==4 && xmlHttp.status==200){
			    success(xmlHttp.responseText);  
			 }	
		};
		//发送请求:
		if(data && method=="POST"){
			//post方法，有请求数据
			  xmlHttp.send(data);
			}else{
				//get方法或post方法没有请求数据
				xmlHttp.send();
		}
		
	  }catch(e){
			error(e.message);
	  }
}