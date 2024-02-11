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
		
	$update = "update tbl_band set band_name='".$name."',band_contact='".$contact."',band_email='".$email."' where band_id=".$_SESSION['bid'];	
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
</head>

<body>
<h1 align="center">EDIT PROFILE</h1>
<div align="center">
<?php
$selqry="select * from tbl_band u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id where band_id='".$_SESSION['bid']."'";
//echo $selqry;
$data=mysql_query($selqry);
$row=mysql_fetch_array($data)
?>
<form id="form2" name="form2" method="post" action="">
  <table width="275" height="293" border="1">
    <tr>
      <td>Name</td>
      <td>
        <label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" value="<?php echo $row["band_name"]?>" />
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td>
        <label for="txt_contact"></label>
        <input name="txt_contact" type="text" id="txt_contact" value="<?php echo $row["band_contact"]?>" />
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <label for="txt_email"></label>
        <input type="text" name="txt_email" id="txt_email" value="<?php echo $row["band_email"]?>" />
        </td>
    </tr>
  
    <tr>
      <td colspan="2">
        <div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
          </div>
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