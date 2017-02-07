<?php include 'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if ($login == false) {
	header("Location:login.php");
}
?>
<style type="text/css">
	.psucess{
		width: 500px;
		min-height: 200px;
		text-align: center;
		border: 1px solid: #ddd;
		margin: 0 auto;
		padding: 20px;
	}
	.psucess h2{
		border-bottom: 1px solid: #ddd;
		margin-bottom: 20px;
		padding-bottom: 10px;
		font-size: 40px;
		color: green;
		background: green none repeat scroll 0 0;
		border-radius: 13px;
		color: #fff;
	}
	.psucess h3{
		border-bottom: 1px solid: #ddd;
		margin-bottom: 20px;
		padding-bottom: 10px;
		font-size: 30px;

	}
.psucess h4{
		border-bottom: 1px solid: #ddd;
		margin-bottom: 20px;
		padding-bottom: 10px;
		font-size: 20px;
		text-align: left;
	}
	.psucess p{
		font-size: 15px;
		line-height: 25px;

	}

</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="psucess">
    		<h3>Thanks for purchase.</h3>
    		<?php
    			$cmrId = Session::get("cmrId");
    			$amount= $ct->payableamount($cmrId);
$sum = 0;
$price = 0;
$total=0;

    			if ($amount) {
    				
    				while ($result =  $amount->fetch_assoc()) {
    					$price= $result['price'];
    					$sum = $sum + $price;
    				}
    			}
    		?>
    		 <h4>Receive your order successful. We will contact with you as soon as possible delivery details.Here is your order details.... <a href="order.php">Visit here...</a></h4><br/>
    			<p>Total Payable amount:(Including VAT): Tk.
    			<?php 
    			$vat = $sum * .15;
    			$total = $sum + $vat; 
    			if (isset($total)) {
    			echo $total; 
    			}
    			
    			?>
    				
    			</p>

    			<h2>Payment Successful!!!</h2>
    		</div>
    		
 		</div>
 	</div>
</div>
  <?php include 'inc/footer.php';?>