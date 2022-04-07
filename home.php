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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/owl.carousel.min.css"/>
<link rel="stylesheet" href="css/owl.theme.default.min.css"/>
<link rel="stylesheet" href="css/font-awesome.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/style.css"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IchheGhuri Travelling Agency</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">
  <div align="center"> <span class="headingMain">ইচ্ছে ঘুড়ি</span> </div>
  <div align="center"> <span class="headingMain2">ভ্রমন হোক আরো একটু আরামদায়ক।</span> </div>
</div>
<br />
<br />
<div align="center"> <span class="subHead">Welcome <?php echo $name;?></span> <br />
  <br />
  
  <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2200">
                        <ul class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ul>
                        <div class="carousel-inner"> 
                            <div class="item active">
                                <img src="images/sd.jpg" alt="">
                                
                            </div>
                            <div class="item">
                                <img src="images/12.jpeg" alt="">
                                
                            </div>
                            <div class="item">
                                <img src="images/s13.jpg" alt="">
                                
                            </div>
                            <div class="item ">
                                <img src="images/s11.jpg" alt="">
                               
                            </div>
                        </div>
                        <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#myCarousel" class="right carousel-control" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>



  <table border="0">
<tr><td><a href="book.php" class="cmd">♦ Book Package</a></td><td><a href="changePassword.php" class="cmd">♦ Change Password</a></td></tr>
<tr><td colspan="2" align="center"><a href="logout.php" class="cmd">♦ Logout</a>
</table>
</div>

<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery.elevatezoom.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>