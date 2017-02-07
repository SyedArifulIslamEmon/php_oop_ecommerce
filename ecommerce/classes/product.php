<?php	
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
class product{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function productinsert($data, $file){
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId 		 = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId 	 = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body 		 = mysqli_real_escape_string($this->db->link,$data['body']);
		$price 		 = mysqli_real_escape_string($this->db->link,$data['price']);
		$type 		 = mysqli_real_escape_string($this->db->link,$data['type']);

	$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" ||  $file_name == "" || $type == "") {
    	$msg = "<span class='error'>Fields must not be empty!.</span>";
		return $msg;
    }
    elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }

    else{
    	move_uploaded_file($file_temp, $uploaded_image);
    	$query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type) 
    			  VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";
    $productinsert = $this->db->insert($query);
			if ($productinsert) {
				$msg = "<span class='success'>Product inserted successfully.</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Product didn't insert.</span>";
				return $msg;
			}

    }


	}
	public function getallproduct(){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
				FROM  tbl_product
				INNER JOIN tbl_category
				ON tbl_product.catId = tbl_category.catId
				INNER JOIN tbl_brand
				ON tbl_product.brandId = tbl_brand.brandId
				ORDER BY tbl_product.productId ASC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproductbyid($id){
		$query =  "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function productupdate($data,$file, $id){
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId 		 = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId 	 = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body 		 = mysqli_real_escape_string($this->db->link,$data['body']);
		$price 		 = mysqli_real_escape_string($this->db->link,$data['price']);
		$type 		 = mysqli_real_escape_string($this->db->link,$data['type']);

	$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == ""  || $type == "") {
    	$msg = "<span class='error'>Fields must not be empty!.</span>";
		return $msg;
    }
    else{
    	if (!empty($file_name)) {
    	
		    	if ($file_size >1048567) {
		     echo "<span class='error'>Image Size should be less then 1MB!
		     </span>";
		    } elseif (in_array($file_ext, $permited) === false) {
		     echo "<span class='error'>You can upload only:-"
		     .implode(', ', $permited)."</span>";
		    }

		    else{
		    	move_uploaded_file($file_temp, $uploaded_image);
		    	

		    	$query= "UPDATE tbl_product
		    	SET 
		    	productName   ='$productName',
		    	catId         ='$catId',
		    	brandId       ='$brandId',
		    	body          ='$body',
		    	price         ='$price',
		    	image='$uploaded_image',
		    	type          ='$type'
		    	WHERE productId='$id'";

		    $productupdate = $this->db->update($query);
					if ($productupdate) {
						$msg = "<span class='success'>Product updated successfully.</span>";
						return $msg;
					}
				
					else{
						$msg = "<span class='error'>Product didn't update.</span>";
						return $msg;
						}

		    		}
		    		}
		    		else{


		    	$query= "UPDATE tbl_product
		    	SET 
		    	productName   ='$productName',
		    	catId         ='$catId',
		    	brandId       ='$brandId',
		    	body          ='$body',
		    	price         ='$price',
		 
		    	type          ='$type'
		    	WHERE productId='$id'";

		    $productupdate = $this->db->update($query);
					if ($productupdate) {
						$msg = "<span class='success'>Product updated successfully.</span>";
						return $msg;
					}
				}
			}
		}
		public function delproductbyid($id){
			$query = "SELECT * FROM tbl_product WHERE productId='$id'";
			$getdata =$this->db->select($query);
			if ($getdata) {
				while ($delimg = $getdata->fetch_assoc()) {
					$dellink = $delimg['image'];
					unlink($dellink);
				}
			}

			$delquery = "DELETE FROM tbl_product WHERE productId='$id'";

			$deldata = $this->db->delete($delquery);
			if ($deldata) {
			$msg = "<span class='success'>Product deleted successfully.</span>";
				return $msg;
		}
		else{
			$msg = "<span class='error'>Product didn't delete.</span>";
				return $msg;
		}
	}

	public function getfeaturedproduct(){
		$query =  "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId ASC LIMIT 4";
		$result = $this->db->select($query);
		return $result;

	}
	public function getnewproduct(){
		$query =  "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;

	}
	public function getsingleproduct($id){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
				FROM  tbl_product
				INNER JOIN tbl_category
				ON tbl_product.catId = tbl_category.catId
				INNER JOIN tbl_brand
				ON tbl_product.brandId = tbl_brand.brandId AND tbl_product.productId = '$id'"
			;
		$result = $this->db->select($query);
		return $result;
	}
	public function latestfromiphone(){
		$query =  "SELECT * FROM tbl_product WHERE brandId = '1' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function latestfromsamsung(){
		$query =  "SELECT * FROM tbl_product WHERE brandId = '2' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function latestfromacer(){
		$query =  "SELECT * FROM tbl_product WHERE brandId = '3' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function latestfromcanon(){
		$query =  "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function productbycat($id){
		$catId 		 = mysqli_real_escape_string($this->db->link, $id);

		$query =  "SELECT * FROM tbl_product WHERE catId = '$catId'";
		$result = $this->db->select($query);
		return $result;
	}
	public function insertcomparedata($cmprid, $cmrId){
		$cmrId 		 = mysqli_real_escape_string($this->db->link, $cmrId);
		$productId 		 = mysqli_real_escape_string($this->db->link, $cmprid);

		$cquery =  "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' AND productId = '$productId' ";

		$check = $this->db->select($cquery);
		if ($check) {
		
			$msg = "<span class='error'>Already added.</span>";
				return $msg;
			
		}

		$query =  "SELECT * FROM tbl_product WHERE productId = '$productId'";
		$result = $this->db->select($query)->fetch_assoc();
		if ($result) {			
				$productId = $result['productId'];
				$productName = $result['productName'];
	
				$price = $result['price'] ;
				$image = $result['image'];


		$query = "INSERT INTO tbl_compare(cmrId,productId,productName,price,image) 
    			  VALUES('$cmrId','$productId','$productName','$price','$image')";
    	$productinsert = $this->db->insert($query);
    	if ($productinsert) {
    		$msg = "<span class='success'>Added successfully!!! | Please check to compare page.</span>";
				return $msg;
		}
		else{
			$msg = "<span class='error'>Not added.</span>";
				return $msg;
			}
    	}
			
	}	
	public function getcomparedata($cmrId){
		$query =  "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function delcomparedata($cmrId){
		$query = "DELETE FROM tbl_compare WHERE cmrId='$cmrId'";
		$deldata = $this->db->delete($query);
	}
	public function savewishlistdata($id, $cmrId){

		$cquery =  "SELECT * FROM tbl_wishlist WHERE cmrId = '$cmrId' AND productId = '$id' ";

		$check = $this->db->select($cquery);
		if ($check) {
		
			$msg = "<span class='error'>Already added.</span>";
				return $msg;
			
		}

		$pquery =  "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($pquery)->fetch_assoc();
		if ($result) {
			
				$productId = $result['productId'];
				$productName = $result['productName'];
		
				$price = $result['price'];
				$image = $result['image'];


		$query = "INSERT INTO tbl_wishlist(cmrId,productId,productName,price,image) 
    			  VALUES('$cmrId','$productId','$productName','$price','$image')";
    	$productinsert = $this->db->insert($query);
    	if ($productinsert) {
    		$msg = "<span class='success'>Added successfully!!! | Please check to wishlist page.</span>";
				return $msg;
		}
		else{
			$msg = "<span class='error'>Not added.</span>";
				return $msg;
			}
			
			
		}
	}
	public function checkwishlistdata($cmrId){
		$query =  "SELECT * FROM tbl_wishlist WHERE cmrId = '$cmrId' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function delwishlistdata($cmrId, $productid){
		$query = "DELETE FROM tbl_wishlist WHERE cmrId='$cmrId' AND productid = '$productid' ";
		$deldata = $this->db->delete($query);
	}
}


?>