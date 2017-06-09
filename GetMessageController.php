<?php
	
	require_once "MessageService.class.php";
	
	header("Content-Type:text/xml;charset=utf-8");
	header("Cache-Control:no-cache");	

	$sender=$_POST['sender'];
	$receiver=$_POST['receiver'];
	
	//file_put_contents("d:/myChatRoomLog.log",$sender.'-'.$receiver.'-'.$con."\r\n",FILE_APPEND);
	//get message from friends
	$messageService=new messageService();
	$messageList=$messageService->getMessage($sender,$receiver);
	echo $messageList;
?>