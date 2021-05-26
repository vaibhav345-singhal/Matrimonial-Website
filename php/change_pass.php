<?php
    ob_start();
	session_start();
	include("db.php");
	if(!isset($_COOKIE["email"])){
		header("location:login.php");
	}
	else{
	    $email =mysqli_real_escape_string($conn,$_COOKIE["email"]);
	    if(!isset($_SESSION[$email])){
		    header("location:login.php");
		}
		else{
			if(empty($_POST["cp"]) || empty($_POST["np"]) || empty($_POST["rp"]) ){
				header("location:change_password.php?empty=1");
			}
			else{
				$cp=mysqli_real_escape_string($conn,$_POST["cp"]);
				$np=mysqli_real_escape_string($conn,$_POST["cp"]);
				$rp=mysqli_real_escape_string($conn,$_POST["cp"]);
				$rs=mysqli_query($conn,"select * from users where email='$email'");
				if($r=mysqli_fetch_array($rs)){
				  if($r["password"]==$cp){
					if($np==$rp){
						if(mysqli_query($conn,"update users set password='$np' where email='$email'")>0){
							header("location:change_password.php?success=1");
						}
						else{
							header("location:change_password.php?error=1");
						}
					
					}
					else{
						header("location:change_password.php?missmatch=1");
					}
				  }
				  else{
				  
				  	header("location:change_password.php?invalid_pass=1");
				  }
					
					
				}
				else{
					header("location:logout.php");
				}
				
			
			
			
			}
		
		
		}
	}
?>