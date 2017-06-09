<?php

	require_once "MessageService.class.php";
	
	$sender=$_POST['sender'];
	$receiver=$_POST['receiver'];
	$con=$_POST['content'];
	
	//file_put_contents("d:/myChatRoomLog.log",$sender.'-'.$receiver.'-'.$con."\r\n",FILE_APPEND);
	//send message from login user
	$messageService=new messageService();
	$messageService->addMessage($sender,$receiver,$con);
	
?>