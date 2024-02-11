<?php
session_start();
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_login"]))
{
	$email=$_POST['txt_email'];
	$password=$_POST["txt_password"];
	
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$dataUser=mysql_query($selUser);
	
	$selBand="select *from tbl_band where band_email='".$email."' and band_password='".$password."' and band_vstatus=1";
	$dataBand=mysql_query($selBand);
	
	$selAdmin="select *from tbl_admin where admin_email='".$email."' and admin_password='".$password."' ";
	$dataAdmin=mysql_query($selAdmin);
	
	if($rowUser=mysql_fetch_array($dataUser))
	{
		$_SESSION["uid"]=$rowUser["user_id"];
		$_SESSION["uname"]=$rowUser["user_name"];
		header("location: ../User/HomePage.php");
		}
		
	else if($rowBand=mysql_fetch_array($dataBand))
	{
		$_SESSION["bid"]=$rowBand["band_id"];
		$_SESSION["bname"]=$rowBand["band_name"];
		header("location: ../Band/HomePage1.php");
	}
			
	else if($rowAdmin=mysql_fetch_array($dataAdmin))
	{
		$_SESSION["aid"]=$rowAdmin["admin_id"];
		$_SESSION["aname"]=$rowAdmin["admin_name"];
		header("location: ../Admin/HomePage2.php");
	}
		else
		{
			echo "INVALID CREDENTIALS";
		}
	}
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Login To Show Time </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Template/Login/css/style.css">

	</head>
	<body>
		
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font: 2.5em sans-serif;color:brown">Login to Show Time</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../Assets/Template/Login/images/hh.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form  class="signin-form" method="post">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control" placeholder="Username" required name="txt_email">
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" required name="txt_password">
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="btn_login">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
								
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a href="UserRegistration.php">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Template/Login/js/jquery.min.js"></script>
  <script src="../Assets/Template/Login/js/popper.js"></script>
  <script src="../Assets/Template/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Template/Login/js/main.js"></script>

	</body>
</html>

