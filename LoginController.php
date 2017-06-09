<?php
	
	$loginUser=$_POST['userid'];
	$loginPassword=$_POST['password'];
	
	if($loginPassword=='admin') {
		//set loginUser in the session
		session_start();
		$_SESSION['loginUser']=$loginUser;
		//go to friend list page
		header("Location:FriendList.php");
		exit();
	} else {
		header("Location:login.php");
		exit();
	}

?>