<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
 $selqry="select * from tbl_band b inner join tbl_place p on p.place_id=b.place_id inner join tbl_district d on d.district_id=p.district_id where b.band_id='".$_GET['tid']."'";
$data=mysql_query($selqry);
$row=mysql_fetch_array($data);
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">BAND PROFILE</h1>
<div align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="274" height="222" border="1">
    <tr>
      <td width="192">Name</td>
      <td width="66">
     <?php echo $row["band_name"]?>
      </td>
    </tr>
    <tr>
      <td>Conatct</td>
      <td>  <?php echo $row["band_contact"]?>
        </td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><?php echo $row["band_email"]?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $row["district_name"]?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td>
        <?php echo $row["place_name"]?></td>
    </tr>
    <tr>
    <?php
    $seld="select * from tbl_crew where band_id='".$_GET["tid"]."'"; 
    $datas=mysql_query($seld);
    $i=0;
    while($row1=mysql_fetch_array($datas))
    {
      $i++;
      ?>
      <td>
      <p>
        <img src="../Assets/Files/Crew/<?php echo $row1["crew_photo"] ?>" alt="" ><br>
        <?php echo $row1["crew_name"] ?><br>

      </p>
      </td>

      
      <?php
      if($i%2==0)
      {
        echo "</tr><tr>";
      }
    }
    ?>
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