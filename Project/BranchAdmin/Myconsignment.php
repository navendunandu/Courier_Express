<?php
 include("../Assets/Connection/connection.php");
 session_start();
 ob_start();
 include('Head.php');
 if(isset($_GET['cid'])){
	 if($_GET['st']==4){
		 $tracknum=10000+$_GET['cid'];
		 $trackid='CE'.$tracknum;
		 $updqry="update tbl_consignment set consignment_status=".$_GET['st'].", consignment_trackid='".$trackid."' where consignment_id=".$_GET['cid'];
	 }
	 else{
	 $updqry="update tbl_consignment set consignment_status=".$_GET['st']." where consignment_id=".$_GET['cid'];
	 }
	 if(mysql_query($updqry))
	 {
		 ?>
         <script>
		 alert('Updated')
		 window.location="MyConsignment.php"
		 </script>
         <?php
	 }
	 else{
		 ?>
         <script>
		 alert('Failed')
		 window.location="MyConsignment.php"
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


<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="621" border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td width="54" height="74">Sl.NO</td>
        <td width="69">Date</td>
        <td width="101">CourierType</td>
        <td width="73">Address</td>
                   
        <td width="107">Tracking_Id</td>
        <td width="106">Status</td>
        <td width="106">Action</td>
      </tr>
      <?php
      $i=0;
	   $selqry="select * from tbl_consignment c inner join tbl_couriertype ct on ct.couriertype_id=c.couriertype_id where c.branch_id='".$_SESSION["bid"]."'";
	   $data=mysql_query($selqry);
  
		 while($row=mysql_fetch_array($data))
		 {
			 $i++;
			?>	
             <tr>
                  <td height="54"><?php echo $i?></td>
                                    <td><?php echo $row["consignment_date"]?></td>                

                  <td><?php echo $row["couriertype_name"]?></td                
                   ><td><?php echo $row["consignment_rname"]?><br /><?php echo $row["consignment_raddress"]?><br><?php echo $row["consignment_contact"]?></td>
                                       <td><?php echo $row["consignment_trackid"]?></td>
                                       <td>
                                        <?php if($row['consignment_status']==1){
								 echo "Accepted<br>Waiting for payment";
							 }
							 else if($row['consignment_status']==2){
								 echo "Rejected";
							 }
							 else if($row['consignment_status']==3){
								 echo "Payment Done";
							 }
							 else if($row['consignment_status']==4){
								 echo "Picked Up";
							 }
							 else if($row['consignment_status']==5){
								 echo "Shipped";
							 }
							 else if($row['consignment_status']==6){
								 echo "Delivered";
							 }
							 else if($row['consignment_status']==7){
								 echo "Cancelled";
							 }
							 ?>
                                       </td>                
                             <td>
                             <?php if($row['consignment_status']==0){
								 ?>
                             <a href="Myconsignment.php?cid=<?php echo $row["consignment_id"]?>&st=1">Accept</a><br />
<a href="Myconsignment.php?cid=<?php echo $row["consignment_id"]?>&st=2">Reject</a>
<?php
							 }
							 else if($row['consignment_status']==1){
								 ?>
                             <a href="Myconsignment.php?cid=<?php echo $row["consignment_id"]?>&st=3">Pick-Up</a><br />
<?php
							 }
							 else if($row['consignment_status']==3){
								 ?>
                             <a href="Myconsignment.php?cid=<?php echo $row["consignment_id"]?>&st=4">Shipped</a><br />
<?php
							 }
							 else if($row['consignment_status']==4){
								 ?>
                             <a href="Myconsignment.php?cid=<?php echo $row["consignment_id"]?>&st=5">Delivered</a><br />
<?php
							 }
							 ?></td>


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