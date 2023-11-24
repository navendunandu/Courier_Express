<?php
include("../Connection/connection.php");
            ?>
			
<table align="center" cellpadding="10" cellspacing="60" id="result">
  <tr>
  <?php
  $seldata="select * from tbl_branch b inner join tbl_place p on p.place_id=b.place_id inner join tbl_district d on d.district_id=p.district_id where true";
  if($_GET["pid"]!="")
  {
	  $seldata.=" and b.place_id='".$_GET["pid"]."'";
	  
  }
  if($_GET["did"]!="")
  {
	  $seldata.=" and p.district_id='".$_GET["did"]."'";
	  
  }
  $datas=mysql_query($seldata);if($_GET["pid"]!="")
  {
	  $seldata.=" and b.place_id='".$_GET["pid"]."'";
	  
  }
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