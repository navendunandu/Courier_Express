<?php
$fname="";
$lname="";
$gender="";
$martial="";
$department="";
$bsalary="";
if(isset($_POST["btn_submit"]))
{

	$fname=$_POST["txt_fname"];
	$lname=$_POST["txt_lname"];
	$gender=$_POST["txt_gen"];
    $martial=$_POST["txt_mar"];
	$department=$_POST["department"];
	$basicsalary=$_POST["txt_bp"];
 if($gender=="male")
  {
	  $name="Mr.".$fname."".$lname;
  }
  else
  {
	  if($martial=="single")
	  {
		 $name="Miss.".$fname."".$lname;
	  }
	  else{
		  		 $name="Mrs.".$fname."".$lname;
	  }
  }
	if(txt_bp>=10000)
	{
	  $TA=(40/100) * $txt_bp;
	  $DA=(35/100) * $txt_bp;
	  $HRA=(30/100) * $txt_bp;	
	  $LIC=(25/100) * $txt_bp;
	  $PF=(20/100) * $txt_bp; 	}
}  
 else  if(txt_bp>=5000&&txt_bp<10000)
	{
	  $TA=(35/100) * $txt_bp;
	  $DA=(30/100) * $txt_bp;
	  $HRA=(25/100) * $txt_bp;	
	  $LIC=(20/100) * $txt_bp;
	  $PF=(15/100) * $txt_bp;
	}
else 	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<center>
<form method="post" action="" >
<table border=1>

<tr>
<th>First name</th>
<td><input type="text" name="txt_fname"></td></tr>
<tr><th>Last name</th>
<td><input type="text" name="txt_lname"></td></tr>
<tr><th>Gender</th>
<td><input type="radio" name="txt_gen" value="male">male
   
    <input type="radio" name="txt_gen" value="female">female
</td></tr>
<tr><th>Martial</th>
<td><input type="radio" name="txt_mar" value="single">single
    <input type="radio" name="txt_mar" value="married">married
</td></tr>
<tr><th>Department</th>
<td>
<select name="department">
   <option value="">---select---</option>
   <option value="BCA">BCA</option>
   <option value="MCA">MCA</option>
   <option value="Bcom">Bcom</option>
   <option value="BTTM">BTTM</option>
</select>
</td></tr>
<th>Basic Salary</th><td><input type="number" name="txt_bp">
</td></tr>
<tr><td align="center" colspan="3"> 
    <input type="submit"  name="btn_submit" value="submit">
        <input type="reset" value="cancel">
</td></tr>
<tr><th>Name</th>
<td><?php echo $fname," ",$lname; ?></td></tr>
<tr><th>Gender</th>
<td><?php echo $gender; ?></td></tr>
<tr><th>Martial</th>
<td><?php echo $martial; ?></td></tr>
<tr><th>Department</th>
<td><?php echo $department; ?></td></tr>
<tr><th>Basic Salary</th>
<td><?php echo $basicsalary; ?></td></tr>
<tr><th>T.A</th>
<td></td></tr> 
<tr><th>D.A</th>
<td></td></tr>
<tr><th>HRA</th>
<td></td></tr>
<tr><th>LIC</th>
<td></td></tr>
<tr><th>P.F</th>
<td></td></tr>
<tr><th>Deduction</th>
<td></td></tr>
<tr><th>NET</th>
<td></td></tr>
</table>
</form>

</body>
</html>