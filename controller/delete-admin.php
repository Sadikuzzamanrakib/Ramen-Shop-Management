<?php include ('../model/constants.php');


 $id = $_GET['id'];
   
 $sql = "DELETE FROM tbl_admin WHERE id =$id";

 $res = mysqli_query($conn, $sql);

if($res ==true)
{
   $_SESSION['delete']= "<div class='success'>Admin Deleted Sucessfully.</div>";
   header ('location:'.SITEURL.'controller/manage-admin.php');
}
else
    {
          $_SESSION['delete']= "<div class='error'>Failed to Delete Admin. Try Again .</div>";
   header ('location:'.SITEURL.'controller/manage-admin.php');
     }

?>