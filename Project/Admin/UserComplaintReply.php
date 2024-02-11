	<?php
ob_start();
include("Head.php");
	include("../Assets/connection/connection.php");
	
	 session_start();
	
	
	if(isset($_POST["btn_sub"]))
	  {
			
			 $upQry="update tbl_complaint set complaint_reply='".$_POST["text_no1"]."',complaint_status='1' where complaint_id='". $_SESSION["cid"]."'";
			 //echo $upQry;
			 mysql_query($upQry);
			 
			 //header("location:UserComplaintSolvedList.php");	
			 
	  }
	 
	 ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>UserComplaintReply</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	<a href="../Admin/HomePage2.php">Home</a>
	<form id="form1" name="form1" method="post" action="">
  <div class="container">
    <table class="table table-bordered text-center">
      <tbody>
        <tr>
          <td>Reply</td>
          <td>
            <div class="form-group">
              <textarea name="text_no1" id="text_no1" class="form-control"></textarea>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="form-group">
              <input type="submit" name="btn_sub" id="btn_sub" value="Submit" class="btn btn-primary" />
              <input type="reset" name="btn_re" id="btn_sub" value="Cancel" class="btn btn-secondary" />
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</form>
	
	  
	</body>
	</html>
	<?php
include("Foot.php");
ob_flush(); 
?>