<?php 
require('../db/config.php');


 if(isset($_POST["id"]))  
 {  
      $output = '';          
      $query = "SELECT * FROM `inv_product_give` WHERE `id` = '".$_POST["id"]."' ";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive ">  
           <table class="table table-striped">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
           		<tr>  
                     <td width="10%"><label>Name</label></td>  
                     <td width="90%"><b>'.$row["name"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>B.U. location</label></td>  
                     <td width="90%"><b>'.$row["b_u_location"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Department</label></td>  
                     <td width="90%"><b>'.$row["dept"].'</b></td>  
                </tr> 
                <tr>  
                     <td width="10%"><label>Contact</label></td>  
                     <td width="90%"><b>'.$row["contact"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Designation</label></td>  
                     <td width="90%"><b>'.$row["position"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Quentity</label></td>  
                     <td width="90%"><b>'.$row["quentity"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Category</label></td>  
                     <td width="90%"><b>'.$row["category"].'</b></td>  
                </tr>  
                <tr>  
                     <td width="10%"><label>Subcategory</label></td>  
                     <td width="90%"><b>'.$row["subcategory"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Brand</label></td>  
                     <td width="90%"><b>'.$row["brand"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Serial</label></td>  
                     <td width="90%"><b>'.$row["serial"].'</b></td>  
                </tr>
                <tr>  
                     <td width="10%"><label>Details</label></td>  
                     <td width="90%"><b>'.$row["remarks"].'</b></td>  
                </tr>

                <tr>  
                     <td width="10%"><label>Registration</label></td>  
                     <td width="90%"><b>'.$row["reg"].'</b></td>  
                </tr>

                
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>