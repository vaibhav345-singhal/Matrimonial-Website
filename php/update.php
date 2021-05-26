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
        }
            if(empty($_POST["fname"]) || empty($_POST["lname"]) ||  empty($_POST["occupation"])|| empty($_POST["height"])|| empty($_POST["day"]) || empty($_POST["month"]) || empty($_POST["year"]) || empty($_POST["gender"]) ||empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["religion"]) || empty($_POST["marital"])){
                header("location:edit_profile.php?empty=1");
            }
        else{
            $fname =$_POST["fname"];
            $lname =$_POST["lname"];
            $occupation =$_POST["occupation"];
            $height =$_POST["height"];
            $day =$_POST["day"];
            $month =$_POST["month"];
            $year =$_POST["year"];
            $gender =$_POST["gender"];
            $city =$_POST["city"];
            $state =$_POST["state"];
            $religion =$_POST["religion"];
            $marital=$_POST["marital"];
                
              if(mysqli_query($conn,"update users set first='$fname',lname='$lname',occupation='$occupation',height='$height',dt='$day',month='$month',year='$year',gender='$gender',city='$city',state='$state',religion='$religion',marital='$marital' where email='$email'")>0){
                            header("location:profile.php?success=1");
                        }
                        else{
                            header("location:edit_profile.php?error=1");
                        }
                   
        }
?>