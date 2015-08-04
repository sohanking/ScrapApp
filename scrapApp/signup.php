<?php
require "config.php";
require "header.php";
?>



<?php
// define variables and set to empty values
 $fullnameErr = $phErr = $passErr   = $addErr = $pinErr= $emailErr = "";
$fullname = $pwd = $phone = $address = $picode= $email ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	$valid=true; //IF TRUE THEN THEN ERROR.
	if (empty($_POST["fullname"]))  //USERNAME CANT BE EMPTY.
	{
		$fullnameErr = "Fullname cant be empty";
		$valid=true;
	} 
	else //ELSE CHECK FOR CORRECTNESS.
	{
		$fullname = test_input($_POST["fullname"]); //REMOVES ALL SPECIAL CHARACTERS
        $valid=false;
	}
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
    if (empty($_POST["address"])) //PASSWORD CANT BE EMPTY
	{
		$addErr = "Address cant be Empty";
		$valid=true;
	}
	else 
	{
		$address = test_input($_POST["address"]);
		$valid=false;
	}
     if (empty($_POST["pincode"])) //PASSWORD CANT BE EMPTY
	{
		$pinErr = "Pin-Code cant be Empty";
		$valid=true;
	}
	else 
	{
		$pincode = test_input($_POST["pincode"]);
		$valid=false;
	}
    
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

	if($fullname&&$pwd&&$phone&&$address&&$pincode&&$email) //CHECKS IF USERNAME AND PASSWORD ARE PRESENT OR NOT.
	{
		if(!$valid) //IF FLASE ONLY DEN IT ENTERS INSIDE.
		{
            
        $conn=new PDO("mysql:host=localhost;dbname=scarpp_app;",$db_username,$db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
            $sql = "SELECT Count(*) from login where phone = '$phone'";
			$query=$conn->prepare($sql);
$query->execute();
			while($result = $query->fetch(PDO::FETCH_NUM))
	{
		$data=$result[0];
	}
            
			if($data == 0)
			{
				
				$_SESSION['header']=1;   
			$sql = "INSERT INTO scrappers (fullname, password, phone, address, pincode, email)
VALUES ('$fullname','$pwd','$phone','$address','$pincode','$email')";
$query=$conn->prepare($sql);
$query->execute();
            
            
             
			$sql = "INSERT INTO login (phone, password)
VALUES ('$phone','$pwd')";
$query=$conn->prepare($sql);
$query->execute();
				
			

				
            echo "  
<div class='container' class='jumbotron' style='background-color:purple;color:skyblue;'><h1>

Your Succesfully registered.
</h1>


</div>";
           
            exit(); //EXITS HERE.		
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
      <label for="fullname">Full Name</label>
      <input type="text" class="form-control" name="fullname" placeholder="Enter fullname">
         <span class="text-danger"><?php echo  $fullnameErr;?></span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password">
        <span class="text-danger"><?php echo  $passErr;?></span>
    </div>
      <div class="form-group">
      <label for="phone">Contact Number:</label>
      <input type="text" class="form-control" name="phone" placeholder="Enter your Valid Contact number">
    <span class="text-danger"><?php echo  $phErr;?></span>
    </div>
	  <div class="form-group">
      <label for="email">Email ID:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter your Valid Email ID">
    <span class="text-danger"><?php echo  $emailErr;?></span>
    </div>
	 
      <div class="form-group">
      <label for="address">Address:</label>
          <textarea type="text" class="form-control" name="address" placeholder="Enter your Valid Current Address "></textarea>
    <span class="text-danger"><?php echo  $addErr;?></span>
    </div>
      <div class="form-group">
      <label for="pincode">Area Pin-Code:</label>
      <input type="text" class="form-control" name="pincode" placeholder="Enter your Area Pin-Code">
    <span class="text-danger"><?php echo  $pinErr;?></span>
    </div>

    <button type="submit" class="btn btn-default">SignUp</button>
  </form>
</div>

       
         

<!--
    
              
<div class="container">
  
  <form role="form" action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">LogIn</button>
  </form>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
-->

    
    <?php

require "footer.php";
	
?>