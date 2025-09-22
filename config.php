<?php

// Databse Connection is being made here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbnamehere";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // throw exceptions
$conn = new mysqli($servername , $username , $password , $dbname);
$conn->set_charset('utf8mb4'); // avoid encoding issues
//echo "database connection successful" ; 

?>