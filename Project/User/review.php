<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include('Head.php');
if(isset($_POST['txt_btn']))
 {
	$feedcontent=$_POST['txt_rev'];
    $insqry="insert into tbl_feedback(feedback_content,user_id,branch_id) values('$feedcontent','".$_SESSION["uid"]."','".$_GET["bid"]."')";
    $insqry;
   mysql_query($insqry);
 }
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1><center>Review.php</center></h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="379" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td width="336" height="63"><div align="center">
          <p>&nbsp;</p>
          <p>
            <textarea name="txt_rev" id="txt_rev" cols="45" rows="5"></textarea>
          </p>
          <p>
            <input required type="submit" name="txt_btn" id="txt_btn" value="Submit" />
          </p>
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