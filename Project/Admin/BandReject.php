<?php
ob_start();
include("Head.php");
include('../Assets/Connection/Connection.php');
if($_GET["did1"])
{
	$did1=$_GET["did1"];
	$update="update tbl_band set band_vstatus=1 where band_id='$did1'";  
	mysql_query($update);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(../Assets/Template/Login/images/place1.jpg);background-repeat: no-repeat;background-size: cover;">
<a href="HomePage2.php">Home</a>
<div class="container">
    <h3 class="text-center">Band Rejected</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SI.no</th>
          <th>BandName</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Photo</th>
          <th>Proof</th>
          <th>Category</th>
          <th>District</th>
          <th>Place</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        $selQry = "select * from tbl_band b inner join tbl_place p on p.place_id=b.place_id 
         inner join tbl_district d on p.district_id=d.district_id where b.band_vstatus=2";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row["band_name"] ?></td>
          <td><?php echo $row["band_email"] ?></td>
          <td><?php echo $row["band_contact"] ?></td>
          <td><?php echo $row["band_address"] ?></td>
          <td><img src="../Assets/Files/Band/<?php echo $row["band_photo"] ?>" width="150" height="150" /></td>
          <td><img src="../Assets/Files/Vimage/<?php echo $row["band_vimage"] ?>" width="150" height="150" /></td>
          <td><?php echo $row["category_id"] ?></td>
          <td><?php echo $row["district_name"] ?></td>
          <td><?php echo $row["place_name"] ?></td>
          <td><a href="BandReject.php?did1=<?php echo $row["band_id"] ?>" class="btn btn-success">Accept</a></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
<body>
</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>