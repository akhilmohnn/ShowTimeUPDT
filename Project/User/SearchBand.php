<?php
ob_start();
include("Head.php");
include("../assets/connection/connection.php");
?>

<br><br><br><br><br><br><br><br><br><br><br><br>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<body>
<center>
<form method="post">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-bordered">
          <tr>
            <th scope="row">District</th>
            <td>
              
              <select name="sel_district" id="sel_district" class="form-control" onchange="getPlace(this.value), getBand()">
                <option value="">---select---</option>
                <?php
                $selQry = "select * from tbl_district";
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                ?>
                  <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
                <?php
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row">Place</th>
            <td>
              <select name="sel_place" id="sel_place" class="form-control" onchange="getBand()">
                <option value="">---select---</option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row">Category</th>
            <td>
              <select name="sel_category" id="sel_category" class="form-control" required="required" onchange="getBand()">
                <option value="">--SELECT--</option>
                <?php
                $selQry = "select * from tbl_category";
                $data = mysql_query($selQry);
                while ($row = mysql_fetch_array($data)) {
                ?>
                  <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                <?php
                }
                ?>
              </select>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</form>
  <p>&nbsp;</p>
  <div id="mySearch">
  <table height="83" border="1">
    <tr>
    
    <?php
$n=0;
$i=0;
$selQry="select * from tbl_band b inner join tbl_category c on b.category_id=c.category_id where b.band_vstatus=1";

$data=mysql_query($selQry);
while($row=mysql_fetch_array($data))
{
$i++;
$n++;
?>
   
    
      <td>
      <p><img src="../Assets/Files/Band/<?php echo $row["band_photo"];?>" height="100" width="100" /></p>
      <p>Band name: <?php echo $row["band_name"];?></p>
     <p> contact:<?php echo $row["band_contact"];?></p>
      <p>Category:<?php echo $row["category_name"];?></p>
      <p><a href="viewdetails.php?tid=<?php echo $row["band_id"]?>">view details</a></p>
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
    </tr>
  </table>
   </div>
 
</center>
</body>
<script src="../assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function(data) {
		
			$("#sel_place").html(data);

		}
	});
}

function getBand(pid)
{
	var dist = document.getElementById('sel_district').value
	var place = document.getElementById('sel_place').value
	var cat = document.getElementById('sel_category').value
	//alert(cat)
	$.ajax({
		url: "../Assets/AjaxPages/AjaxSearchBand.php?pid="+place+"&did="+dist+"&cid="+cat,
		success: function(data) {
		
			$("#mySearch").html(data);

		}
	});
}
</script>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>