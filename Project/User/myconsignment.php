<?php
 include("../Assets/Connection/connection.php");
 session_start(); 
 ob_start();
include('Head.php');
 if(isset($_GET['cid'])){
	 $updqry="update tbl_consignment set consignment_status=".$_GET['st']." where consignment_id=".$_GET['cid'];
	 if(mysql_query($updqry))
	 {
		 ?>
         <script>
		 alert('Updated')
		 window.location="ViewStatus.php"
		 </script>
         <?php
	 }
	 else{
		 ?>
         <script>
		 alert('Failed')
		 window.location="ViewStatus.php"
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
<h1><center>viewstatus.php</center></h1>

<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table border="2" cellspacing="5" cellpadding="5">
      <tr>
        <td>Sl.NO</td>
        <td>Date</td>
        <td>CourierType</td>
        <td>Address</td>
                   
        <td>Tracking_Id</td>
        <td>Status</td>
        <td>Action</td>
      </tr>
      <?php
      $i=0;
	   $selqry="select * from tbl_consignment c inner join tbl_couriertype ct on ct.couriertype_id=c.couriertype_id where c.user_id='".$_SESSION["uid"]."'";
	   $data=mysql_query($selqry);
  
		 while($row=mysql_fetch_array($data))
		 {
			 $i++;
			?>	
             <tr>
                  <td><?php echo $i?></td>
                                    <td><?php echo $row["consignment_date"]?></td>                

                  <td><?php echo $row["couriertype_name"]?></td                
                   ><td><?php echo $row["consignment_rname"]?><br /><?php echo $row["consignment_raddress"]?><br><?php echo $row["consignment_contact"]?></td>
                                       <td><?php echo $row["consignment_trackid"]?></td>
                                       <td>
                                        <?php if($row['consignment_status']==1){
								 echo "Accepted";
							 }
							 else if($row['consignment_status']==2){
								 echo "Accepted";
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
                             <a href="Myconsignment.php?cid=<?php echo $row["consignment_id"]?>&st=7">Cancel</a><br />
<?php
							 }
							  else if($row['consignment_status']==1){
								 ?>
                             <a href="Payment.php?cid=<?php echo $row["consignment_id"]?>">Payment</a><br />
<?php
							 }
							 else if($row['consignment_status']==5){
								 ?>
                             <a href="Complaint.php?cid=<?php echo $row["consignment_id"]?>">Complaint</a><br />
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