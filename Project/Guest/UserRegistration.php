<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if (isset($_POST['btn_submit'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_address'];
    $place = $_POST['sel_place'];
    $password = $_POST['txt_password'];
    $repassword = $_POST['txt_repassword'];

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT user_email FROM tbl_user WHERE user_email = '$email'";
    $checkEmailResult = mysql_query($checkEmailQuery);

    // Check if the contact number already exists in the database
    $checkContactQuery = "SELECT user_contact FROM tbl_user WHERE user_contact = '$contact'";
    $checkContactResult = mysql_query($checkContactQuery);

    if (mysql_num_rows($checkEmailResult) > 0) {
        // Email already exists, show an alert
        echo "<script>alert('Email address is already registered. Please use a different email.')</script>";
    } elseif (mysql_num_rows($checkContactResult) > 0) {
        // Contact number already exists, show an alert
        echo "<script>alert('Contact number is already registered. Please use a different contact number.')</script>";
    } else {
        $image = $_FILES['file_image']['name'];
        $path = $_FILES['file_image']['tmp_name'];
        move_uploaded_file($path, "../Assets/Files/User/" . $image);

        $ins = "INSERT INTO tbl_user(user_name, user_email, user_contact, user_address, user_image, place_id, user_password)
        VALUES('$name', '$email', '$contact', '$address', '$image', '$place', '$password')";

        if (mysql_query($ins)) {
            // Query inserted successfully
            echo "<script>alert('Query Inserted'); window.location='UserRegistration.php';</script>";
        } else {
            echo "Insert Failed";
        }
    }
}
?>
<!-- Rest of your HTML code remains the same -->

<br><br><br><br><br><br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</head>

<body>



<div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <h2 class="mb-4">User Registration</h2>
        <table class="table">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="txt_name" id="txt_name" required="required" class="form-control" onchange="nameval(elem)">
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" name="txt_email" id="txt_email" required="required" class="form-control" onchange="emailval(elem)">
                </td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>
                    <input type="text" name="txt_contact" id="txt_contact" required name="txt_contact" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"id="txt_contact"  class="form-control" onchange="checknum(elem)">
                </td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    <input type="text" name="txt_address" id="txt_address" required="required" class="form-control">
                </td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <input type="file" name="file_image" id="file_image" required="required" class="form-control">
                </td>
            </tr>
            <tr>
                <th>District</th>
                <td>
                    <select name="sel_district" id="sel_district" onchange="getPlace(this.value)" class="form-select">
                        <option>--SELECT--</option>
                        <?php
                            // Your PHP code to populate district options here
					
		$selQry = "select * from tbl_district";
		$data = mysql_query($selQry);
		while($row = mysql_fetch_array($data))
		{
		?>
        <option value="<?php echo $row['district_id']  ?>"><?php echo $row['district_name']  ?></option>
        <?php
		}
		?>
                    
                    </select>
                </td>
            </tr>
            <tr>
                <th>Place</th>
                <td>
                    <select name="sel_place" id="sel_place" class="form-select">
                        <option>--SELECT--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <input type="password" name="txt_password" id="txt_password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" class="form-control">
                </td>
            </tr>
			<tr>
                    <th>Re-Password</th>
                    <td><input type="repassword" name="txt_repassword" id="txt_repassword" class="form-control" onchange="checkpwd()">
	 </td>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-primary">
                    <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" class="btn btn-secondary">
                </td>
            </tr>
        </table>
    </form>
</div>
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
function checkpwd()
{
var pas=document.getElementById("txt_password").value;
var repas=document.getElementById("txt_repassword").value;
if(pas!=repas)
{
alert("Password mismatch");
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
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Numbers Only Allowed</span>";
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
<br><br><br><br><br><br><br><br><br><br><br>
 <?php
include("Foot.php");
ob_flush();
 ?>
</html>