
<?php
ob_start();
include("Head.php");
include('../Assets/Connection/Connection.php');
if(isset($_POST["save"]))
{
  $dist=$_POST["district_name"];

  $selQry = "select * from tbl_district where district_name = '".$dist."'";
  $data = mysql_query($selQry);
    if ($row = mysql_fetch_array($data)) {
      ?>
      <script>
        alert('Already Inserted');
        </script>
      <?php
    }
    else{
      $ins="insert into tbl_district(district_name) value('$dist')";
      mysql_query($ins);
    }
	
}

if($_GET["did"])
	{
		$did= $_GET["did"];
		$delQry="delete from tbl_district where district_id='$did'";
		mysql_query($delQry);
	}
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(../Assets/Template/Login/images/place1.jpg);background-repeat: no-repeat;background-size: cover;">
<body>
<div class="container">
    <h3>District details</h3>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered">
        <tr>
          <td width="93">District</td>
          <td width="122">
            <label for="tbl_district"></label>
            <input type="text" name="district_name" id="tbl_district" class="form-control" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="text-center">
              <input type="submit" name="save" id="save" value="Save" class="btn btn-primary" />
              <input type="reset" name="cancel" id="cancel" value="Cancel" class="btn btn-secondary">
            </div>
          </td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table class="table table-bordered">
        <tr>
          <td>SI.no</td>
          <td>District</td>
          <td>Action</td>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_district";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row["district_name"] ?></td>
          <td><a href="District.php?did=<?php echo $row["district_id"] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
        }
        ?>
      </table>
    </form>
  </div>

  <!-- Bootstrap JS and jQuery (optional) -->

</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>