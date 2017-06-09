<?php
	
	require_once 'SqlHelper.class.php';
	
	class MessageService {
		//add message in the database
		function addMessage($sender,$receiver,$con) {
			
			date_default_timezone_set('America/New_York');
			$now=date('Y-m-d H:i:s',time());
			
			$sql="insert into messages (sender,receiver,content,sendTime) 
			values ('$sender','$receiver','$con','$now')";
			
			$sqlHelper=new SqlHelper();
			$sqlHelper->execute_dml($sql);
			$sqlHelper->close_conn();
			
		}
		//get message from the database
		function getMessage($sender,$receiver) {
			//select the unread message to the user
			$sql="select * from messages where sender='$sender' and receiver='$receiver' and isGet='0'";
			//set message as sent message(isGet=1)
			$sql1="update messages set isGet=1 where sender='$sender' and receiver='$receiver' and isGet='0'";
			
			$sqlHelper=new SqlHelper();	
			$arr=$sqlHelper->execute_dql_assoc($sql);
			if(isset($arr)){
				$sqlHelper->execute_dml($sql1);
			}
			$sqlHelper->close_conn();
			
			$messageInfo="<message>";
			for($i=0;$i<count($arr);$i++) {
				$messageInfo.="<messId>$i</messId><sender>{$arr[$i]['sender']}</sender><receiver>{$arr[$i]['receiver']}</receiver><con>{$arr[$i]['content']}</con><sendTime>{$arr[$i]['sendTime']}</sendTime>";
			}
			$messageInfo.="</message>";
			//file_put_contents("d:/myChatRoomLog.log",$messageInfo."\r\n",FILE_APPEND);
			return $messageInfo;
		}
	}