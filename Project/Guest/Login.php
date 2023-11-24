<?php
include("../Assets/Connection/connection.php");
     session_start();
 if(isset($_POST["txt_btn"]))
 {
	 $seladmin="select *  from tbl_admin where admin_email='".$_POST["txt_email"]."' and admin_password='".$_POST["txt_pwd"]."'";
	 $dataadmin=mysql_query($seladmin);
	 
	 
	 $selbranch="select *  from tbl_branch where branch_email='".$_POST["txt_email"]."' and branch_password='".$_POST["txt_pwd"]."'";
	 $databranch=mysql_query($selbranch);
	 
	 $seluser="select *  from tbl_user where user_email='".$_POST["txt_email"]."' and user_pwd='".$_POST["txt_pwd"]."'";
	 $datauser=mysql_query($seluser);
	 
	 if($rowadmin=mysql_fetch_array($dataadmin))
	 {
		 $_SESSION["aid"]=$rowadmin["admin_id"];
		 header("location:../Admin/Homepage.php");
	 }
	 else if($rowbranch=mysql_fetch_array($databranch))
	 {
		 $_SESSION["bid"]=$rowbranch["branch_id"];
		 header("location:../BranchAdmin/Homepage.php");
	 }
	 else if($rowuser=mysql_fetch_array($datauser))
	 {
		 $_SESSION["uid"]=$rowuser["user_id"];
		 header("location:../User/HomePage.php");
	 }
	 else
	 {
		 ?>
<script>
	alert("Invalid Login");
	window.location = "Login.php";
</script>
<?php
	 }
	 
 }
ob_start();
include('Head.php');
?>
<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
		<style>
			button {
				width: 100%;
				margin-top: 10px;
			}
		</style>
	</head>

	<body>
		<?php
     
 ?>
		<div class="container-fluid p-0 pb-5">
			<div class="owl-carousel header-carousel position-relative mb-5">
				<div class="owl-carousel-item position-relative">
					<img class="img-fluid" src="../Assets/Templates/Main/img/carousel-1.jpg" alt="">
					<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
						style="background: rgba(6, 3, 21, .5);">

						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-4">
									<form name="form1" method="post" action="">
										<div class="form-group">
											<label for="txt_email">Email</label>
											<input required type="email" class="form-control" name="txt_email"
												id="txt_email" placeholder="Enter email" title="Email required">
										</div>
										<div class="form-group">
											<label for="txt_pwd">Password</label>
											<input required type="password" class="form-control"
												pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="txt_pwd"
												id="txt_pwd" placeholder="Enter password"
												title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters">
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary" name="txt_btn"
												id="txt_btn">Login</button>
										</div>
										<div class="text-center">
											<button type="reset" class="btn btn-secondary" name="btncancel"
												id="btncancel">Create an Account</button>
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

	</html>