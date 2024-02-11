<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
 $selqry="select * from tbl_user u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id where user_id='".$_SESSION['uid']."'";
$data=mysql_query($selqry);
$row=mysql_fetch_array($data);
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
<h1 align="center">MY PROFILE</h1>
<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td><?php echo $row["user_name"] ?></td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?php echo $row["user_contact"] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $row["user_email"] ?></td>
            </tr>
            <tr>
                <th>District</th>
                <td><?php echo $row["district_name"] ?></td>
            </tr>
            <tr>
                <th>Place</th>
                <td><?php echo $row["place_name"] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
                    <a href="ChangePassword.php" class="btn btn-primary">Change Password</a>
                </td>
            </tr>
        </table>
    </form>
</div>

<div align="center"></div>

</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>