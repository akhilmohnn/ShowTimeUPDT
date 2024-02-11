<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <br><br><br><br><br><br><br><br><br><br>
    <form action="" method="post">
        <table  border="1" align="center" cellpadding="10">
           
            <?php
            $sel="select *  from tbl_gallery";
            $datas=mysql_query($sel);
            $i=0;
            while($row=mysql_fetch_array($datas))
            {
              $i++;
            
            ?>
            <tr>
              
              <td><img src="../Assets/Files/Event/<?php echo $row["gallery_file"]  ?>" alt="" width="150" height="150">
            </td>
            
            <?php
            if($i%4==0)
            {
                echo "</tr><tr>";
            }
            }
            ?>
          </table>
    </form>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>
</html>
