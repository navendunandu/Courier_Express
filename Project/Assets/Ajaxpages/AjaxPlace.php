<option value="">---Select---</option>
<?php
include("../Connection/connection.php");
            
			$selqry="select * from tbl_place where district_id='".$_GET["did"]."'";
			echo $selqry;
			$data=mysql_query($selqry);
			 while($row=mysql_fetch_array($data))
		  	  {
				  ?>
				  
       <option value="<?php echo $row['place_id']?>">  
                <?php echo $row['place_name']?> 

     </option>
     <?php
			  }
		?>	  








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>