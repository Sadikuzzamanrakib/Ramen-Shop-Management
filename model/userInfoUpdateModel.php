<?php
include('constants.php');
session_start() ;
?>

<?php


 function updateUserName( $name) {
    global $conn;
    $sql = "UPDATE Student SET username = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $_SESSION['user']['id']);
    $stmt->execute();
}

function updateUserEmail( $email) {
    global $conn;
    $sql = "UPDATE Student SET email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $_SESSION['user']['id']);
    $stmt->execute();
}

function updateUserPhoto( $id, $photoPath) {
    global $conn;
    $sql = "UPDATE Student SET photo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $photoPath, $id);
     $stmt->execute();
}
?> 

