    <?php
ob_start();
include("Head.php");
include("../Assets/connection/connection.php");
session_start();
if(isset($_POST["btnsub"]))
   {
	 $title=$_POST["txttitle"];
	 $details=$_POST["txtdetails"];
   $uid=$_POST["user_id"];

	 $insQry="insert into tbl_contact(contact_title ,contact_subject,user_id)values('$title','$details','".$_SESSION['user_id']."')";
	echo ' <script> alert("Will contact u soon") </script>';
	mysql_query($insQry);
   }
   
   
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<center>
<form id="form1" name="form1" method="post" action="">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Contact Form</h3>
        <table class="table table-bordered">
          <tr>
            <td>Title</td>
            <td>
              <label for="txttitle"></label>
              <input type="text" name="txttitle" id="txttitle" class="form-control" />
            </td>
          </tr>
          <tr>
            <td>Details</td>
            <td>
              <label for="txtdetails"></label>
              <textarea name="txtdetails" id="txtdetails" class="form-control" cols="45" rows="5"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" name="btnsub" id="btnsub" class="btn btn-primary" value="Submit" />
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</form>
</center>
</body
></html>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>