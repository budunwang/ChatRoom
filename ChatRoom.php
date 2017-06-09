<html>
<head>
<meta http-equiv="content-type" cotent="text/html;charset=utf-8"/>
<?php
	$receiver=$_GET['receiver'];
	session_start();
	$sender=$_SESSION['loginUser'];
?>
<script src="myJs.js" type="text/javascript"></script>
<script langauge="javascript">
	//get message in 5 seconds
	window.setInterval("getMessage()",5000);
	//send message
	function sendMessage() {
		var myXmlHttpRequest=getXmlHttpObject();
		if(myXmlHttpRequest) {
			var url="SendMessageController.php";
			var data="content="+$("content").value+"&receiver=<?php echo $receiver;?>"+"&sender=<?php echo $sender;?>";
			
			myXmlHttpRequest.open("post",url,true);
			myXmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			myXmlHttpRequest.onreadystatechange=function fn() {
				if(myXmlHttpRequest.readyState==4) {
					if(myXmlHttpRequest.status==200) {
					}
				}
			}
			
			myXmlHttpRequest.send(data);
			
			var time=new Date();
			var timeFormat=time.getFullYear()+"-"+(time.getMonth()+1)+"-"+time.getDate()+" "+(time.getHours())+":"+time.getMinutes()+":"+time.getSeconds();
			var str="<?php echo $sender;?>: "+$("content").value+" "+timeFormat+"\n";;
			$("contentbox").value+=str;
			$("content").value="";
		}
	}
	//get message
	function getMessage() {
		var myXmlHttpRequest=getXmlHttpObject();
		if(myXmlHttpRequest) {
			var url="GetMessageController.php";
			var data="receiver=<?php echo $sender;?>"+"&sender=<?php echo $receiver;?>";
			myXmlHttpRequest.open("post",url,true);
			myXmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			myXmlHttpRequest.onreadystatechange=function fn() {
				if(myXmlHttpRequest.readyState==4) {
					if(myXmlHttpRequest.status==200) {
						//get XML object
						var messageResult=myXmlHttpRequest.responseXML;
						//get message content
						var contentList=messageResult.getElementsByTagName("con");
						//get message sendTime
						var sendTimeList=messageResult.getElementsByTagName("sendTime");
						//window.alert(contentList.length+" "+sendTimeList.length);
						if(contentList.length!=0) {
							for(var i=0;i<contentList.length;i++) {
								//window.alert(contentList[i].childNodes[0].nodeValue);
								var str="<?php echo $receiver;?>: "+contentList[i].childNodes[0].nodeValue+" "+sendTimeList[i].childNodes[0].nodeValue+"\n";		
								$("contentbox").value+=str;
							}
						}
						
					}
				}
			}
			
			myXmlHttpRequest.send(data);
		}
	}
</script>
</head>
<center>
<h1><?php echo $sender;?> Talk to <?php echo $receiver?></h1>
<textarea cols="100" rows="20" id="contentbox"></textarea></br></br>
<input type="text" id="content" style="width:500px"/>
<input type="button" value="send" onclick="sendMessage()" />
<center>
</html>