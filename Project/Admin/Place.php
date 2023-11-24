<?php
include("../Assets/Connection/connection.php");
ob_start()
include('Head.php');
 if(isset($_POST["txt_btn"]))
 {
	 $distid=$_POST["txt_district"];
     $place=$_POST["txt_place"];
	   $insqry="insert into tbl_place(district_id,place_name) values('$distid','$place')";
	   echo $insqry;
	 mysql_query($insqry);
 }
 if($_GET["distid"])
 {
  $did=	 $_GET["distid"];
  $delqry="delete from tbl_place where place_id='$did'";
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
<h1><center>Place.php</center></h1>

<form id="form1" name="form1" method="post" action="">
<table width="347" border="5" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td width="136" height="54">District</td>
    <td width="193"><div align="center">
        <select name="txt_district" id="txt_district">
        <option value="">---select---</option>
         <?php
		 $selqry="select * from tbl_district";
		 $data=mysql_query($selqry);
		 $i=0;
		 while($row=mysql_fetch_array($data))
		 {
			?>
            <option value="<?php echo $row["district_id"]?>">
            <?php echo  $row["district_name"]?>
            </option>
            <?php
		 }
		?>
        </select>
      
    </div></td>
  </tr>
  <tr>
    <td height="60">Place</td>
    <td>
      <input required type="text" name="txt_place" id="txt_place" />
    </td>
  </tr>
  <tr>
    <td height="79" colspan="2"><div align="center">
    
        <input required type="submit" name="txt_btn" id="txt_btn" value="Submit" />
     
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;        </p>
<div align="center">
  <table width="523" border="2" cellspacing="5" cellpadding="5">
    <tr>
      <td width="100" height="53">Sl NO</td>
      <td width="104">District</td>
      <td width="101">Place</td>
      <td width="141">Action</td>
      </tr>
     <?php
		 $selqry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
		 $data=mysql_query($selqry);
		 $i=0;
		 while($row=mysql_fetch_array($data))
		 {
			 $i++;
			?>
             <tr>
                  <td height="54"><?php echo $i?></td>
                  <td><?php echo $row["district_name"]?></td>
                  <td><?php echo $row["place_name"]?></td>
                  <td><a href="place.php?distid=<?php echo $row["place_id"]?>"><img src="../Assests/pics/delete.jpg" width="50" height="50"</a></td>
                </tr>
            <?php 
		 }
		?>
       
      
  </table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>