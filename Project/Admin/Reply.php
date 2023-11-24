<?php
include("..\Assets\Connection\Connection.php");
ob_start()
include('Head.php');
if(isset($_POST["txt_btn"]))
{
   $reply=$_POST["txt_rply"];	 
   $uns="update tbl_complaint set complaint_status=1,complaint_reply='".$reply."' where complaint_id='".$_GET["cid"]."'";
   mysql_query($uns);
   header("location:viewcomplaint.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1><center>Reply.php</center></h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p>
      <textarea name="txt_rply" required="required" id="txt_rply" cols="45" rows="5"></textarea>
    </p>
    <p>
      <input required type="submit" name="txt_btn" id="txt_btn" value="Submit" />
    </p>
  </div>
 
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>