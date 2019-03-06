  <?php  
 //fetch.php  
include('../db/config.php');

 if(isset($_POST["id"]))  
 {  
      $query = "SELECT inv_products.*, cms_hard_category.category, cms_hard_subcategory.subcategory FROM `inv_products` INNER JOIN cms_hard_category ON inv_products.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON inv_products.sub_id = cms_hard_subcategory.sub_id WHERE inv_products.id = '".$_POST["id"]."'";

      $result = mysqli_query($con, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>