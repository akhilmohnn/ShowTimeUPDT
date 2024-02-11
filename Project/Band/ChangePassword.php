<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><center><br />
 <?php
 ob_start();
 include("Head.php");
 session_start();

include("../Assets/Connection/Connection.php");
if(isset($_POST['band_update']))
{
	$password=$_POST['txt_currentpassword'];
	$newpassword=$_POST['txt_newpassword'];
	$repassword=$_POST['txt_repassword'];
	
	 $selQry= "select * from tbl_band where band_id = '".$_SESSION["bid"]."'";
	
	$data=mysql_query($selQry);
	
	$result = mysql_fetch_array($data);
	$currentPassword = $result['band_password'];
	
	if($password==$currentPassword)
	{
		if($newpassword==$repassword)                                                        

		{
			 $update = "update tbl_band set band_password='".$newpassword."' where band_id='".$_SESSION['bid']."'";


	         mysql_query($update);
		}
		else
		{
			echo "not match";
		}
	}
	else
	{
		echo "invalid current password";
	}

}
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h3>Change Your Password</h3>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td>Current Password</td>
                <td>
                    <input type="password" class="form-control" name="txt_currentpassword" id="band_p1">
                </td>
            </tr>
            <tr>
                <td>New Password</td>
                <td>
                    <input type="password" class="form-control" name="txt_newpassword" id="band_p2">
                </td>
            </tr>
            <tr>
                <td>Re-Password</td>
                <td>
                    <input type="password" class="form-control" name="txt_repassword" id="band_p3">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="band_update" id="band_update">Update</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

</center>
</body>
</html>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush(); 
?>