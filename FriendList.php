<html>
<head>
<meta http-equiv="content-type" cotent="text/html;charset=utf-8"/>
<script src="myJs.js" type="text/javascript"></script>
<script language="javascript">
	//set link color
	function linkchange(obj,val) {
		if(val=="on") {
			obj.style.color="red";
		} else {
			obj.style.color="black";
		}
	}
	
	function openChatRoom(obj) {
		window.open("ChatRoom.php?receiver="+encodeURI(obj.innerText),"_blank");
	}
	
</script>
</head>
<h1>list</h1>
<ul>
<li onmouseover="linkchange(this,'on')" onmouseout="linkchange(this,'off')" onclick="openChatRoom(this)">a1</li>
<li onmouseover="linkchange(this,'on')" onmouseout="linkchange(this,'off')" onclick="openChatRoom(this)">a2</li>
<li onmouseover="linkchange(this,'on')" onmouseout="linkchange(this,'off')" onclick="openChatRoom(this)">a3</li>
</ul>
</html>