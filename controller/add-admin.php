<?php include('partials/menu.php'); ?>


<div class ="main-content">
<div class = "wrapper">
    <h1>Add Admin</h1>
<br><br>

<?php
   if(isset($_SESSION['add']))
   {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
   }
?>





<form action ="" method="POST">
<table class ="tbl_30">
<tr>
    <td>Full Name:</td>
    <td>
        <input type="text" name="full_name" placeholder ="Enter your name">
    </td>
</tr>

<tr>
    <td>Username:</td>
    <td>
        <input type="text" name="username" placeholder ="Your username">
    </td>
</tr>

<tr>
    <td>Password:</td>
    <td>
        <input type="text" name="password" placeholder ="Your password">
    </td>
</tr>
<tr>
    <td colspan="2">
     <input type = "submit" name = "submit" value ="Add Admin" class = "btn-secondary">   
    </td>
</tr>

</table>
</form>
</div>
</div>

<?php include('partials/footer.php'); ?>

<?php
if(isset($_POST['submit']))
{
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "INSERT INTO tbl_admin SET

  
  full_name = '$full_name',
  username = '$username' ,
  password = '$password'


  ";
 



$res = mysqli_query($conn,$sql) or die (mysqli_error());

if($res ==TRUE)
{
    $_SESSION['add'] = "Admin Added Sucessfully";
    header("location:".SITEURL.'controller/manage-admin.php');
}
else
{
       $_SESSION['add'] = "Failed to Add Admin";
    header("location:".SITEURL.'controller/add-admin.php');
}


}

?>