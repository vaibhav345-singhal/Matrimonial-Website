
<!DOCTYPE HTML>
<html>
<head>
<title>Marital an Wedding Category Flat Bootstarp Resposive Website Template | Profile :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>
<body>
<!-- ============================  Navigation Start =========================== -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner navbar-inner_1">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
			 <ul>
				<li class="green">
					<a href="index.php" class="icon-home"></a>
					<ul>
					    <li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
					</ul>
				</li>
			   </ul>
             </nav>
           </div>
           <a class="brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
 
		 <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="index.php">Home</a></li>
		            
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
      <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Profile</li>
      </ul>
   </div>
	  
	  
	  
	  
  <div class="col-md-9 profile_left1">
  	
	  <?php

            include ("db.php");

			if(empty($_REQUEST["gender"]) ||  empty($_REQUEST["state"]) || empty($_REQUEST["city"]) || empty($_REQUEST["occup"]) ||empty($_REQUEST["marital"])){
				header("location:index.php?empty=1");
				/*echo $_REQUEST["gender"];
				
				echo $_REQUEST["state"];
				echo $_REQUEST["city"];
				echo $_REQUEST["occup"];
				echo $_REQUEST["marital"];*/
			}
			else{
				$gender = mysqli_real_escape_string($conn,$_REQUEST["gender"]);
				
				$state = mysqli_real_escape_string($conn,$_REQUEST["state"]);
				$city = mysqli_real_escape_string($conn,$_REQUEST["city"]);
				$occupation = mysqli_real_escape_string($conn,$_REQUEST["occup"]);
				$marital = mysqli_real_escape_string($conn,$_REQUEST["marital"]);
				
			


					if(isset($_GET["page"])){
						$page=intval($_GET["page"]);
					}
					else{
						$page = 1;
					}

					$limit=2;
					$offset = ($page - 1)*$limit;
 	  	 	       
					
					
					$rt = mysqli_query($conn,"SELECT count(*) FROM `users` WHERE 
					  gender='$gender' AND state = '$state' AND marital='$marital' AND occupation='$occupation' AND city='$city'");
				
					$total_record=0;
				
						if($tr = mysqli_fetch_array($rt)){
							$total_record = $tr[0];
						
						}
				    
					$total_pages = ceil($total_record/$limit);

					

				$rs = mysqli_query($conn,"SELECT * FROM `users`  where gender='$gender'  AND state='$state' AND city='$city' AND occupation='$occupation' AND marital='$marital' LIMIT $offset,$limit");
				while($r=mysqli_fetch_array($rs)){
	 ?>
    <div class="profile_top">
      <h2>Profile Id: <?=$r["code"]?></h2>
	    <div class="col-sm-3 profile_left-top">
	    	<img src="photo/<?=$r["code"]?>.jpg" class="img-responsive" alt=""/>
	    </div>
	    <div class="col-sm-3">
	      
			
	    </div>
	    <div class="col-sm-6">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<tr class="opened_1">
						<td class="day_label1">Name :</td>
						<td class="day_value"><?=$r["first"]." ".$r["lname"]?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Religion :</td>
						<td class="day_value"><?=$r["religion"]?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">state :</td>
						<td class="day_value"><?=$r["state"]?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">City :</td>
						<td class="day_value"><?=$r["city"]?></td>
					</tr>
				    <tr class="opened">
						<td class="day_label1">Age :</td>
						<td class="day_value"><?=$r["dt"]."/".$r["month"]."/".$r["year"]?></td>
					</tr>
				   
					
			    </tbody>
		   </table>
		   
	    </div>
		
	    <div class="clearfix"> </div>
		  
		
    </a></div>
   
	<?php
		}
				?>

	 <?php 
	 if($offset!=0){
		 
	  ?>
	  <a style="color: maroon" href="search_rec2.php?page=<?=($page-1)?>&gender=<?=$gender?>&state=<?=$state?>&city=<?=$city?>&occup=<?=$occupation?>&marital=<?=$marital?>"><button  class="vertical">Previous</button>
	  <?php
		}
	  ?>
		 
		  
	<?php
		  if($total_pages > $page){
						
	?>
					
	  <a style="color: maroon" href="search_rec2.php?page=<?=($page+1)?>&gender=<?=$gender?>&state=<?=$state?>&city=<?=$city?>&occup=<?=$occupation?>&marital=<?=$marital?>"><button  class="vertical">Next</button>
	  
	<?php  
	  }
	  ?>
	  
	  
	  <?php
  }
		?>
	



	 </div>
     </div>
</div>



<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div>
<div class="footer">
    	<div class="container">
    		<div class="col-md-4 col_2">
    			<h4>About Us</h4>
    			<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Help & Support</h4>
    			<ul class="footer_links">
    				<li><a href="#">24x7 Live help</a></li>
    				<li><a href="contact.html">Contact us</a></li>
    				<li><a href="#">Feedback</a></li>
    				<li><a href="faq.html">FAQs</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Quick Links</h4>
    			<ul class="footer_links">
    				<li><a href="privacy.html">Privacy Policy</a></li>
    				<li><a href="terms.html">Terms and Conditions</a></li>
    				<li><a href="services.html">Services</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Social</h4>
    			<ul class="footer_social">
				  <li><a href="#"><i class="fa fa-facebook fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-google-plus fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
			    </ul>
    		</div>
    		<div class="clearfix"> </div>
    		<div class="copy">
		      <p>Copyright © 2015 Marital . All Rights Reserved  | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	        </div>
    	</div>
</div>
<!-- FlexSlider -->
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>
<!-- FlexSlider -->
</body>
</html>	
