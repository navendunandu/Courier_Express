<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
 include("../Assets/Connection/connection.php");
 ob_start()
 include('Head.php');
 if(isset($_POST["txt_btn"]))
 {
	 $ins="insert into tbl_branch(branch_email,branch_contact,branch_address,place_id,branch_password)values('".$_POST["txt_bemail"]."','".$_POST["txt_bcon"]."','".$_POST["txt_baddr"]."','".$_POST["txt_place"]."','".$_POST["txtpass"]."')";
	 mysql_query($ins);
	 header("location:branch.php");
 }
 
 if(isset($_GET["did"]))
 {
	 $del="delete from tbl_branch where branch_id='".$_GET["did"]."'";
	 mysql_query($del);
	 header("location:branch.php");
 }
 ?>
<h1><center>Branch.php</center></h1>

<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="466" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td width="135" height="47">Email</td>
        <td width="288"><input required type="text" name="txt_bemail" id="txt_bemail" /></td>
      </tr>
      <tr>
        <td height="48">Address</td>
        <td><input required type="text" name="txt_baddr" id="txt_baddr" /></td>
      </tr>
      <tr>
    <td height="41">District</td>
    <td>
      <select name="sel_district" id="sel_district"  onChange="getPlace(this.value)">
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
      </select></td>
    </td>
  </tr>
  <tr>
    <td height="39">Place</td>
    <td>
      <select name="txt_place" id="txt_place">
        <option value="">---select---</option>   
      </select>
    </td>
  </tr>
      <tr>
        <td height="45">Password</td>
        <td><input required type="password" title="Must contain at least one number and at least 8 characters" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8}" name="txtpass" id="txtpass" /></td>
      </tr>
      <tr>
        <td height="45">Contact</td>
        <td><input required type="tel" pattern="[7-9]{1}[0-9]{9}" title="only digits" name="txt_bcon" id="txt_bcon" /></td>
      </tr>
    
      <tr>
        <td height="82" colspan="2"><div align="center">
          <input required type="submit" name="txt_btn" id="txt_btn" value="Register" />
           <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
        </div></td>
      </tr>
    </table>
    <table width="200" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td>Sl.No</td>
        <td>Email</td>
        <td>Address</td>
        <td>District</td>
        <td>Place</td>
        <td>Contact</td>
        <td>Action</td>
      </tr>
      <?php
	  $sel="select * from tbl_branch b inner join tbl_place p on p.place_id=b.place_id inner join tbl_district d on d.district_id=p.district_id";
	  $data=mysql_query($sel);
	  $i=0;
	  while($row=mysql_fetch_array($data))
	  {
		  $i++;
	  ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $row["branch_email"]?></td>
        <td><?php echo $row["branch_address"]?></td>
        <td><?php echo $row["district_name"]?></td>
        <td><?php echo $row["place_name"]?></td>
        <td><?php echo $row["branch_contact"]?></td>
        <td><a href="branch.php?did=<?php echo $row["branch_id"]?>"><img src="../Assests/pics/clear.png" width="50" height="50" </a></td>
      </tr>
      <?php
	  }
	  ?>
    </table>
  </div>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function(data) {
		
			$("#txt_place").html(data);

		}
	});
}

</script>