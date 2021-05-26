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
		   $rs=mysqli_query($conn,"select * from users where email='$email'");
		   if($r=mysqli_fetch_array($rs)){
		   
		   		$target = "photo/";  
				$target = $target . $r["code"].".jpg";  

				if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){ 
		   			header("location:edit_profile.php?img_success=1");
		         }
				 else{
				     header("location:edit_profile.php?img_err=1");
				 }
		   }
		   else{
		   	header("location:logout.php");
		   }
		}
    }
?>