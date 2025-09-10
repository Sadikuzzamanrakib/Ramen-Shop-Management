<?php
    include("../config.php");
?>

<?php

function registerStudent(string $username, string $email, string $passHash){
  // first write query -> prepare the query statement to run -> bind the parameters -> execute the query
   // -> get the inserted id -> return it back to the controller so that it understands query was successful
   global $conn; 
   //echo"global conn correct";
   $sql = "INSERT INTO Student (username , email , `password`) VALUES ( ? , ? , ?) ";
   //echo "excuted the insert into" ;
   $stmt= $conn->prepare($sql);
      //echo "prepared the sql statement" ;
   $stmt->bind_param ("sss" , $username , $email , $passHash); 
   // echo "param binded successfully";
   $stmt->execute() ;
   // echo "executed the query"; 
   $id = $conn->insert_id;
   $stmt->close() ;
   //echo "query executed in the model" ;
    return $id ;
}

?> 