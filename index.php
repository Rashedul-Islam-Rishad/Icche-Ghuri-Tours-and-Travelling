<?php
include("setting.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:home.php");
}
$e=mysqli_real_escape_string($al, $_POST['email']);
$p=mysqli_real_escape_string($al, $_POST['pass']);
if($_POST['email']!=NULL && $_POST['pass']!=NULL)
{
	$pp=sha1($p);
	$sql=mysqli_query($al, "SELECT * FROM customers WHERE email='$e' AND password='$pp'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$e;
		header("location:home.php");
	}
	else
	{
		$info="Incorrect Email or Password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IchheGhuri Travelling Agency</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">
<div align ="center">
<span class="headingMain">ইচ্ছে ঘুড়ি</span></div>
<div align ="center"> <span class="headingMain2">ভ্রমন হোক আরো একটু আরামদায়ক।</span> </div>
</div>
<br />
<br />

<div align="center">
<span class="subHead">User Login</span><br />
<br />

<form method="post" action="">
<table border="0" align="center" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Email ID : </td><td><input type="email" size="25" name="email" class="fields" placeholder="Enter Email ID" required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" size="25" name="pass" class="fields" placeholder="Enter Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="newReg.php" class="link">New User Click Here</a>
<br />
<a href="admin.php" class="link">Admin Login</a>

</body>
<br />
<br />
<br />
</html>