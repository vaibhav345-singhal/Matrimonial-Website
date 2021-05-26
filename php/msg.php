<?php
		ob_start();
		session_start();
		include("db.php");
		if(!isset($_COOKIE["email"])){
			header("location:login.php");
		}
		else{
			$email = mysqli_real_escape_string ($conn,$_COOKIE["email"]);
			if(!isset($_SESSION[$email])){
				header("location:login.php");
			}
			else{
				if(empty($_POST["message"])){
					header("location:profile.php");
				}
				else{
					

						$id = mysqli_real_escape_string($conn,$_REQUEST["id"]);
						$to_email="";
						$sn=0;
					$rs=mysqli_query($conn,"select MAX(sn) from inbox");
					if($r=mysqli_fetch_array($rs)){
						$sn=$r[0];
					}
					$sn++;


					$code="";
					$a=array();
					for($i='A';$i<='Z';$i++){
						array_push($a,$i);
						if($i=='Z')
							break;
					}

					for($i=0;$i<=9;$i++){
						array_push($a,$i);
					}

					for($i='a';$i<='z';$i++){
						array_push($a,$i);
						if($i=='z')
							break;
					}

					$b=array_rand($a,6);
					for($i=0; $i<sizeof($b); $i++){
						$code=$code.$a[$b[$i]];
					}
					$code=$code."_".$sn;

					$from_code="";
					$dr=mysqli_query($conn,"select code from users where email='$email'");
					if($rd=mysqli_fetch_array($dr)){
						$from_code=$rd[0];
					}
					$dr=mysqli_query($conn,"select email from users where code='$id'");
					if($rd=mysqli_fetch_array($dr)){
						$to_email=$rd[0];
					}
					$msg=mysqli_real_escape_string($conn,$_POST["message"]);
					$dt=date("d m Y");
					mysqli_query($conn,"insert into inbox values($sn,'$code','$email','$from_code','$to_email','$id','$msg','$dt')");
					header("location:view_msg.php?success=1");
			  }
			
			}
		}
?>