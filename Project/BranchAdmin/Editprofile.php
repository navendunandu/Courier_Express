<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include('Head.php');

if(isset($_POST["btnupdate"]))
{
	$up="update tbl_branch set  branch_contact='".$_POST["txtcontact"]."',branch_address='".$_POST["txtaddress"]."' where branch_id='".$_SESSION["bid"]."'";
	mysql_query($up);
	header("location:Myprofile.php");
}
$branchid=$_SESSION['bid'];
$selQry="select * from tbl_branch u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where branch_id='".
$branchid."'";
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
      <td>Contact</td>
      <td><label>
        <input required type="tel" pattern="[7-9]{1}[0-9]{9}"  title="only digits" name="txtcontact" id="txtcontact" value="<?php echo $row["branch_contact"]?>" />
      </label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <input required type="text" textarea name="txtaddress" id="txtaddress" cols="45" rows="5" value="<?php echo $row["branch_address"]?>"></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnupdate" id="btnupdate" value="Update" />
       <input required type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 

include('Foot.php');
ob_flush();
?>