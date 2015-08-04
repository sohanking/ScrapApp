<?php
require "config.php";

require "header.php";
?>



<?php
// define variables and set to empty values
  $phErr = $passErr  = "";
 $pwd = $phone =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	$valid=true; //IF TRUE THEN THEN ERROR.
	
	if (empty($_POST["password"])) //PASSWORD CANT BE EMPTY
	{
		$passErr = "Password cant be empty";
		$valid=true;
	}
	else 
	{
		$pwd = test_input($_POST["password"]);
		$valid=false;
	}
    
    if (empty($_POST["phone"])) //PASSWORD CANT BE EMPTY
	{
		$phErr = "Contact Number cant be Empty";
		$valid=true;
	}
	else 
	{
		$phone = test_input($_POST["phone"]);
		$valid=false;
	}
    

	if($pwd&&$phone) //CHECKS IF USERNAME AND PASSWORD ARE PRESENT OR NOT.
	{
		if(!$valid) //IF FLASE ONLY DEN IT ENTERS INSIDE.
		{
            
        $conn=new PDO("mysql:host=localhost;dbname=scarpp_app;",$db_username,$db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
            $sql = "SELECT Count(*) from login where phone = '$phone' AND password= '$pwd' ";
			$query=$conn->prepare($sql);
$query->execute();
			while($result = $query->fetch(PDO::FETCH_NUM))
	{
		$data=$result[0];
	}
            
			if($data == 1)
			{
			
				$_SESSION['header']=1;
					
            $sql = "SELECT fullname from scrappers where phone = '$phone' ";
			$query=$conn->prepare($sql);
$query->execute();
			while($result = $query->fetch(PDO::FETCH_NUM))
	{
		$name=$result[0];
	}
				$_SESSION['name']=$name;
			header('Location:logged_header.php'); //LINKS TO THE LOGIN PAGE.
			exit(); //EXITS HERE.	
          die();		
	}
   else
   {
	        echo "  
<div class='container' class='jumbotron' style='background-color:purple;color:skyblue;'><h1>
Your already Registered. Your Number exists. Try registaring with different number.or<br /><a
style='color:orange;'
href='login.php'>Login here</a>
</h1>


</div>";
       
	   
   }
}
}
}

function test_input($data) //REMOVES ALL THE SPACE AND OTHER UNWANTED THINGS.
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strip_tags($data);
	//$data = mysql_real_escape_string($data);
	return $data;
}
?>

    
    
    
    
   

  
<div class="container">
 <form role="form" action="" method="post">
	 <div class="form-group">
      <label for="phone">Contact Number:</label>
      <input type="text" class="form-control" name="phone" placeholder="Enter your Valid Contact number">
    <span class="text-danger"><?php echo  $phErr;?></span>
    </div>

	
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password">
        <span class="text-danger"><?php echo  $passErr;?></span>
    </div>
	 
           <div class="form-group">
  
    <button type="submit" class="btn btn-default">Log IN</button>
			   </div>
			   <div class="form-group">
      
      
       <a href="forgot_password.php" >Forgot Password?.</a>
		 
    </div>
  </form>


       
</div>      

    
    <?php

require "footer.php";
	
?>