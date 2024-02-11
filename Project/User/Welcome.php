<?php
ob_start();
include("Head.php");
session_start();

   echo "welcome".$_SESSION["user_name"];

?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>