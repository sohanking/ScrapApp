
<?php

//error_reporting(0);

session_start();
session_unset(); //unset the session variables.
session_destroy(); //destroy the session.
//$_SESSION['header']=0;

header('Location:index.php');

?>

