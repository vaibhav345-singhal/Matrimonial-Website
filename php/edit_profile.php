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
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Marital an Wedding Category Flat Bootstarp Resposive Website Template | View_profile :: w3layouts</title>
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
					<a href="#" class="icon-home"></a>
					<ul>
					    <li><a href="logout.php">Logout</a></li>
						
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
				<li><a href="change_password.php">Change Your Password</a></li>
				<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="edit_profile.php">Edit Profile</a></li>
		                <li><a href="search_rec.php">Search</a></li>
						<li><a href="view_msg.php">Messages</a></li>
		              </ul>
		            </li>
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
        <li class="current-page">View Profile</li>
     </ul>
   </div>
   <div class="profile">
   	 <div class="col-md-8 profile_left">
   	 	
		
		<?php
		    $rs=mysqli_query($conn,"select * from users where email='$email'");
			if($r=mysqli_fetch_array($rs)){
		   ?>
		   <h2>Profile Id : <?=$r["code"]?></h2>
   	 	<div class="col_3">
   	        <div class="col-sm-4 row_2">
				<div class="flexslider">
					 <ul class="slides">
						<li data-thumb="photo/<?=$r["code"]?>.jpg">
							<img src="photo/<?=$r["code"]?>.jpg" />
							
							 <br>
					 <form method="post"  enctype="multipart/form-data"  action="change_pic.php">
					 	<input type="file" name="photo" class="form-control"><br>
						<input type="submit" value="Change" class="btn btn-danger">
					 </form>
						</li>
					   
					 </ul>
					
				  </div>
			</div>
			<div class="col-sm-8 row_1">
			<form method="post" action="update.php">
				<table class="table_working_hours">
		        	<tbody>
		        		<tr class="opened_1">
							<td class="day_label">First Name :</td>
							<td class="day_value"><input type="text" name="fname" value="<?=$r[2]?>" class="form-control" required></td>
						</tr>
					    <tr class="opened">
							<td class="day_label">Last Name :</td>
							<td class="day_value"><input type="text" name="lname" value="<?=$r["lname"]?>" class="form-control" required></td>
						</tr>
						<tr class="opened">
							<td class="day_label">Occupation :</td>
							<td class="day_value"><input type="text" name="occupation" value="<?=$r["occupation"]?>" class="form-control" required></td>
						</tr>
						<tr class="opened">
							<td class="day_label">Height :</td>
							<td class="day_value"><input type="text" name="height" value="<?=$r["height"]?>" class="form-control" required></td>
						</tr>

						<tr class="opened">
							<td class="day_label">Gender :</td>
							<td class="day_value"> 
								<select name="gender" class="form-control" required>
									<option value="<?=$r["gender"]?>"><?=$r["gender"]?></option>
									<option value="Male" ">Male</option>
									<option value="Female" >Female</option>
								</select>
							</td>
						</tr>
					    <tr class="opened">
							<td class="day_label">Religion :</td>
							<td class="day_value"> 
								<select name="religion" class="form-control" required>
									<option value="<?=$r["religion"]?>"><?=$r["religion"]?></option>
									<option value="Hindu" label="Hindu">Hindu</option>
									<option value="Muslim" label="Muslim">Muslim</option>
									<option value="Christian" label="Christian">Christian</option>
									<option value="Sikh" label="Sikh">Sikh</option>
									<option value="Parsi" label="Parsi">Parsi</option>
									<option value="Jain" label="Jain">Jain</option>
									<option value="Buddhist" label="Buddhist">Buddhist</option>
									<option value="Jewish" label="Jewish">Jewish</option>
									<option value="No Religion" label="No Religion">No Religion</option>
									<option value="Spiritual - not religious" label="Spiritual">Spiritual</option>
									<option value="Other" label="Other">Other</option>
						   
                    			</select>
							</td>
						</tr>



						<tr class="opened">
							<td class="day_label">State :</td>
							<td class="day_value"> 
								<select name="state" class="form-control" required>
									<option value="<?=$r["state"]?>"><?=$r["state"]?></option>
									<option value="Rajasthan">Rajasthan</option>
						            <option value="Maharashtra">Maharashtra</option>
						            <option value="Delhi">Delhi</option>
						            <option value="Karnataka">Karnataka</option>
							        <option value="Telangana">Telangana</option>
							        <option value="Gujarat">Gujarat</option>
						            <option value="West_Bengal">West Bengal</option>
						            <option value="Uttar_Pradesh">Uttar Pradesh</option>
						            <option value="Madhya_Pradesh">Madhya Pradesh</option>
							        <option value="Jharkhand">Jharkhand</option>
							        <option value="Punjab">Punjab</option>
							        <option value="Haryana">Haryana</option>
						   
                    			</select>
							</td>
						</tr>

						<tr class="opened">
							<td class="day_label">Marital Status :</td>
							<td class="day_value"> 
								<select name="marital" class="form-control" required>
									<option value="<?=$r["marital"]?>"><?=$r["marital"]?></option>
									<option value="Never_Married">Never Married</option>
						<option value="Married">Married</option>
						<option value="Awaiting_Divorce">Awaiting Divorce</option>
						<option value="Divorced">Divorced</option>
						<option value="Widowed">Widowed</option>
						<option value="Annulled">Annulled</option>
						           
						   
                    			</select>
							</td>
						</tr>


					    <tr class="opened">
							<td class="day_label">City :</td>
							<td class="day_value">
								<select name="city" class="form-control" required>
									<option value="<?=$r["city"]?>"><?=$r["city"]?></option>
									<option value="Bikaner">Bikaner</option>
									<option value="Ajmer">Ajmer</option>
									<option value="Karauli">Karauli</option>
									<option value="Jodhpur">Jodhpur</option>
									<option value="Tonk">Tonk</option>
									<option value="Jaipur">Jaipur</option>
									<option value="Mumbai">Mumbai</option>
									<option value="Bangalore">Bangalore</option>
									<option value="Hyderabad">Hyderabad</option>
									<option value="Ahmedabad">Ahmedabad</option>
									<option value="Chennai">Chennai</option>
									<option value="Kolkata">Kolkata</option>
									<option value="Kanpur">Kanpur</option>
									<option value="Patna">Patna</option>
									<option value="Kota">Kota</option>
									<option value="Agra">Agra</option>
						   
                                </select>
					        </td>
						</tr>
					    <tr class="opened">
							<td class="day_label">DOB :</td>
							<td class="day_value"><table border=0><tr><td>
							 <select name="day" class="form-control" required>
	                    <option value="<?=$r["dt"]?>"><?=$r["dt"]?></option>
						
						<?php
						   for($i=1;$i<=31;$i++){
						  ?> 
	                    		<option value="<?=$i?>"><?=$i?></option>
						<?php
						  }
						  ?>
	                  
                    </select>
							</td>  <td>
							<select name="month" class="form-control" required>
	                    <option  value="<?=$r["month"]?>"><?=$r["month"]?></option>
	                   <?php
						   for($i=1;$i<=12;$i++){
						  ?> 
	                    		<option value="<?=$i?>"><?=$i?></option>
						<?php
						  }
						  ?>
                    </select>
							</td>   <td>
							
							 <select name="year" class="form-control" required>
	                    <option value="<?=$r["year"]?>"><?=$r["year"]?></option>
	                     <?php
						   for($i=1990;$i<=2010;$i++){
						  ?> 
	                    		<option value="<?=$i?>"><?=$i?></option>
						<?php
						  }
						  ?>
                    </select>
							
							</td></tr> </table></td>
						</tr>
					  
					    <tr class="closed">
							<td class="day_label"></td>
							<td class="day_value closed"><input type="submit" value="Update">
							</td>
						</tr>
				    </tbody>
				</table>
				</form>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		
		
		
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
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>   
</body>
</html>	


<?php
      }
   }
  ?>