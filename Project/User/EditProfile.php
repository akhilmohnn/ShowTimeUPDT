<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/connection/connection.php");
if(isset($_POST['btn_sub']))
{
	$name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$district=$_POST['district_id'];
	$place=$_POST['place_id'];
		
	$update = "update tbl_user set user_name='".$name."',user_contact='".$contact."',user_email='".$email."' where user_id=".$_SESSION['uid'];	
    mysql_query($update);
	header("location:MyProfile.php");
	//echo $update;
	
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
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

<body>
<h1 align="center">EDIT PROFILE</h1>
<div align="center">
<?php
$selqry="select * from tbl_user u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id where user_id='".$_SESSION['uid']."'";
//echo $selqry;
$data=mysql_query($selqry);
$row=mysql_fetch_array($data)
?>
<div class="container mt-5">
<form id="form2" name="form2" method="post" action="">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>
                <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $row["user_name"] ?>" />
            </td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>
                <input type="text" class="form-control" name="txt_contact" id="txt_contact" value="<?php echo $row["user_contact"] ?>" />
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                <input type="text" class="form-control" name="txt_email" id="txt_email" value="<?php echo $row["user_email"] ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input type="submit" class="btn btn-primary" name="btn_sub" id="btn_sub" value="Submit" />
            </td>
        </tr>
    </table>
</form>
</div>

</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>