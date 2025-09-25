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

    //Hve to  Update in Order table as well
    $sqlOrder = "UPDATE `tbl_order` SET customer_name = ? WHERE customer_name = ?";
    $stmtOrder = $conn->prepare($sqlOrder);
    $stmtOrder->bind_param("ss", $name, $_SESSION['user']['username']);
    $stmtOrder->execute();
}

function updateUserEmail( $email) {
    global $conn;
    $sql = "UPDATE Student SET email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $_SESSION['user']['id']);
    $stmt->execute();

       //Have to  Update in Order table as well
    $sqlOrder = "UPDATE `tbl_order` SET customer_email = ? WHERE customer_email = ?";
    $stmtOrder = $conn->prepare($sqlOrder);
    $stmtOrder->bind_param("ss", $email, $_SESSION['user']['email']);
    $stmtOrder->execute();
}

function updateUserPhoto( $id, $photoPath) {
    global $conn;
    $sql = "UPDATE Student SET photo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $photoPath, $id);
     $stmt->execute();
}
?> 

