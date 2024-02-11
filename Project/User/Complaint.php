<?php
ob_start();
include("Head.php");
include("../Assets/connection/connection.php");
session_start();
if(isset($_POST["btn_sub"]))
   {
$title=$_POST["txttitle"];
$details=$_POST["txtdetails"];
$uid=$_POST["userid"];
$insQry="insert into tbl_complaint(complaint_title,complaint_details,user_id)values('$title','$details','".$_SESSION['uid']."')";
echo '<script>alert("Complaint registered")</script>';
mysql_query($insQry);
   }
   if($_GET["did"])
   {
	   $del="delete from tbl_complaint where complaint_id='".$_GET["did"]."'";
	   mysql_query($del);
	   header("location:Complaint.php");
   }

?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints</title>
</head>

<body>
<center>
<h3>Complaint Details</h3>
<br />
<form id="form1" name="form1" method="post" action="">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-bordered">
          <tr>
            <td>Title</td>
            <td>
              <input type="text" name="txttitle" id="txttitle" class="form-control" />
            </td>
          </tr>
          <tr>
            <td>Details</td>
            <td>
              <textarea name="txtdetails" id="txtdetails" class="form-control" cols="45" rows="5"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" name="btn_sub" id="btn_sub" class="btn btn-primary" value="Submit" />
            </td>
          </tr>
        </table>
        <table class="table table-bordered">
          <tr>
            <td>Sl.No</td>
            <td>Title</td>
            <td>Details</td>
            <td>Reply</td>
            <td>Action</td>
          </tr>
          <?php
            $sel="select * from tbl_complaint where user_id='".$_SESSION["uid"]."'";
            $data=mysql_query($sel);
            $i=0;
            while($row=mysql_fetch_array($data))
            {
              $i++;
          ?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row["complaint_title"]?></td>
            <td><?php echo $row["complaint_details"]?></td>
            <td><?php echo $row["complaint_reply"]?></td>
            <td><a href="Complaint.php?did=<?php echo $row["complaint_id"]?>">Delete</a></td>
          </tr>
          <?php
            }
          ?>
        </table>
      </div>
    </div>
  </div>
</form>
</center>

</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>