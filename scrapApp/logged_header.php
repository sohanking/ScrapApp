          
<?php
require "config.php";

require "header.php";

$name = $_SESSION['name'];
echo "  
<div class='container' class='jumbotron' style='background-color:purple;color:orange;'><h1>

Welcome {$name}
</h1>
<p> YOur all details are displayed here.......</p>

</div>";
           
?>
