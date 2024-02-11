<?php
ob_start();
include("Head.php");
include("../Assets/connection/connection.php");
session_start();
if ($_GET["did"]) {
    $did = $_GET["did"];
    $_SESSION["cid"] = $did;
    header("location: UserComplaintReply.php");
    exit; // Make sure to exit after redirecting
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Complaint</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<center>
<h3> User Complaints </h3><br />
<form id="form1" name="form1" method="post" action="">
  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Sl NO</th>
          <th>Title</th>
          <th>Details</th>
          <th>UserName</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id = u.user_id WHERE c.complaint_status = 0";
        $data = mysql_query($selQry);

        if (!$data) {
            die('Error: ' . mysql_error());
        }

        while ($row = mysql_fetch_array($data)) {
            $i++;
        ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["complaint_title"] ?></td>
            <td><?php echo $row["complaint_details"] ?></td>
            <td><?php echo $row["user_name"] ?></td>
            <td><?php echo $row["user_contact"] ?></td>
            <td><?php echo $row["user_email"] ?></td>
            <td><a href="UserComplaint.php?did=<?php echo $row["complaint_id"] ?>" class="btn btn-primary">Reply</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</form>
</center>
</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>