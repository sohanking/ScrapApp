<?php
require "config.php";

require "header.php";
?>



<?php
// define variables and set to empty values
  $emailErr  = "";
 $email =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	$valid=true; //IF TRUE THEN THEN ERROR.
	
	if (empty($_POST["email"])) //PASSWORD CANT BE EMPTY
	{
		$emailErr = "Email cant be empty";
		$valid=true;
	}
	else 
	{
		$email = test_input($_POST["email"]);
		$valid=false;
	}

	if($email) //CHECKS IF USERNAME AND PASSWORD ARE PRESENT OR NOT.
	{
		if(!$valid) //IF FLASE ONLY DEN IT ENTERS INSIDE.
		{
            
        $conn=new PDO("mysql:host=localhost;dbname=scarpp_app;",$db_username,$db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
            $sql = "SELECT Count(*) from scrappers where email = '$email' ";
			$query=$conn->prepare($sql);
$query->execute();
			while($result = $query->fetch(PDO::FETCH_NUM))
	{
		$data=$result[0];
	}
            
			if($data == 1)
			{
			
				
					
            $sql = "SELECT email from scrappers where email = '$email' ";
			$query=$conn->prepare($sql);
$query->execute();
			while($result = $query->fetch(PDO::FETCH_NUM))
	{
		$email=$result[0];
	}
				
			 echo "  
<div class='container' class='jumbotron' style='background-color:purple;color:skyblue;'><h1>
Mail has been sent to you .or<br /><a
style='color:orange;'
href='login.php'>Login here</a>
</h1>


</div>";
				exit(); //EXITS HERE.	
          die();
       		
	}
   else
   {
	        echo "  
<div class='container' class='jumbotron' style='background-color:purple;color:skyblue;'><h1>
Your Not an Authorized user.or<br /><a
style='color:orange;'
href='signup.php'>Register here</a>
</h1>


</div>";
       exit(); //EXITS HERE.	
          die();
	   
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
      <label for="email">Email ID:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter your Valid Email ID">
    <span class="text-danger"><?php echo  $emailErr;?></span>
    </div>

           <div class="form-group">
  
    <button type="submit" class="btn btn-default">Log IN</button>
			   </div>
	  </form>


       
</div>      

    
    <?php

require "footer.php";
	
?>