 <?php
 ob_start();
 include("Head.php");
 session_start();
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET['bid'])){
	$updQry="update tbl_booking set booking_status=1 where booking_id=".$_GET['bid'];
	
	if(mysql_query($updQry))
	{
		?>
        <script>
			alert("Accepted");
			window.location="Requests.php";
		</script>
        <?php
	}
	else
	{
		echo "Update Failed";
	}
}

if(isset($_GET['vid'])){
	$updQry="update tbl_booking set booking_status=2 where booking_id=".$_GET['vid'];
	
	if(mysql_query($updQry))
	{
		?>
        <script>
			alert("Rejected");
			window.location="Requests.php";
		</script>
        <?php
	}
	else
	{
		echo "Update Failed";
	}
}

?> 	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</head>

<body>
<div class="container">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">Sl.No</th>
                <th class="text-center">Date</th>
                <th class="text-center">User</th>
                <th class="text-center">Booking Date</th>
                <th class="text-center">Time</th>
                <th class="text-center">Venue</th>
                <th class="text-center">Details</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selqry = "select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id inner join tbl_eventtype et on et.event_id=b.eventtype_id where b.band_id=" . $_SESSION['bid'];
            $data = mysql_query($selqry);
            $i = 0;
            while ($row = mysql_fetch_array($data)) {
                $i++;
            ?>
                <tr>
                    <td class="text-center"><?php echo $i ?></td>
                    <td class="text-center"><?php echo $row["booking_date"] ?></td>
                    <td class="text-center"><?php echo $row["user_name"] ?> <a href="https://api.whatsapp.com/send?phone=91<?php echo $row["user_contact"] ?> ">Call Now</a></td>
                    <td class="text-center"><?php echo $row["booking_date"] ?></td>
                    <td class="text-center"><?php echo $row["booking_time"] ?></td>
                    <td class="text-center"><?php echo $row["booking_venue"] ?></td>
                    <td class="text-center"><?php echo $row["booking_venue"] ?></td>
                    <td class="text-center">
                        <?php
                        if($row["booking_status"]==1)
                        {
                            echo "Accepted";
                        } 
                        else if($row["booking_status"]==2)
                        {
                            echo "Rejected";
                        }
                        else{
                        ?>
                        <a class="btn btn-success" href="Requests.php?bid=<?php echo $row["booking_id"] ?>&st=1">Accept</a>
                        <a class="btn btn-danger" href="Requests.php?vid=<?php echo $row["booking_id"] ?>&st=2">Reject</a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div></body>
</html>
<?php
include("Foot.php");
ob_flush();
 ?>
</html>