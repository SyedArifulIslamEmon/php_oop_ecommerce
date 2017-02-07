<?php	
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class cart
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addtocart($quantity, $id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();

		$squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
		$result = $this->db->select($squery)->fetch_assoc();

		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];

		$chquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";

		$getproduct = $this->db->select($chquery);
		if ($getproduct) {
			$msg = "Product already added!!!";
			return $msg;
		}
		else{



		$query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) 
    			  VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
    $productinsert = $this->db->insert($query);
			if ($productinsert) {
				header("location:cart.php");
			}
			else{
			header("location:404.php");
			}
		}
	}
	public function getcartproduct(){
		$sId = session_id();

		$query =  "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updatecartquantity($cartId, $quantity){
		$cartId = mysqli_real_escape_string($this->db->link,$cartId);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		$query =  "UPDATE tbl_cart 
					SET 
					quantity = '$quantity' 
					WHERE cartId = '$cartId'";
					$updated_row = $this->db->update($query);
					if ($updated_row) {
					header("location:cart.php");
		}
			else{
				$msg = "<span class='error'>Quantity didn't update.</span>";
				return $msg;
			}
	}
	public function delproductbycart($delid){
			$delid = mysqli_real_escape_string($this->db->link,$delid);

			$query =  "DELETE FROM tbl_cart WHERE cartId = '$delid'";
			$deldata = $this->db->delete($query);
			if ($deldata) {
			echo "<script>window.location = 'cart.php';</script>";
				
			}
			else{
			$msg = "<span class='error'>Product didn't delete.</span>";
				return $msg;
		}
	}
	public function checkcarttable(){
		$sId = session_id();

		$query =  "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function delcustomercart(){
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$this->db->delete($query);
	}
	public function orderproduct($cmrId){
		$sId = session_id();

		$query =  "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getpro = $this->db->select($query);
		if ($getpro) {
			while ($result = $getpro->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];


		$query = "INSERT INTO tbl_order(cmrId,productId,productName,quantity,price,image) 
    			  VALUES('$cmrId','$productId','$productName','$quantity','$price','$image')";
    	$productinsert = $this->db->insert($query);
			
			}
		}
		
	}
	public function payableamount($cmrId){
		$query =  "SELECT price FROM tbl_order WHERE cmrId = '$cmrId' AND date = now()";
		$result = $this->db->select($query);
		return $result;
	}
	public function getorderedproduct($cmrId){
		$query =  "SELECT * FROM tbl_order WHERE cmrId = '$cmrId ' ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function checkorder($cmrId){
		
		$query =  "SELECT * FROM tbl_order WHERE cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getallorderproduct(){
		$query =  "SELECT * FROM tbl_order ORDER BY date DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function productshifted($id, $time, $price){
		$id = mysqli_real_escape_string($this->db->link,$id);
		$date = mysqli_real_escape_string($this->db->link,$time);
		$price = mysqli_real_escape_string($this->db->link,$price);

		$query =  "UPDATE tbl_order 
					SET 
					status = '1' 
					WHERE cmrId = '$id' AND date = '$date' AND price = '$price' ";
					$updated_row = $this->db->update($query);
					if ($updated_row) {
					$msg = "<span class='success'>Updated successfully.</span>";
					return $msg;
		}
			else{
				$msg = "<span class='error'>Update failed.</span>";
				return $msg;
			}
	}
	public function delproductshifted($id, $time, $price){
		$id = mysqli_real_escape_string($this->db->link,$id);
		$date = mysqli_real_escape_string($this->db->link,$time);
		$price = mysqli_real_escape_string($this->db->link,$price);

		$query =  "DELETE FROM tbl_order WHERE cmrId = '$id' AND date = '$date' AND price = '$price'";;
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>Deleted successfully.</span>";
				return $msg;
		}
		else{
			$msg = "<span class='error'>Delete Failed.</span>";
				return $msg;
		}
	}
	public function productshiftconfirmed($id, $time, $price){
		$id = mysqli_real_escape_string($this->db->link,$id);
		$date = mysqli_real_escape_string($this->db->link,$time);
		$price = mysqli_real_escape_string($this->db->link,$price);

		$query =  "UPDATE tbl_order 
					SET 
					status = '2' 
					WHERE cmrId = '$id' AND date = '$date' AND price = '$price' ";
					$updated_row = $this->db->update($query);
					if ($updated_row) {
					$msg = "<span class='success'>Updated successfully.</span>";
					return $msg;
		}
			else{
				$msg = "<span class='error'>Update failed.</span>";
				return $msg;
			}
	}
}
?>