<?php 
     ob_start();
	 session_start();
	 include("db.php");
	 	if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["occup"])|| empty($_POST["height"])|| empty($_POST["day"]) || empty($_POST["month"]) || empty($_POST["year"]) || empty($_POST["gender"]) ||empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["religion"]) ||empty($_POST["marital"])){
		header("location:register.php?empty=1");
		}
		else{
			$fname=$_POST["fname"];
			$lname=$_POST["lname"];
			$email=$_POST["email"];
			$pass=$_POST["pass"];
			$occupation=$_POST["occup"];
			$height=$_POST["height"];
			$day=$_POST["day"];
			$month=$_POST["month"];
			$year=$_POST["year"];
			$gender=$_POST["gender"];
			$city=$_POST["city"];
			$state=$_POST["state"];
			$religion=$_POST["religion"];
			$marital=$_POST["marital"];
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from users");
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
			
			$target = "photo/";
			$target = $target.$code.".jpg";
			if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){

				$rs=mysqli_query($conn,"select 'email' from users where email='$email'");
					if($r=mysqli_fetch_array($rs)){
						header("location:register.php?error=1&Same_email");
						
					}
				
				    else{
						if(mysqli_query($conn,"insert into users values('$code',$sn,'$fname','$lname','$email','$pass','$occupation','$height',$day,$month,$year,'$gender','$city','$state','$religion','$marital')")>0){
							header("location:register.php?success=1");
						}
						else{
							header("location:register.php?error=1");
						}

					}
						
			}
					else{
						header("location:register.php?img_error=1");
					}
		}
		?>