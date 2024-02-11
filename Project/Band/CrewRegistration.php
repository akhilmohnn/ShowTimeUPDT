 <?php
 ob_start();
 include("Head.php");
 session_start();
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit']))
{
	
	$name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
    $gender=$_POST['txt_gender'];
	$address=$_POST['txt_address'];
	$place=$_POST['sel_place'];
	$image=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Crew/".$image);
	
	
	echo $ins="insert into tbl_crew(crew_name,crew_contact,crew_gender,crew_address,place_id,crew_photo,band_id)
	values('".$name."','".$contact."','".$gender."','".$address."','".$place."','".$image."','".$_SESSION["bid"]."')";
	if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="CrewRegistration.php";
		</script>
        <?php
	}
	else
	{
		echo "Insert Failed";
	}
}
if($_GET["cid"])
	{
		$cid= $_GET["cid"];
		$delQry="delete from tbl_crew where crew_id='$cid'";
		mysql_query($delQry);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

<center>
<div class="container">
    <h3 class="mt-3">Crew Registration</h3>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_name">Crew Name</label>
                    <input type="text" name="txt_name" id="txt_name" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="txt_contact">Contact</label>
                    <input type="text" name="txt_contact" id="txt_contact" class="form-control">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div>
                        <label for="male" class="mr-2">
                            <input type="radio" name="txt_gender" id="male" value="male" class="mr-1"> Male
                        </label>
                        <label for="female">
                            <input type="radio" name="txt_gender" id="female" value="female" class="mr-1"> Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="txt_address" id="address" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="sel_district">District</label>
                    <select name="sel_district" id="sel_district" class="form-control" onchange="getPlace(this.value)">
                        <option>--SELECT--</option>
                        <?php
						$selQry = "select * from tbl_district";
						$data = mysql_query($selQry);
						while($row = mysql_fetch_array($data))
						{
						?>
						<option value="<?php echo $row['district_id']  ?>"><?php echo $row['district_name']  ?></option>
						<?php
						}
                        // Your PHP code to populate district options here
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sel_place">Place</label>
                    <select name="sel_place" id="sel_place" class="form-control">
                        <option>--SELECT--</option>
                        <!-- Populate place options using JavaScript -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_image">Image</label>
                    <input type="file" name="file_image" id="file_image" class="form-control" required="required">
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="btn_submit" id="btn_submit" value="SignUp" class="btn btn-primary">
        </div>
    </form>  
  <p>&nbsp;</p>
  <table width="523" border="2" cellspacing="5" cellpadding="5" style="border:1px solid black ;">
    <tr>
      <td width="100" height="53">Sl NO</td>
      <td width="104">Name</td>
      <td width="101">Contact</td>
        <td width="101">Gender</td>
          <td width="101">Address</td>
            <td width="101">District</td>
              <td width="101">Place</td>
                <td width="101">Image</td>
      <td width="141">Action</td>
      </tr>
     <?php
     $selqry="select * from tbl_crew c inner join tbl_place p on p.place_id=c.place_id inner join tbl_district d on p.district_id=d.district_id where c.band_id='".$_SESSION["bid"]."'";
     $data=mysql_query($selqry);
     $i=0;
     while($row=mysql_fetch_array($data))
     {
       $i++;
      ?>
             <tr>
                  <td height="54"><?php echo $i?></td>
                 <td><?php echo $row["crew_name"]?></td>
                    <td><?php echo $row["crew_contact"]?></td>
                       <td><?php echo $row["crew_gender"]?></td>
                          <td><?php echo $row["crew_address"]?></td>
                             <td><?php echo $row["district_name"]?></td>
                                <td><?php echo $row["place_name"]?></td>
                                   <td><?php echo $row["crew_photo"]?></td>
                  
                                    <td><a href="CrewRegistration.php?cid=<?php echo $row["crew_id"]?>">Delete</a></td>

      </tr>
            <?php 
     }
    ?>
       
     
      
  </table>
  

</form>
</center>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function(data) {
		
			$("#sel_place").html(data);

		}
	});
}

</script>
 <?php

 ?>
</html>
<?php
include("Foot.php");
ob_flush();
 ?>
</html>