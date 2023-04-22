<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Mkulima Agrovet</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Mkulima Agrovet</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
                <li><a href="vet.php"><span class="glyphicon glyphicon-user"></span> Vet</a></li>
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3 col-xs-3">Sl.No</div>
									<div class="col-md-3 col-xs-3">Product Image</div>
									<div class="col-md-3 col-xs-3">Product Name</div>
									<div class="col-md-3 col-xs-3">Price in <?php echo CURRENCY; ?></div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo "Hi, ".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:black;"><span class="glyphicon glyphicon-shopping-cart"> Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:black;">Orders</a></li>
						<li class="divider"></li>
						
						<li><a href="customer_order.php" style="text-decoration:none; color:black;">Vet Services</a></li>
						<li class="divider"></li>

						<li><a href="logout.php" style="text-decoration:none; color:black;">Logout</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	</div>
    
    <p><br/></p>
	<p><br/></p>
	<p><br/></p>

    <section id="vet-header">
    <h2>#Vetmpoa</h2>
    <p> <strong>The best for your pets!</strong></p>
   </section>

   <section id="appoint-details" class="section-p1">
    <form action="https://formspree.io/f/mqkolyrg" method="post">
        <span>BOOK AN APPOINTMENT</span>
        <input type="text" name="Name" placeholder="Full name" required>
        <input type="text" name="Phone" placeholder="Your phone no" required>
        <input type="text" name="Email" placeholder="Your Email" required>
        <input type="text" name="Pet" placeholder="Type of pet" required>
        <input type="text" name="Time" placeholder="Time for appointment" required>
        <button class="normal">Book</button>
    </form>
   </section>
    </body>
    <style>
        p{
    font-size: 16px;
    color: #465b52;
    margin: 15px 0 20px 0;
    }
    h2{
    font-size: 46px;
    line-height: 54px;
    color: #222;
    }
        .section-p1{
    padding: 40px 80px;
    }
    button.normal{
    font-size: 14px;
    font-weight: 600;
    padding: 10px 20px;
    color: black;
    background-color: wheat;
    border-radius: 4px;
    cursor: pointer;
    border: none;
    outline: none;
    transition: 0,2s;
    }
    #vet-header{
    background-image: url('product_images/ban.jpg');
    width: 100%;
    height:50vh;
    background-size: cover;
    display: flex;
    justify-content: center;
    text-align: center;
    flex-direction: column;
    padding: 14px;
    }
    #appoint-details{
    display: flex;
    justify-content: space-between;
    margin: 30px;
    padding: 80px;
    border: 1px solid #e1e1e1;

    }
    #appoint-details form{
    width: 70%;
    margin-left: 12%;
    display: flex;
    padding: 0 70px ;
    flex-direction: column;
    align-items: center;
    }
    #appoint-details form input{
    width: 100%;
    padding: 12px 15px;
    outline: none;
    margin-bottom: 20px;
    border: 1px solid #e1e1e1;
    }

    #appoint-details form button{
    background-color: #088178;
    color: #fff;
    }
    #appoint-details form span{
    font-size: 26px;
    }
    </style>
    <div class="panel-footer" style="align-items:center; display:flex; justify-content: center; ">&copy; <?php echo date("Y"); ?>Computer Technology project</p></div>
    </html>