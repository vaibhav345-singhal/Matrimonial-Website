<?php

	ob_start();
	session_start();
	include("db.php");
	if(empty($_POST["email"]) ||  empty($_POST["pass"]) ){
		header("location:index.php?empty=1");
	}
	else{
		$mail = mysqli_real_escape_string ($conn,$_POST["email"]);
		$pass = mysqli_real_escape_string ($conn,$_POST["pass"]);
		
		$rs = mysqli_query($conn,"select * from users where email='$mail'");
		if($r = mysqli_fetch_array($rs)){
			if($r["password"] == $pass){
				setcookie("email",$mail,time()+3600*24);
				$_SESSION[$mail]=$pass;
				header("location:profile.php");
			}
			else{
				header("location:index.php?invalid=1");
			}
		}
		else{
			header("location:index.php?invalid_email");
		}
		
	}
	
?>
			