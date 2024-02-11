<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
 $selqry="select * from tbl_band u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id where band_id='".$_SESSION['bid']."'";
$data=mysql_query($selqry);
$row=mysql_fetch_array($data);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">MY PROFILE</h1>
<div align="center">
<form id="form1" name="form1" method="post" action="">
  <table class="table table-bordered" style="width: 274px;">
    <tr>
      <th class="col-md-6">Name</th>
      <td class="col-md-6"><?php echo $row["band_name"] ?></td>
    </tr>
    <tr>
      <th class="col-md-6">Contact</th>
      <td class="col-md-6"><?php echo $row["band_contact"] ?></td>
    </tr>
    <tr>
      <th class="col-md-6">E-mail</th>
      <td class="col-md-6"><?php echo $row["band_email"] ?></td>
    </tr>
    <tr>
      <th class="col-md-6">District</th>
      <td class="col-md-6"><?php echo $row["district_name"] ?></td>
    </tr>
    <tr>
      <th class="col-md-6">Place</th>
      <td class="col-md-6"><?php echo $row["place_name"] ?></td>
    </tr>
  </table>
</form>
</div>
<div align="center"></div>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
 ?>
</html>