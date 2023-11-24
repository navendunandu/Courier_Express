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
<h1><center>viewreply.php</center></h1>

<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="200" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td width="44">SL.NO</td>
        <td width="7">Complaint Type</td>
        <td width="10">Complaint Title</td>
        <td width="10">Content</td>
    
        <td width="14">Reply</td>
      </tr>
      <tr>
       <?php
	  	$selqry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id where c.user_id='".$_SESSION["uid"]."'";
		 $data=mysql_query($selqry);
		 $i=0;
		while($row=mysql_fetch_array($data))
		 {
			 $i++;
			?>	
         <tr>
                  <td height="54"><?php echo $i?></td>
                  <td><?php echo $row["complaintype_id"]?></td>                
                  <td><?php echo $row["complaint_title"]?></td>                
                  <td><?php echo $row["complaint_content"]?></td>
                  <td><?php echo $row["complaint_reply"]?></td>

            <?php 
		 }
		?>

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