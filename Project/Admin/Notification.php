<?php
include("Head.php");
include("../Assets/connection/connection.php");

if (isset($_POST['btn_sub'])) {
    $title = $_POST["title"];
    $detail = $_POST["detail"];
    $image = $_FILES['file_image']['name'];
    $path = $_FILES['file_image']['tmp_name'];
    move_uploaded_file($path, "../Assets/Files/UserDocs/" . $image);

    $proof = $_FILES['fileproof']['name'];
    $pathproof = $_FILES['fileproof']['tmp_name'];
    move_uploaded_file($pathproof, "../Assets/Files/UserDocs/" . $proof);

    $date = date("Y-m-d");  // Get the current date

    $insQry = "INSERT INTO tbl_notification (notification_title, notification_details, notification_photo, notification_file, notification_date) VALUES ('$title', '$detail', '$image', '$proof', '$date')";
    mysql_query($insQry);
    echo '<script>alert("Notification sended")</script>';

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notification</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <h3 class="text-center">Give a notification</h3>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table class="table table-bordered">
        <tr>
          <td>Title</td>
          <td><input type="text" name="title" id="title" class="form-control" /></td>
        </tr>
        <tr>
          <td>Details</td>
          <td><textarea name="detail" id="detail" class="form-control" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><input type="date" name="notification_date" id="notification_date" class="form-control" /></td>
        </tr>
        <tr>
          <td>Photo</td>
          <td><input type="file" name="file_image" id="file_image" class="form-control" /></td>
        </tr>
        <tr>
          <td>File</td>
          <td><input type="file" name="fileproof" id="fileproof" class="form-control" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="btn_sub" id="btn_sub" value="Submit" class="btn btn-primary" />
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