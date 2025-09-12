<?php
include('constants.php');
?>


<?php

 function loginStudent($email , $pass){
    global $conn; 
    //echo "checking values";
    $sql = "Select * from Student where email='$email'";
   
   $res=  mysqli_query($conn , $sql) ;
   //echo "check successfull " ;
   try{
      $user = mysqli_fetch_assoc($res) ;
      return $user; 
   }
   catch(mysqli_sql_exception $e){

   }

 }


?> 