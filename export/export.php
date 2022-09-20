<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "cms-8341", "test");  


      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv'); 
      
      
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'sequence1', 'word1', 'number1'));  
      $query = "SELECT * from test ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  

      while($row = mysqli_fetch_assoc($result)) {
            fputcsv($output, $row);  
      }
       
      fclose($output);  
 }  
 ?> 