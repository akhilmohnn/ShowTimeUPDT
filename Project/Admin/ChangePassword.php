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
if(isset($_POST['txt_btn']))
{
	$password=$_POST['txt_currentpassword'];
	$newpassword=$_POST['txt_newpassword'];
	$repassword=$_POST['txt_repassword'];
	
	 $selQry= "select * from tbl_admin where admin_id = '".$_SESSION["aid"]."'";
	 
	 
	$data=mysql_query($selQry);
	
	$result = mysql_fetch_array($data);
	$currentPassword = $result['admin_password'];
	
	if($password==$currentPassword)
	{
		if($newpassword==$repassword)                                                        

		{
			 $update = "update tbl_admin set admin_password='".$newpassword."' where admin_id='".$_SESSION['aid']."'";


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
<a href="../Admin/HomePage2.php">Home</a>
<h3>Change your password</h3>

<form id="form1" name="form1" method="post" action="">
<table width="417" border="1">
  <tr>
    <td width="216">Current Password</td>
    <td width="185">
      <label for="txt_currentpassword"></label>
      <input type="password" name="txt_currentpassword" id="txt_currentpassword" />
   </td>
  </tr>
  <tr>
    <td>New Password</td>
    <td>
      <label for="txt_newpassword"></label>
      <input type="password" name="txt_newpassword" id="txt_newpassword" />
   </td>
  </tr>
  <tr>
    <td><p>Re-Password</p></td>
    <td>
      <label for="txt_repassword"></label>
      <input type="password" name="txt_repassword" id="txt_repassword" />
</td>
  </tr>
  <tr>
    <td height="64" colspan="2">
      <div align="center">
        <input type="submit" name="txt_btn" id="txt_btn" value="Update" />
      </div>
    </td>
  </tr>
</table>
</form>
</center>
</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>