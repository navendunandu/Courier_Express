<?php
session_start();
include("..\Assets\Connection\Connection.php");
ob_start();
include('Head.php');
 if(isset($_POST['txt_btn']))
 {
	$ctype=$_POST['txt_ctype'];
    $rname=$_POST['txt_rname'];
    $raddress=$_POST['txt_raddr'];
	$district=$_POST['txt_rdist'];
	$place=$_POST['txt_rplace'];
	$rcontact=$_POST['txt_rcontact'];
	
	echo $ins="insert into tbl_consignment(user_id,branch_id,consignment_rname,couriertype_id,consignment_raddress,consignment_rcontact,place_id,consignment_date)
	values('".$_SESSION["uid"]."','".$_GET["bid"]."','$rname','$ctype','$raddress','$rcontact','$place',curdate())";
	if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			//window.location="User.php";
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
<h1><center>Consignment.php</center></h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="407" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td width="144" height="50">Courier type</td>
        <td width="220"><select name="txt_ctype" id="txt_ctype">
         <option>--SELECT--</option>
           <?php
		$selQry = "select * from tbl_couriertype";
		$data = mysql_query($selQry);
		while($row = mysql_fetch_array($data))
		{
		?>
        <option value="<?php echo $row['couriertype_id']?>"><?php echo $row['couriertype_name'] ?></option>
        <?php
		}
		?>
        
        </select></td>
      </tr>
      <tr>
        <td height="49">Recepeint Name</td>
        <td><input required type="text" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" name="txt_rname" id="txt_rname" /></td>
      </tr>
      <tr>
        <td height="49">Recepient Address</td>
        <td><textarea name="txt_raddr" id="txt_raddr" cols="45" rows="5"></textarea></td>
      </tr>
      <tr>
        <td height="50">Recepient Distriict</td>
        <td><select name="txt_rdist" id="txt_rdist" onChange="getPlace(this.value)">
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
      </select></td
  
      ></tr>
      <tr>
        <td height="47">Recepient Place</td>
        <td><select name="txt_rplace" id="txt_rplace">
         <option value="">---select---</option>   
        </select></td>
      </tr>
      <tr>
        <td height="49">Recepient Contact</td>
        <td><input required type="text" title="only digits" pattern="[7-9]{1}[0-9]{9}" name="txt_rcontact" id="txt_rcontact" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><div align="center">
          
            <input required type="submit" name="txt_btn" id="txt_btn" value="Book" /><input type="submit" name="txt_btn2" id="txt_btn2" value="Cancel" />
        </td>
       </tr>
    </table>
  </div>
</form>
 </body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function(data) {
		
			$("#txt_rplace").html(data);

		}
	});
}

</script>
<?php
include('Foot.php');
ob_flush();
?>
</html>
