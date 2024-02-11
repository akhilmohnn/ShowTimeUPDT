<?php
include("Head.php");
include("../Assets/connection/connection.php");

if ($_GET["did"]) {
    $did = $_GET["did"];
    $delQry = "DELETE FROM tbl_notification WHERE notification_id = $did";
    mysql_query($delQry);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Notification Display</title>
</head>
<center>
<body>
<br><br><br><br><br><br><br><br><br><br><br><br>

<h3>Notifications</h3><br />
<table width="200" border="1">
    <tr>
        <td>Sl No</td>
        <td>Title</td>
        <td>Detail</td>
        <td>Date</td>
        <td>File</td>
        <td>Photo</td>
      
    </tr>
    <?php
    $i = 0;
    $selQry = "SELECT * FROM tbl_notification ORDER BY notification_date DESC"; // Updated query
    $data = mysql_query($selQry);
    while ($row = mysql_fetch_array($data)) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["notification_title"] ?></td>
            <td>
                <div style="width: 150px; height: 150px;"><?php echo $row["notification_details"] ?></div>
            </td>
            <td><div style="width: 100px; height: 150px;"><?php echo $row["notification_date"] ?></div></td> 
            <td>
            <div style="width: 150px; height: 180px;">  <img src="../Assets/Files/UserDocs/<?php echo $row["notification_file"] ?>" />
            </td>
            <td>
            <div style="width: 150px; height: 150px;"> <img src="../Assets/Files/UserDocs/<?php echo $row["notification_photo"] ?>" />
            </td>
           
        <?php
    }
    ?>
</table>
</body>
</center>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>