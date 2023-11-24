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
<h1><center>viewreview.php</center></h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="200" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td width="44">SL.NO</td>
        <td width="10">review Content</td>
        <td width="14">User</td>
      </tr>
      <?php
	   $selqry="select * from tbl_feedback f inner join tbl_user u on f.user_id=u.user_id";
		 $data=mysql_query($selqry);
		 $i=0;
		while($row=mysql_fetch_array($data))
		 {
			 $i++;
			?>	
         <tr>
                  <td height="54"><?php echo $i?></td>
                  <td><?php echo $row["feedback_content"]?></td>
                  <td><?php echo $row["user_id"]?></td>
            <?php 
		 }
		?>
</table>
</form>      
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>