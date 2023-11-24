<?php
 include("../Assets/Connection/connection.php");
 if(isset($_POST['txt_btn']))
 {
	$name=$_POST['txt_name'];
    $contact=$_POST['txt_con'];
    $email=$_POST['txt_email'];
	$address=$_POST['txt_add'];
	$district=$_POST['txt_distr'];
	$place=$_POST['txt_place'];
	$password=$_POST['txt_pwd'];
	
	$gender=$_POST['gender'];

    $photo=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assests/Files/User/".$photo);
	  
  
	$ins="insert into tbl_user(user_name,user_email,user_contact,user_address,user_photo,place_id,user_pwd,user_gender)
	values('$name','$email','$contact','$address','$photo','$place','$password','$gender')";
	echo $ins;
	if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="User.php";
		</script>
        <?php
	}
	else
	{
		echo "Insert Failed";
	}
} 	  
	
 ob_start();
 include('Head.php');

?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="container-fluid p-0 pb-5">
			<div class="owl-carousel header-carousel position-relative mb-5">
				<div class="owl-carousel-item position-relative">
					<img class="img-fluid" src="../Assets/Templates/Main/img/carousel-1.jpg" alt="">
					<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
						style="background: rgba(6, 3, 21, .5);">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="form2" name="form2" method="post" action="" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">User Registration</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="txt_name">Name</label>
                            <input required type="text" class="form-control" pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only Alphabets, Spaces, and First Letter Must Be Capital Letter" name="txt_name" id="txt_name">
                        </div>
                        <div class="form-group">
                            <label for="txt_con">Contact</label>
                            <input required type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" title="Only digits" name="txt_con" id="txt_con">
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input required type="email" class="form-control" pattern="^[A-Z]+[a-zA-Z0-9@]{15,25}*$" title="Email required" name="txt_email" id="txt_email">
                        </div>
                        <div class="form-group">
                            <label for="txt_addr">Address</label>
                            <textarea name="txt_add" id="txt_addr" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sel_district">District</label>
                            <select name="sel_district" id="sel_district" class="form-control" onChange="getPlace(this.value)">
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
		?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="form-check">
                                <input required type="radio" class="form-check-input" name="gender" id="txt_gend" value="Male">
                                <label class="form-check-label" for="txt_gend">Male</label>
                            </div>
                            <div class="form-check">
                                <input required type="radio" class="form-check-input" name="gender" id="txt_gend2" value="Female">
                                <label class="form-check-label" for="txt_gend2">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txt_place">Place</label>
                            <select name="txt_place" id="txt_place" class="form-control">
                                <option value="">---select---</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file_image">Photo</label>
                            <input type="file" class="form-control-file" name="file_image" id="file_image" required="required">
                        </div>
                        <div class="form-group">
                            <label for="txt_pwd">Password</label>
                            <input required type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters" name="txt_pwd" id="txt_pwd" maxlength="8">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="txt_btn" id="txt_btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
				</div>
			</div>
		</div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function(data) {
		alert(data)
			$("#txt_place").html(data);

		}
	});
}

</script>

</html>