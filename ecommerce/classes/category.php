<?php	
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class category
{
	
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function catinsert($catName){
		$catName = $this->fm->validation($catName);

		$catName = mysqli_real_escape_string($this->db->link,$catName);
		if (empty($catName)) {
			$msg = "<span class='error'>Category field must not be empty!</span>";
			return $msg;
		}
		else{
			$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
				$msg = "<span class='success'>Category inserted successfully.</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Category didn't insert.</span>";
				return $msg;
			}
		}
	}
	public function getallcat(){
		$query =  "SELECT * FROM tbl_category ORDER BY catId ASC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getcatbyid($id){
		$query =  "SELECT * FROM tbl_category WHERE catId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function catupdate($catName, $id){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		$id = mysqli_real_escape_string($this->db->link,$id);
		if (empty($catName)) {
			$msg = "<span class='error'>Category field must not be empty!</span>";
			return $msg;
		}
		else{
		$query =  "UPDATE tbl_category 
					SET 
					catName = '$catName' 
					WHERE catId = '$id'";
					$updated_row = $this->db->update($query);
					if ($updated_row) {
					$msg = "<span class='success'>Category updated successfully.</span>";
					return $msg;
		}
			else{
				$msg = "<span class='error'>Category didn't update.</span>";
				return $msg;
			}
		}
	}
	public function delcatbyid($id){
		$query =  "DELETE FROM tbl_category WHERE catId = '$id'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>Category deleted successfully.</span>";
				return $msg;
		}
		else{
			$msg = "<span class='error'>Category didn't delete.</span>";
				return $msg;
		}
	}
}
?>