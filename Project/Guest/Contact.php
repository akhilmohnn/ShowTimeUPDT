    <?php
include("Head.php");
include("../Assets/connection/connection.php");
if(isset($_POST["btnsub"]))
   {
	 $name=$_POST["name"];
	 $email=$_POST["email"];
	  $subject=$_POST["subject"];
	   $message=$_POST["message"];
	 $insQry="insert into tbl_contact(contact_name ,contact_email,contact_subject,contact_subject)values('$name','$email','$subject','$message')";
	echo ' <script> alert("Thanks for contacting") </script>';
	mysql_query($insQry);
   }
   
   
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact</title>
</head>

<body>
<center>
<form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txt_name">Name</label>
                <input type="text" name="txt_name" id="txt_name" class="form-control" />
            </div>
            <div class="form-group">
                <label for="txt_email">Email</label>
                <input type="text" name="txt_email" id="txt_email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="txt_subject">Subject</label>
                <input type="text" name="txt_subject" id="txt_subject" class="form-control" />
            </div>
            <div class="form-group">
                <label for="txt_message">Message</label>
                <textarea name="txt_message" id="txt_message" class="form-control" cols="45" rows="5"></textarea>
            </div>
            <div class="text-center">
                <input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-primary" />
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
</center>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
 ?>
</html>
