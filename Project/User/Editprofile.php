<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include('Head.php');
if(isset($_POST["btnupdate"]))
{
	$up="update tbl_user set user_name='".$_POST["txtname"]."', user_contact='".$_POST["txtcontact"]."',user_address='".$_POST["txtaddress"]."' where user_id='".$_SESSION["uid"]."'";
	mysql_query($up);
	header("location:Myprofile.php");
}
$userid=$_SESSION['uid'];
$selQry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".
$userid."'";
$res=mysql_query($selQry);
$row=mysql_fetch_array($res);

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<h1 align="center"> EDIT MY PROFILE</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label>
        <input required type="text" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" name="txtname" id="txtname"  value="<?php  echo $row["user_name"]?>"/>
      </label></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label>
        <input required type="text"  pattern="[7-9]{1}[0-9]{9}" title="only digits" name="txtcontact" id="txtcontact" value="<?php echo $row["user_contact"]?>" />
      </label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <input required type="text" textarea name="txtaddress" id="txtaddress" cols="45" rows="5" value="<?php echo $row["user_address"]?>"></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnupdate" id="btnupdate" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>