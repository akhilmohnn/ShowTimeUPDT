<?php
ob_start();
include("Head.php");
include("../Assets/connection/connection.php");
  		 session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserComplaintSolvedList</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<center>
<h3>USER COMPLAINTS SOLVED</h3>
<form id="form1" name="form1" method="post" action="">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sl NO</th>
        <th>Title</th>
        <th>Details</th>
        <th>Reply</th>
        <th>UserName</th>
        <th>Contact</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $s = 0;
      $selQry = "select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id where c.user_id='" . $_SESSION["uid"] . "'";
      $data = mysql_query($selQry);
      while ($row = mysql_fetch_array($data)) {
        $s++;
        ?>
        <tr>
          <td><?php echo $s ?></td>
          <td><?php echo $row["complaint_title"] ?></td>
          <td><?php echo $row["complaint_details"] ?></td>
          <td><?php echo $row["complaint_reply"] ?></td>
          <td><?php echo $row["user_name"] ?></td>
          <td><?php echo $row["user_contact"] ?></td>
          <td><?php echo $row["user_email"] ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</form>
</center>
</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>