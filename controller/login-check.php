<?php

if(!isset($_SESSION['user']))
{



 $_SESSION['no-login-message'] = "<div class= 'error text-center'>Please login to access Admin panel.</div>";
       header ('location:'.SITEURL.'controller/login.php');



}
?>


