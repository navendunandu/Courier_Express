<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include('Head.php');
$dist="";
if(isset($_POST["txt_btn"]))
{
	$comptype=$_POST["txt_comptype"];
	$comptitle=$_POST["txt_title"]; 
    $msg=$_POST["txt_msg"]; 
	$insqry="insert into tbl_complaint(complaintype_id,complaint_title,complaint_content,user_id,consignment_id)values('".$comptype."','".$comptitle."','".$msg."','".$_SESSION['uid']."','".$_GET["cid"]."')"; 
 if(mysql_query($insqry))  { 
      ?> 
      <script> 
          alert("sended"); 
          </script> 
          <?php 
} 
else 
{ 
    ?> 
    <script> 
    alert("failed"); 
    </script> 
    <?php 
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
<h1><center>	Complaint.php</center></h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="377" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td width="135" height="50">Complaint Type</td>
        <td width="199"><select name="txt_comptype"  id="txt_comptype">
         <option>--SELECT--</option>
         <?php
		 $selqry="select * from tbl_complaintype";
		 $data=mysql_query($selqry);
		 $i=0;
		 while($row=mysql_fetch_array($data))
		 {
			 $i++;
			?>
             <option value="<?php echo $row["complaintype_id"]?>"><?php echo $row["complaintype_name"]?></option>
            <?php 
		 }
		?>
        </select></td>
      </tr>
      <tr>
        <td height="51">Complaint Title</td>
        <td><input required type="text" name="txt_title" id="txt_title" /></td>
      </tr>
      <tr>
        <td height="50">Message</td>
        <td><textarea name="txt_msg" required id="txt_msg" cols="45" rows="5"></textarea></td>
      </tr>
      <tr>
        <td height="69" colspan="2"><div align="center">
          <input required type="submit" name="txt_btn" id="txt_btn" value="Submit" />
          <input required type="reset" name="btncancel" id="btncancel" value="Cancel" /> 
        </div></td>
      </tr>
    </table>
  </div>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>