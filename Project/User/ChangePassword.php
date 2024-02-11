<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body><center><br />
 <?php
 ob_start();
include("Head.php");
 session_start();

include("../Assets/Connection/Connection.php");
if(isset($_POST['txt_btn']))
{
	$password=$_POST['txt_currentpassword'];
	$newpassword=$_POST['txt_newpassword'];
	$repassword=$_POST['txt_repassword'];
	
	 $selQry= "select * from tbl_user where user_id = '".$_SESSION["uid"]."'";
	
	$data=mysql_query($selQry);
	
	$result = mysql_fetch_array($data);
	$currentPassword = $result['user_password'];
	
	if($password==$currentPassword)
	{
		if($newpassword==$repassword)                                                        

		{
			 $update = "update tbl_user set user_password='".$newpassword."' where user_id='".$_SESSION['uid']."'";


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
<h3>Change your password</h3>
<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered">
            <tr>
                <th>Current Password</th>
                <td>
                    <input type="password" class="form-control" name="txt_currentpassword" id="txt_currentpassword" />
                </td>
            </tr>
            <tr>
                <th>New Password</th>
                <td>
                    <input type="password" class="form-control" name="txt_newpassword" id="txt_newpassword" />
                </td>
            </tr>
            <tr>
                <th>Re-Password</th>
                <td>
                    <input type="password" class="form-control" name="txt_repassword" id="txt_repassword" />
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" class="btn btn-primary" name="txt_btn" id="txt_btn" value="Update" />
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