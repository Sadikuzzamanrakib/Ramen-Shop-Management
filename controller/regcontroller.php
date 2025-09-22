 

<?php
include('../model/regmodel.php');
?>

<?php

try{
$username = $_POST['username'] ; 
$email = $_POST['email'] ; 
$pass = $_POST['pass'] ; 
$passHash;

   validateFields() ;
   $id =  registerStudent($username , $email , $passHash);
   echo json_encode(['ok' => true, 'id' => $id]);
}
catch(mysqli_sql_exception $e){

     if ($e->getCode() === 1062) { // code 1062 represents a duplicate entry of the unique column
    $dup = [];
    $msg = $e->getMessage(); // error shown by the mysql (exactly which field)
    if (stripos($msg, 'uq_student_username') !== false || stripos($msg, 'username') !== false) {
      $dup['username'] = 'This username is already taken.';
    }
    if (stripos($msg, 'uq_student_email') !== false || stripos($msg, 'email') !== false) {
      $dup['email'] = 'This email is already registered.';
    }
    http_response_code(409);
    echo json_encode(['ok' => false, 'errors' => $dup ?: ['form' => 'Account already exists']]);
  } else {
    echo json_encode(['ok' => false, 'errors' => ['form' => 'Server error. Try again.']] );
  }
}




function validateFields(){
    global $username , $email , $pass , $passHash ;

$username = trim($username); // trimming whitespaces 
$email    = trim(mb_strtolower($email, 'UTF-8')); // trim whitespace + all lower
$pass     = $pass; // keep the pass as it is 

// 3) Validate
$errors = [];

// username: 3–50, letters/digits/underscore
if ($username === '' || mb_strlen($username) < 3 || mb_strlen($username) > 50 || !preg_match('/^[A-Za-z0-9_]+$/', $username)) {
  $errors['username'] = '3–50 chars (A–Z, a–z, 0–9, underscore).';
}

// email
if ($email === '' || mb_strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors['email'] = 'Invalid email.';
}

// password
if ($pass === '' || mb_strlen($pass) < 8) {
  $errors['pass'] = 'Password must be at least 8 characters.';
}

// If validation failed → 422 with field errors
if ($errors) {
  http_response_code(422);
  echo json_encode(['ok' => false, 'errors' => $errors]);
  exit;
}

// 4) Hash password (never store plain text)
$passHash = password_hash($pass, PASSWORD_DEFAULT);

}

?> 