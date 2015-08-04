<!DOCTYPE html>
<html lang="en">
<head>
  <title>ScrappApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link href='http://fonts.googleapis.com/css?family=Jura:400,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</head>
<body style="font-family: 'Lobster', cursive;">
    <img id="background" class="img-responsive" src="images/yo.jpg">
<nav class="navbar " id="spk">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bare"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img id="one"  src="images/ssk.png" alt="ScrappApp"><img id="two"  src="images/mono.jpg"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar"  style="font-family: 'Lobster', cursive;">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Home</a></li>
        <li><a href="sell_scrapp.php">Sell Scrapp</a>  </li>
          <li><a href="pricelist.php">Price List</a>  </li>
        <li ><a href="about_us.php">About Us</a></li>
        <li><a href="contact_us.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php  
session_start();

if(!isset($_SESSION['header']))
   {
	$_SESSION['header']=0; 
	$header = $_SESSION['header'];
   }
   else
   {
$header = $_SESSION['header'];
   }
if($header<=0)
{
	echo"
	 <li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li> 
        <li><a href='login.php'><span class='glyphicon glyphicon-log-in' ></span> Login</a></li>
 ";}
else
{
	echo" 
	<li><a href='logged_header.php'><span class='glyphicon glyphicon-user'></span>My Profile</a></li> 
	<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>Log Out</a></li> 
";
	
}
   
		  ?>
		</ul>
    </div>
  </div>
</nav>

