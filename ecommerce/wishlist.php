<?php include 'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if ($login == false) {
	header("Location:login.php");
}
?>
<?php
if (isset($_GET['delwishlistid'])) {
	$productid = $_GET['delwishlistid'] ; 
	$delwishlist = $pd->delwishlistdata($cmrId, $productid);
}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 100%; text-align: center; color: red;">Wishlist</h2>

			    	
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Price</th>
								
								
								<th>Action</th>
							</tr>

							<?php 

								$getpd = $pd->checkwishlistdata($cmrId);
								if ($getpd) {
									$i=0;
									
									while ($result = $getpd->fetch_assoc()) {
										$i++;
									
							?>

							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								
						<td> ||
						<a href="details.php?productid=<?php echo $result['productId'];?>">Buy Now</a>  ||  <a href="?delwishlistid=<?php echo $result['productId'];?>">Remove</a> ||

						</td>	
								
							</tr>
							
						<?php }
								}
								?>
							
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft" style="width: 100%; text-align: center;">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>