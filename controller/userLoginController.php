<?php
include('../model/userLoginModel.php');
echo "Model inclusion successful";
session_start() ;
?>

<?php
    
    echo "request for login";
     $errors=[] ; 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? 'no keys' ; 
    $pass = $_POST['pass'] ?? 'no keys' ; 
    echo $email ; 
    echo $pass ;
    $userData= loginStudent($email , $pass) ;
    var_dump($userData) ; 
   
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
        $errors['pass'] = "Wrong Password";
         echo json_encode(['ok'=> true , 'errors'=> $errors]);
       }
    }
    else{
         $errors['email'] = "Invalid Email!!";
         echo json_encode(['ok'=> true , 'errors'=> $errors]);
    }
    }

    else{
        echo "not a post method" ;
    }
   


?>