 <?php
 ob_start();
 include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
?> 	
<br><br><br><br><br><br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <center>
    <h3> Requests </h3> <br>

<div class="container">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Date</th>
                <th scope="col">Band</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Time</th>
                <th scope="col">Venue</th>
                <th scope="col">Details</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selqry = "select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id inner join tbl_eventtype et on et.event_id=b.eventtype_id inner join tbl_band d on b.band_id=d.band_id where b.user_id=" . $_SESSION['uid'];
            $data = mysql_query($selqry);
            $i = 0;
            while ($row = mysql_fetch_array($data)) {
                $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row["booking_date"] ?></td>
                    <td><?php echo $row["band_name"] ?></td>
                    <td><?php echo $row["booking_date"] ?></td>
                    <td><?php echo $row["booking_time"] ?></td>
                    <td><?php echo $row["booking_venue"] ?></td>
                    <td><?php echo $row["booking_venue"] ?></td>
                    <td>
                        <?php
                        if($row["booking_status"]==1)
                        {
                            echo "Accepted";?>|<a href="BandRating.php?bid=<?php echo $row["band_id"]?>">Rate Now</a>
                            <?php
                        } 
                        else if($row["booking_status"]==2)
                        {
                            echo "Rejected";
                        } 
                        else{
                            echo "Pending";
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
        </center>
</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>