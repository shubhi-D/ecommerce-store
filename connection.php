
<?php
 
 $conn = "";
   
 try {
     $servername = "localhost:3306";
     $dbname = "smart";
     $username = "root";
     $password = "";
   
     $conn = new PDO(
         "mysql:host=$servername; dbname=smart",
         $username, $password
     );
      
    $conn->setAttribute(PDO::ATTR_ERRMODE,
                     PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
 }
  
 ?>