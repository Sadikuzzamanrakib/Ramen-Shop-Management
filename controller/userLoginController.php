<?php
include('../model/userLoginModel.php');
//echo "Model inclusion successful";
session_start() ;
?>

<?php
    
    //echo "request for login";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        loginUser();
    }
    else{
       // echo "not a post method" ;
    }
   

    function loginUser(){
    $email = $_POST['email'] ?? 'no keys' ; 
    $pass = $_POST['pass'] ?? 'no keys' ; 
    //echo $email ; 
    //echo $pass ;
    $email=trim($email);
    $userData= loginStudent($email , $pass) ;
    //var_dump($userData) ; 

    if($userData){
       if(password_verify($pass, $userData['password'])){
          session_regenerate_id(true) ; 
          $_SESSION['user']=[
            'id' => (int)$userData['id'],
            'username'=> $userData['username'],
            'email'=> $userData['email']
          ];
          header('Location:../view/index.php');
       }
       else{
        $_SESSION['login'] = "Wrong Password!!";
       // header('Location:../view/registration.php');
       }
    }
    else{
         $_SESSION['login'] = "Invalid Email!!";
       //  header('Location:../view/registration.php');  
    }
    }

?>