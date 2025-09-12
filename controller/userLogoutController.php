<?php
session_start() ; 
$_SESSION=[];
session_destroy(); 
header('Location: ../view/index.php');
exit;
?>