<?php
include("../Assets/Connection/connection.php");
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
<h1><center>SearchBranch.php</center></h1>

<form id="form1" name="form1" method="post" action="">
  <table  align="center" cellpadding="10" border="2" cellspacing="5" >
    <tr>
    <td height="41">District</td>
    <td>
      <select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
          <option>--SELECT--</option>
           <?php
		$selQry = "select * from tbl_district";
		$data = mysql_query($selQry);
		while($row = mysql_fetch_array($data))
		{
		?>
        <option value="<?php echo $row['district_id']  ?>"><?php echo $row['district_name']  ?></option><br />
        <?php
		}
		?>
        
      </select></td>
    </td>
  
    <td height="39">Place</td>
    <td>
      <select name="txt_place" id="txt_place" onchange="getBranch()">
        <option value="">---select---</option>   
      </select>
    </td>
  </tr>
  </table>
  <table align="center" cellpadding="10" cellspacing="60" id="result">
  <tr>
  <?php
  $seldata="select * from tbl_branch b inner join tbl_place p on p.place_id=b.place_id inner join tbl_district d on d.district_id=p.district_id";
  $datas=mysql_query($seldata);
  $i=0;
  while($rowdata=mysql_fetch_array($datas))
  {
	  $i++;
  ?>
  <td>
  <p style="text-align:center;border:1px solid #999;margin:22px;padding:10px">
  Branch Address:<?php echo $rowdata["branch_address"]?><br />
  Branch Contact: <?php echo $rowdata["branch_contact"]?><br />
  Email :<?php echo $rowdata["branch_email"]?><br />
  <a href="consignment.php?bid=<?php echo $rowdata["branch_id"]?>">Book Consignment</a><br />
   <a href="review.php?bid=<?php echo $rowdata["branch_id"]?>">review</a>
  </p>
  </td>
  <?php
  if($i%4==0)
  {
	  echo "</tr><tr>";
  }
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

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
		success: function(data) {
		
			$("#txt_place").html(data);
			getBranch();

		}
	});
}
function getBranch()
{
	var did=document.getElementById("sel_district").value;
	var pid=document.getElementById("txt_place").value;
	$.ajax({
		url: "../Assets/AjaxPages/AjaxBranch.php?did=" + did+"&pid="+pid,
		success: function(data) {
		
			$("#result").html(data);

		}
	});
}

</script>