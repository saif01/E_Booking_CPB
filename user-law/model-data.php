<?php 
require('../db/config.php');


 if(isset($_POST["notice_id"]))  
 {  
      $output = '';  
        
      $query = "SELECT * FROM `legal_notice` WHERE `notice_id` = '".$_POST["notice_id"]."'";  
      $result = mysqli_query($con, $query);  
      $output .= '  
      <div class="table-responsive ">  
           <table class="table table-striped">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="10%"><label>Notice</label></td>  
                     <td width="90%"><b>'.$row["subject"].'</b></td>  
                </tr>  
                <tr>  
                     <td width="10%"><label>Details</label></td>  
                     <td width="90%">'.$row["details"].'</td>  
                </tr>

                <tr>  
                       
                     <img src="../pimages/notice/'.$row['photo'].'" alt=" " height: "50%" width="100%" />

                </tr>    
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>