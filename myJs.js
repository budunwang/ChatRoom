//创建Ajax对象
function getXmlHttpObject() {
	var xmlHttpRequest;
	if (window.XMLHttpRequest) {
		xmlHttpRequest=new XMLHttpRequest();
	}else {
		xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlHttpRequest;
}

function $(id) {
	return document.getElementById(id);
}