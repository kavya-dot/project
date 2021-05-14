<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My form</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="403" border="1" align="center">
    <caption>
      REGISTRATION PAGE
    </caption>
    <tr>
      <td width="176">Name</td>
      <td width="211"><label>
        <input type="text" name="textfield" required pattern="[A-Za-z]+" title="letters only" />
      </label></td>
    </tr>
    <tr>
      <td>Email id </td>
      <td><label>
        <input type="text" name="textfield2" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Add '@' and '.' operator" />
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="password" name="textfield3" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Submit" />
      </label></td>
      <td><label>
        <input type="reset" name="Submit2" value="Reset" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<?php include "dbcon.php" ?>

<?php 
if (isset($_POST['Submit']))
{


$a=$_POST["textfield"];
$b=$_POST["textfield2"];
$c=$_POST["textfield3"];


$sql="select * from person where  emailid='{$b}'";
$found=0;
$result=$con->query($sql);
if($result ->num_rows == 1)
{	
	$found=1;
}
	
	if($found==0)
	{

$query = "insert into person values('$a','$b','$c')";
//echo $query;
mysqli_query($con,$query);

echo "<h3 align = center>Registered successfully </h3>";
}
else
{
	echo("<h4 align=center>Sorry ,User already Registered...</h4>");		
}

}

?>
</body>
</html>
