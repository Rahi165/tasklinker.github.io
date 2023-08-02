<?php
include('scconfig.php');
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM screen_form WHERE id=$id";
    $result=mysqli_query($sc,$sql);
    if($result){
        //echo "deleted successfully";
        header('location:screen.php');
    }
    else{
        die(mysqli_error($sc));
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>