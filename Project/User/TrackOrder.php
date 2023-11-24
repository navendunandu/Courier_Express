<?php
 include("../Assets/Connection/connection.php");
 session_start(); 
 ob_start();
include('Head.php');
    ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <br>
    <h1>
        <center>Track Your Order</center>
    </h1>

    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td><input type="text" name="txt_track" id="txt_track"></td>
                <td><input type="submit" value="Search" name='btn_search'></td>
            </tr>
        </table>
    </form>
    <br>
    <?php
if(isset($_POST['btn_search']))
{
    $selqry="select * from tbl_consignment c inner join tbl_couriertype ct on ct.couriertype_id=c.couriertype_id where c.consignment_trackid='".$_POST['txt_track']."'";
    $data=mysql_query($selqry);
	$row=mysql_fetch_array($data);
    ?>
    <table border="2" cellspacing="5" cellpadding="5" align='center'>
        <tr>
            <td>Date</td>
            <td>CourierType</td>
            <td>Address</td>

            <td>Tracking_Id</td>
            <td>Status</td>
        </tr>
        <tr>
            <td>
                <?php echo $row["consignment_date"]?>
            </td>

            <td>
                <?php echo $row["couriertype_name"]?>
            </td>
            <td>
                <?php echo $row["consignment_rname"]?><br />
                <?php echo $row["consignment_raddress"]?><br>
                <?php echo $row["consignment_contact"]?>
            </td>
            <td>
                <?php echo $row["consignment_trackid"]?>
            </td>
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

        </tr>
    </table>
    <?php
}
?>
    
</body>
<?php
include('Foot.php');
ob_flush();
?>

</html>