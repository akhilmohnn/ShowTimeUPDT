<?php
ob_start();
include("Head.php");
include(".../Assets/Connection/Connection.php");
 if(isset($_POST["txt_btn"]))
 {
   $catid=$_POST["sel_category"];
     $insid=$_POST["txt_instruments"];        
     $insqry="insert into tbl_instruments(instruments_name,category_id) values('$insid','$catid')";
   mysql_query($insqry);
 }
 if($_GET["catid"])
 {
  $did= $_GET["catid"];
  $delqry="delete from tbl_instruments where instruments_id='$did'";
  mysql_query($delqry);
 }
                                                                                                          
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-image: url(../Assets/Template/Login/images/place1.jpg);background-repeat: no-repeat;background-size: cover;">
<body>
<div class="container">
    <h1 class="text-center">Instruments.php</h1>
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered" width="347" align="center" cellpadding="5" cellspacing="5">
        <tr>
          <td width="136" height="54">Category</td>
          <td width="193">
            <div class="text-center">
              <select name="sel_category" id="sel_category" class="form-control">
                <option>..select...</option>
                <?php
                $selQry = "select * from tbl_category";
                $data = mysql_query("$selQry");
                while ($row = mysql_fetch_array($data)) {
                ?>
                  <option value="<?php echo $row["category_id"] ?>"><?php echo $row["category_name"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </td>
        </tr>
        <tr>
          <td height="60">Instruments</td>
          <td>
            <input type="text" name="txt_instruments" id="txt_instruments" class="form-control" />
          </td>
        </tr>
        <tr>
          <td height="79" colspan="2">
            <div class="text-center">
              <input type="submit" name="txt_btn" id="txt_btn" value="Submit" class="btn btn-primary" />
            </div>
          </td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </form>
    <div class="text-center">
      <table class="table table-bordered" width="523" cellspacing="5" cellpadding="5">
        <tr>
          <td width="100" height="53">Sl NO</td>
          <td width="104">Category</td>
          <td width="101">Instruments</td>
          <td width="141">Action</td>
        </tr>
        <?php
        $selqry = "select * from tbl_instruments p inner join tbl_category d on p.category_id=d.category_id";
        $data = mysql_query($selqry);
        $i = 0;
        while ($row = mysql_fetch_array($data)) {
          $i++;
        ?>
          <tr>
            <td height="54"><?php echo $i ?></td>
            <td><?php echo $row["category_name"] ?></td>
            <td><?php echo $row["instruments_name"] ?></td>
            <td><a href="instruments.php?catid=<?php echo $row["instruments_id"] ?>" class="btn btn-danger">Delete</a></td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div></body>
</html>
<?php
include("Foot.php");
ob_flush(); 
?>