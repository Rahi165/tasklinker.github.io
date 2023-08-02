<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('modconfig.php');
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM module WHERE id=$id";
    $result=mysqli_query($mod,$sql);
    if($result){
        //echo "deleted successfully";
        header('location:module.php');
    }
    else{
        die(mysqli_error($mod));
    }
}

?>
