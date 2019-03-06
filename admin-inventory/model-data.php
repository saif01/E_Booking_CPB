<?php 
require('../db/config.php');


 if(isset($_POST["id"]))  
 {  
      $output = '';  
        
      $query = "SELECT inv_products.*, cms_hard_category.category, cms_hard_subcategory.subcategory FROM `inv_products` INNER JOIN cms_hard_category ON inv_products.cat_id=cms_hard_category.cat_id INNER JOIN cms_hard_subcategory ON inv_products.sub_id = cms_hard_subcategory.sub_id WHERE inv_products.id = '".$_POST["id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive ">  
           <table class="table table-striped">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="10%"><label>Category</label></td>  
                     <td width="90%"><b>'.$row["category"].'</b></td>  
                </tr>  
                <tr>  
                     <td width="10%"><label>Subcategory</label></td>  
                     <td width="90%">'.$row["subcategory"].'</td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Brand</label></td>  
                     <td width="90%">'.$row["brand"].'</td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Serial</label></td>  
                     <td width="90%">'.$row["serial"].'</td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Warranty</label></td>  
                     <td width="90%">'.$row["warranty"].'</td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Details</label></td>  
                     <td width="90%">'.$row["remarks"].'</td>  
                </tr>

                
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>