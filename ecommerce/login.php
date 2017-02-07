<?php include 'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if ($login == true) {
	header("Location:order.php");
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $customerlogin = $cmr->customerlogin($_POST);
}

?>
<style type="text/css">
	.login_panel input[type="email"]{
		width: 200px;
		padding: 5px;
		font-size: 15px;
	}
	.login_panel input[type="password"]{
		width: 200px;
		padding: 5px;
		font-size: 15px;
	}
	.register_account input[type="text"]{
		width: 200px;
		padding: 5px;
		font-size: 15px;
	}
	.register_account input[type="email"]{
		width: 200px;
		padding: 5px;
		font-size: 15px;
	}
	.register_account input[type="password"]{
		width: 200px;
		padding: 5px;
		font-size: 15px;
	}
</style>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 <?php
    		if (isset($customerlogin)) {
    			echo $customerlogin;
    		}
    	?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="email" placeholder="Email" type="email"/>
                    <input name="pass" placeholder="Password" type="password"/>
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                    </div>
                 </form>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerreg = $cmr->customerregistration($_POST);
}

?>


    	<div class="register_account">

    	<?php
    		if (isset($customerreg)) {
    			echo $customerreg;
    		}
    	?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name"/>
							</div>
							
							<div>
							   <input type="text" name="address" placeholder="Address"/>
							</div>
							
							<div>
								<input type="text" name="city" placeholder="City"/>
							</div>
							<div>
								<input type="text" name="country" placeholder="Country"/>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="zip" placeholder="Zip Code"/>
						</div>
		    	<div>
							<input type="text" name="phone" placeholder="Phone"/>
						</div>	        
	
		           <div>
		          <input type="email" name="email" placeholder="Email"/>
		          </div>
				  
				  <div>
					<input type="password" name="pass" placeholder="Password"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>