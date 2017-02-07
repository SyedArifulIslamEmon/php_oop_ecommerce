<?php include 'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if ($login == false) {
	header("Location:login.php");
}
?>
<style type="text/css">
	.payment{
		width: 500px;
		min-height: 200px;
		text-align: center;
		border: 1px solid: #ddd;
		margin: 0 auto;
		padding: 50px;
	}
	.payment h2{
		border-bottom: 1px solid: #ddd;
		margin-bottom: 40px;
		padding-bottom: 50px;
	}
	.payment a{
		background: #ff0000 none repeat scroll 0 0;
		border-radius: 13px;
		color: #fff;
		font-size: 25px;
		padding: 15px 30px;

	}
	.back{
		margin-bottom: 60px;
	}
	.back a{
		width: 160px;
		margin: 15px auto 0;
		padding: 7px 0;
		text-align: center;
		display: block;
		background: #555;
		border: 1px solid #333;
		color: #fff;
		border-radius: 6px;
		font-size: 25px;
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="payment">
    		<h2>Choose a payment option</h2>
    			<a href="offline.php">Offline Payment</a>
    			
    		</div>
    		<div class="back">
    			<a href="cart.php">Previous</a>
    		</div>
 		</div>
 	</div>
</div>
  <?php include 'inc/footer.php';?>