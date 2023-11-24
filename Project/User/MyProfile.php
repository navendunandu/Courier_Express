<?php
include("../Assets/Connection/connection.php");

session_start();
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
<?php
$userid=$_SESSION['uid'];
$selQry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where u.user_id='".
$userid."'";
$res=mysql_query($selQry);
$row=mysql_fetch_array($res); 

	?>
  <table width="200" border="1">
	  <tr>
	    <td colspan="2"></td>
    </tr>
	  <tr>
	    <td>Name</td>
	    <td><?php echo $row["user_name"]?></td>
    </tr>
	  <tr>
	     <td>Email</td>
	    <td><?php echo $row["user_email"]?></td>
    </tr>
	  <td>Contact</td>
	    <td><?php echo $row["user_contact"]?></td>
    </tr>
	  <tr>
	     <td>Address</td>
	    <td><?php echo $row["user_address"]?></td>
        </tr>
        <tr>
        <td>Place</td>
	    <td><?php echo $row["place_name"]?></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>