<?php
include("../Assets/Connection/connection.php");
ob_start()
 include('Head.php');
$dist="";
if(isset($_POST["txt_btn"]))
{
	$dist=$_POST["txt_complainttype"];  
	$dist;
	$insqry="insert into tbl_complaintype(complaintype_name) values('$dist')";
	mysql_query($insqry);
	
}
 if($_GET["distid"])
 {
  $did=	 $_GET["distid"];
  $delqry="delete from tbl_complaintype where complaintype_id='$did'";
  mysql_query($delqry);
 }
  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <form id="form1" name="form1" method="post" action="">
    <div align="center">
      <table width="466" border="2" cellspacing="5" cellpadding="5">
        <tr>
          <td width="144" height="63">Complaint Type</td>
          <td width="279"><input required type="text" name="txt_complainttype" id="txt_complainttype" /></td>
        </tr>
        <tr>
          <td height="76" colspan="2"><p align="center">
            <input required type="submit" name="txt_btn" id="txt_btn" value="Submit" />
          </p></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="517" border="2" cellspacing="5" cellpadding="5">
        <tr>
          <td width="82" height="55">SL.NO</td>
          <td width="185">complaint Type</td>
          <td width="190">Action</td>
        </tr>
        <?php
		 $selqry="select * from tbl_complaintype";
		 $data=mysql_query($selqry);
		 $i=0;
		 while($row=mysql_fetch_array($data))
		 {
			 $i++;
			?>	
             <tr>
                  <td height="54"><?php echo $i?></td>
                  <td><?php echo $row["complaintype_name"]?></td>
                  <td><a href="ComplaintType.php?distid=<?php echo $row["complaintype_id"]?>">Delete</a></td>
                </tr>
            <?php 
		 }
		?>
       
       
      
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </form>
<?php
include('Foot.php');
ob_flush();
?>
</html>