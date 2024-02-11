
<?php
ob_start();
include("Head.php");
include("../Assets/connection/connection.php");



if($_GET["accept"])
   {
	   $did=$_GET["accept"];
	   $delQry="update tbl_user set user_status='1' where user_id='$did'";
	   //echo $delQry;
	   mysql_query($delQry);
	  header("location:UserList.php");
   }
   
   if($_GET["reject"])
   {
	   $did=$_GET["reject"];
	   $delQry="update tbl_user set user_status='2' where user_id='$did'";
	   mysql_query($delQry);
	   header("location:UserList.php");
   }
  
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Userlist</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<a href="HomePage2.php">Home</a>

<div class="container mt-5">
    <table class="table table-bordered table-striped table-responsive-sm">
        <thead>
            <tr>
                <th>SL NO</th>
                <th>District</th>
                <th>Place</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Image</th>
                
            
            </tr>
        </thead>
        <tbody>
            <?php
            $s = 0;
            $selQry = "select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.user_vstatus='0'";
            $data = mysql_query($selQry);
            while ($row = mysql_fetch_array($data)) {
                $s++;
                ?>
                <tr>
                    <td><?php echo $s ?></td>
                    <td><?php echo $row["district_name"] ?></td>
                    <td><?php echo $row["place_name"] ?></td>
                    <td><?php echo $row["user_name"] ?></td>
                    <td><?php echo $row["user_email"] ?></td>
                    <td><?php echo $row["user_contact"] ?></td>
                    <td><?php echo $row["user_address"] ?></td>
                    <td><img src="../Assets/Files/User/<?php echo $row["user_image"] ?>" class="img-thumbnail" width="150" height="150" /></td>
                    
                   
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>