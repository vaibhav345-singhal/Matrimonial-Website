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
<title>Marital an Wedding Category Flat Bootstarp Resposive Website Template | Search :: w3layouts</title>
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
						<li><a href="login.php">Login</a></li>
					    <li><a href="register.php">Register</a></li>
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
				<li><a href="index.php">Home</a></li>
					<li><a href="change_password.php">Change Your Password</a></li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="edit_profile.php">Edit Profile</a></li>
		                <li><a href="search_rec.php">Search</a></li>
						<li><a href="view_msg.php">Messages</a></li>
		              </ul>
		            </li>
					<li class="last"><a href="logout.php">Logout</a></li>
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
        <li class="current-page">Regular Search</li>
     </ul>
   </div>
   <!--<script type="text/javascript">
    $(function () {
     $('#btnRadio').click(function () {
          var checkedradio = $('[name="gr"]:radio:checked').val();
          $("#sel").html("Selected Value: " + checkedradio);
      });
    });
   </script>-->
<div class="col-md-9 search_left">
  <form method="post" action="search_rec.php">	
   <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">Gender : </label>
	<div class="col-sm-7 form_radios">
		<input type="radio" class="radio_1" name="gender" value="Male"/> Male &nbsp;&nbsp;
		<input type="radio" class="radio_1" name="gender" value="Female"/> Female
		
		<!--<hr />
		<p id="sel"></p><br />
		<input id="btnRadio" type="button" value="Get Selected Value" />-->
	</div>
	<div class="clearfix"> </div>
  </div>

  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Occupation : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <input type="text" class="form-control"	name="occup" id="occup"	placeholder="occupation" required>
                
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Marital Status : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="marital" class="form-control">
	                    <option>Marital Status</option>
	                    <option value="Never_Married">Never Married</option>
						<option value="Married">Married</option>
						<option value="Awaiting_Divorce">Awaiting Divorce</option>
						<option value="Divorced">Divorced</option>
						<option value="Widowed">Widowed</option>
						<option value="Annulled">Annulled</option>
						</select>			
                
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>

 
 
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Religion : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="religion" class="form-control">
	                    <option>Religion</option>
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
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">State : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
          <select name="state" class="form-control">
	                    <option>State</option>
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
      </div>
    </div>
	  
	   <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">City : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
          <select name="city" class="form-control">
	                    <option>City</option>
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
					<br> <button  a href="search_rec.php" style="color: maroon" class="btn-danger">Search</button>
      </div>
	 
    </div>
	
    <div class="clearfix"> </div>
  </div>
  
<div>
 
  </div>
 </form>
 
 
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
<?php
   }
}
 ?>