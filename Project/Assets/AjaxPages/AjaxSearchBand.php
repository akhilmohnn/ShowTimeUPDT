
<?php
include("../Connection/Connection.php");
?>
<table height="83" border="1">
    <tr>
    
    <?php
$n=0;
$selQry="select * from tbl_band b inner join tbl_category c on b.category_id=c.category_id inner join tbl_place p on  p.place_id=b.place_id inner join tbl_district d on d.district_id=p.district_id where TRUE";
if($_GET['did']!=""){
	$selQry=$selQry. " and p.district_id=".$_GET['did'];
}
if($_GET['pid']!=""){
	$selQry=$selQry. " and b.place_id=".$_GET['pid'];
}
if($_GET['cid']!=""){
	$selQry=$selQry. " and b.category_id=".$_GET['cid'];
}
$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
{
$n++;
?>
   
    
      <td>
      <p><img src="../Assets/Files/Band/<?php echo $row["band_photo"];?>" height="100" width="100" /></p>
      <p>Band name: <?php echo $row["band_name"];?></p>
     <p> contact:<?php echo $row["band_contact"];?></p>
      <p>Category:<?php echo $row["category_name"];?></p>
      <p><a href="ViewDetails.php?tid=<?php echo $row["band_id"]?>">view details</a></p>
      <p><a href="BookShow.php?bid=<?php echo $row["band_id"]?>">Book Now</a></p>
    
      </td>
   
    <?php
if($n==4)
{
?>
            </tr>
            <tr>
            <?php
$n=0;
}
}
?>