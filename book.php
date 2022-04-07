<?php
include("setting.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al, "SELECT * FROM customers WHERE email='$email'");
$b=mysqli_fetch_array($a);

$name=$b['name'];
$id=$_POST['pack'];
$p=mysqli_query($al, "SELECT * FROM holiday WHERE id='$id'");
$q=mysqli_fetch_array($p);
$rate=$q['amount'];
$pack=$q['name'];
$j=$_POST['j'];
$m=$_POST['mem'];
$d=$_POST['d'];

$amount=$m*$rate;
if($id!=NULL && $j!=NULL && $m!=NULL && $d!=NULL)
{
	$sql=mysqli_query($al, "INSERT INTO bookings(email,package,members,journey,amount,date,status) VALUES('$email','$pack','$m','$j','$amount','$d','0')");
	if($sql)
	{
		$info="Successfully Received Your Booking Info.<br> Total Amount Payable for $m Member(s) is BDT $amount .<br>";
	}
	else
	{
		$info="Error Please Try Again";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IchheGhuri Travelling Agency</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.ashu
{
	border:1px solid #333;
	border-collapse:collapse;
	color:#FFF;
}

</style>
</head>

<body>
<div id="header">
  <div align="center"> <span class="headingMain">ইচ্ছে ঘুড়ি</span> </div>
  <div align="center"> <span class="headingMain2">ভ্রমন হোক আরো একটু আরামদায়ক।</span> </div>
</div>
<br />
<br />
<div align="center"> <span class="subHead">Book Holiday Package</span> <br />
  <br />
  <form method="post" action="">
 <table border="0" cellpadding="5" cellspacing="5" class="design">
 <tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
 <tr><td class="labels">Package : </td><td>
 <select name="pack" class="fields" required>
 <option value="" selected="selected" disabled="disabled"> - - Select Package - -</option>
 <?php
 $x=mysqli_query($al, "SELECT * FROM holiday");
 while($y=mysqli_fetch_array($x))
 {
	 ?>
<option value="<?php echo $y['id'];?>"><?php echo "BDT ".$y['amount']."".$y['name'];?></option>
<?php } ?>
</select></td></tr>
<tr><td class="labels">Journey By : </td><td>
<select name="j" class="fields" required>
<option value="" selected="selected" disabled="disabled">- - Ticket By - -</option>
<option value="Air">Air</option>
<option value="Train">Train</option>
<option value="Travels(BUS)">Travels(BUS)</option>
</select>
</td></tr>
<tr><td class="labels">Members : </td><td><input type="number" class="fields" size="5" placeholder="Select Members"  required="required" name="mem" /></td></tr>
<tr><td class="labels">Date : </td><td><input type="date" class="fields" size="10" placeholder="DD/MM/YYY"   required="required" name="d" /></td></tr>

<tr><td colspan="2" align="center"><input type="submit" value="BOOK NOW" class="fields" /></td></tr>
</table> 
</form>
<br />
<br />
 <span class="subHead">Current Holiday Packages<br /></span><br />

<table border="0" cellpadding="5" cellspacing="5" class="design ashu">
<tr class="labels ashu"><th class="ashu">Sr.No.</th><th class="ashu">Package Name</th>
<th class="ashu">Journey By</th><th class="ashu">Total Amount</th><th class="ashu">payment</th><th class="ashu">Date</th><th class="ashu">Status</th>
<th class="ashu">Delete</th></tr>
<?php
$u=1;
$x=mysqli_query($al, "SELECT * FROM bookings WHERE email='$email'");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels">
<td class="ashu"><?php echo $u;$u++;?></td>
<td class="ashu"><?php echo $y['package'];?></td>
<td class="ashu"><?php echo $y['journey'];?></td>
<td class="ashu"><?php echo "BDT ".$y['amount'];?></td>
<td class="ashu"><a href="payment.php?price=<?php echo $y['amount'];?>" class="link">Make Payment</a></td>
<td class="ashu"><?php echo $y['date'];?></td><td class="ashu"><?php if($y['status']==1){echo "Approved";}else{echo "Pending";}?></td>

<td class="ashu"><a href="deleteH.php?d=<?php echo $y['id'];?>" class="link">Delete</a></td>
</tr>
<?php } ?>
</table>
<br />
<a href="home.php" class="link">HOME</a><br>

</div>
</body>
</html>