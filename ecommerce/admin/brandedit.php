<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>

<?php
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
   echo "<script>window.ltbrandion = 'brandlist.php';</script>";
}
else{
    $id = preg_replace('/[^a-zA-Z0-9\']/', '', $_GET['brandid']);
}
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $updatebrand = $brand->brandupdate($brandName, $id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
               <div class="block copyblock">
               <?php
                    if (isset($updatebrand)) {
                      echo $updatebrand;
                    }
               ?> 
               <?php
                $getbrand = $brand->getbrandbyid($id);
                if ($getbrand) {
                   while ($result = $getbrand->fetch_assoc()) {
                      
               ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>