
<?php
ob_start();
include("Head.php");
include('../Assets/Connection/Connection.php');
if(isset($_POST["save"]))
{
	$catg=$_POST["category_name"];
	$ins="insert into tbl_category(category_name) value('$catg')";
	mysql_query($ins);
}

if($_GET["did"])
	{
		$did= $_GET["did"];
		$delQry="delete from tbl_category where category_id='$did'";
		mysql_query($delQry);
	}
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(../Assets/Template/Login/images/place1.jpg);background-repeat: no-repeat;background-size: cover;">
<body>
<div class="container">
    <h3 class="text-center">Category details</h3>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered">
        <tr>
          <td width="93">Category</td>
          <td width="122">
            <label for="tbl_category"></label>
            <input type="text" name="category_name" id="tbl_category" class="form-control" />
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
          <td>Categories</td>
          <td>Action</td>
        </tr>
        <?php
        $i = 0;
        $selQry = "select * from tbl_category";
        $data = mysql_query($selQry);
        while ($row = mysql_fetch_array($data)) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row["category_name"] ?></td>
          <td><a href="Category.php?did=<?php echo $row["category_id"] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
        }
        ?>
      </table>
    </form>
  </div>
</body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>