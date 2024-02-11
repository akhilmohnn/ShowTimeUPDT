 <?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit']))
{
	
	$name=$_POST['txt_name'];
	$owname=$_POST['txt_owname'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	$place=$_POST['sel_place'];
	$category=$_POST['sel_category'];
	$password=$_POST['txt_password'];
	
	$image=$_FILES['file_image']['name'];
	$image1=$_FILES['file_image1']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	$path1=$_FILES['file_image1']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Band/".$image);
	
	move_uploaded_file($path1,"../Assets/Files/Vimage/".$image1);

	
	
	 $ins="insert into tbl_band(band_name,band_owner,band_email,band_contact,band_address,band_photo,band_vimage,place_id,band_password,category_id)
	values('".$name."','".$owname."','".$email."','".$contact."','".$address."','".$image."','".$image1."','".$place."','".$password."','".$category."')"; 
	if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="BandRegistration.php";
		</script>
        <?php
	}	
	else
	{
		echo "Insert Failed";
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>
  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_name">Band Name</label>
                    <input type="text" name="txt_name" id="txt_name" class="form-control" required="required" onchange="nameval(this)">
                    <span id="name"></span>
                </div>
                <div class="form-group">
                    <label for="txt_owname">Band Owner Name</label>
                    <input type="text" name="txt_owname" id="txt_owname" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="sel_category">Category</label>
                    <select name="sel_category" id="sel_category" class="form-control" required="required">
                        <option>--SELECT--</option>
                        <?php
                        // Your PHP code to populate category options here
						$selQry = "select * from tbl_category";
						$data = mysql_query($selQry);
						while($row = mysql_fetch_array($data))
						{
						?>
						<option value="<?php echo $row['category_id']  ?>"><?php echo $row['category_name']  ?></option>
						<?php
						}
                        // Your PHP code to populate district options here
                        ?>
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_address">Address</label>
                    <input type="text" name="txt_address" id="txt_address" class="form-control" required="required">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact">Contact</label>
                    <input type="text" name="txt_contact" id="txt_contact" class="form-control" onchange="checknum(this)">
                    <span id="contact"></span>
                </div>
                <div class="form-group">
                    <label for="file_image">Image</label>
                    <input type="file" name="file_image" id="file_image" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="file_image1">Identity Proof</label>
                    <input type="file" name="file_image1" id="file_image1" class="form-control" required="required">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_email">Email</label>
                    <input type="email" name="txt_email" id="txt_email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="txt_password">Password</label>
                    <input type="password" name="txt_password" id="txt_password" class="form-control">
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="btn_submit" id="btn_submit" value="SignUp" class="btn btn-primary">
        </div>
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
function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
	}
}

function checknum(elem)
{
	var numericExpression = /^[0-9]{8,10}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Numbers Only 10Allowed</span>";
		elem.focus();
		return false;
	}
}



function emailval(elem)
{
	var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
		elem.focus();
		return false;
	}
}
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
		elem.focus();
		return false;
	}
}
</script>
<br> <br> <br> <br> <br> <br> <br> <br>
 <?php
include("Foot.php");
ob_flush();
 ?>
</html>