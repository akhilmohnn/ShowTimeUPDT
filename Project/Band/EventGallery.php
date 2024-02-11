<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["upload"]))
{
  $f1=$_FILES["choose"]['name'];
  $path=$_FILES["choose"]['tmp_name'];
  move_uploaded_file($path,"../Assets/Files/Event/".$f1);
  $ins="insert into tbl_gallery(gallery_file,band_id)values('".$f1."','".$_SESSION["bid"]."')";
  mysql_query($ins);
  header("location:EventGallery.php");
}
if($_GET["did"])
{
  $del="delete from tbl_gallery where gallery_id='".$_GET["did"]."'";
  mysql_query($del);
  header("location:EventGallery.php");
}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Upload Image</h4>
        <table class="table table-bordered">
          <tr>
            <td>
              <label for="choose"></label>
              <input type="file" name="choose" id="choose" class="form-control-file" />
            </td>
          </tr>
          <tr>
            <td>
              <div class="text-center">
                <input type="submit" name="upload" id="upload" value="Submit" class="btn btn-primary" />
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4>Uploaded Images</h4>
        <table class="table table-bordered table-striped">
          <tr>
            <th>Sl.No</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          <?php
          $sel = "select * from tbl_gallery where band_id='" . $_SESSION["bid"] . "'";
          $datas = mysql_query($sel);
          $i = 0;
          while ($row = mysql_fetch_array($datas)) {
            $i++;
          ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><img src="../Assets/Files/Event/<?php echo $row["gallery_file"] ?>" alt="" class="img-thumbnail" width="150" height="150" /></td>
              <td><a href="EventGallery.php?did=<?php echo $row["gallery_id"] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</form>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
 ?>
</html>