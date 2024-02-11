<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit']))
{
	
	$date=$_POST['txt_date'];
	$time=$_POST['txt_time'];
	$eventtype=$_POST['sel_eventtype'];
	$district=$_POST['sel_district'];
	$place=$_POST['sel_place'];
	$venueaddress=$_POST['textarea'];
	$bookingdetails=$_POST['txt_bookingdetails'];
	
	 $ins="insert into tbl_booking(user_id,band_id,eventtype_id,booking_date,booking_time,booking_fordate,booking_venue,place_id,booking_details)
	values('".$_SESSION['uid']."','".$_GET['bid']."','".$eventtype."',curdate(),'".$time."','".$date."','".$venueaddress."','".$place."','".$bookingdetails."')"; 
	if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			//window.location="BookShow.php";
		</script>
        <?php
	}	
	else
	{
		echo "Insert Failed";
	}
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><center>

<h3>BOOK SHOW</h3>
<form method="post">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-bordered">
          <tr>
            <th>Date</th>
            <td>
              <input type="date" name="txt_date" id="txt_date" class="form-control" required="required" />
            </td>
          </tr>
          <tr>
            <th>Time</th>
            <td>
              <input type="time" name="txt_time" id="txt_time" class="form-control" required="required" />
            </td>
          </tr>
          <tr>
            <th>Event Type</th>
            <td>
              <select name="sel_eventtype" id="sel_eventtype" class="form-control" required="required">
                <option>--SELECT--</option>
                <?php
                  $selQryE = "select * from tbl_eventtype";
                  $dataE = mysql_query($selQryE);
                  while ($rowE = mysql_fetch_array($dataE)) {
                ?>
                  <option value="<?php echo $rowE['event_id'] ?>"><?php echo $rowE['event_name'] ?></option>
                <?php
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>District</th>
            <td>
              <select name="sel_district" id="sel_district" class="form-control" onchange="getPlace(this.value)">
                <option>--SELECT--</option>
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
            <th>Place</th>
            <td>
              <select name="sel_place" id="sel_place" class="form-control" required="required">
                <option value="">--SELECT--</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Venue Address</th>
            <td>
              <textarea name="textarea" id="textarea" class="form-control" cols="45" rows="5"></textarea>
            </td>
          </tr>
          <tr>
            <th>Booking Details</th>
            <td>
              <textarea name="txt_bookingdetails" id="txt_bookingdetails" class="form-control" cols="45" rows="5"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div align="center">
                <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary" value="Request" />
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</form>

 </center>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
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

</script>
<br><br><br><br><br><br><br><br><br><br><br><br>
 <?php
include("Foot.php");
ob_flush();
 ?>
</html>