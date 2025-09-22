<?php
session_start();
include("../model/userInfoUpdateModel.php");

$errors = [];

// --- Username update ---
if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    if ($username === '' || mb_strlen($username) < 3 || mb_strlen($username) > 50 || !preg_match('/^[A-Za-z\s]+$/u', $username)) {
        $errors['username'] = 'Name must be 3–50 letters only (A–Z, a–z, spaces).';
    } else {
        try {
            updateUserName($username);
            $_SESSION['user']['username']=$username;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) { // duplicate entry
                $msg = $e->getMessage();
                if (stripos($msg, 'username') !== false) {
                    $errors['username'] = 'This username is already taken.';
                }
            } else {
                $errors['form'] = 'Server error. Try again.';
            }
        }
    }
}

// --- Email update ---
if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if ($email === '' || mb_strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    } else {
        try {
            updateUserEmail($email); 
             $_SESSION['user']['email']=$email;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) { // duplicate entry
                $msg = $e->getMessage();
                if (stripos($msg, 'email') !== false) {
                    $errors['email'] = 'This email is already registered.';
                }
            } else {
                $errors['form'] = 'Server error. Try again.';
            }
        }
    }
}

// --- Response ---
if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
} else {
    http_response_code(200);
    echo json_encode(['success' => true, 'errors' => []]);
}
?>