<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include('Head.php');
if(isset($_POST["btnpw"]))
{

$selQry="select * from tbl_user where user_id='".$_SESSION["uid"]."' and user_password='".$_POST["txtpw"]."'";
$row=mysql_query($selQry);
if($data=mysql_fetch_array($row))
{
		if($_POST["txtpw2"]==$_POST["txtpw3"])
		{
			$update="update tbl_user set user_password='".$_POST["txtpw2"]."' where user_id='".$_SESSION["uid"]."'";
			mysql_query($update);
			header("location:../Guest/Login.php");
		}
		else{
			echo"Password Mismatch";
		}
}
else{
		echo"Invalid Password";
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
<h1 align="center">CHANGE PASSWORD</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="429" border="1" align="center">
    <tr>
      <td width="175" height="49">Old Password</td>
      <td width="238"><label>
        <input required type="text" title="old password required"  name="txtpw" id="txtpw" />
      </label></td>
    </tr>
    <tr>
      <td height="43">New password</td>
      <td><label>
        <input required type="text" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="txtpw2" name="txtpw2" id="txtpw2" />
      </label></td>
    </tr>
    <tr>
      <td height="48">Confirm password</td>
      <td><label>
        <input required type="text" title="repeat new password" name="txtpw3" id="txtpw3" />
      </label></td>
    </tr>
    <tr>
      <td height="46" colspan="2" align="center"><input type="submit" name="btnpw" id="btnpw" value="Change Password" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
<?php 

?>