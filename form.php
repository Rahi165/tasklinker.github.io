<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

@include('config.php');
session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

//-----------------CONNECTION WITH ADD PROJECT----------------------- 


$uname=filter_input(INPUT_POST, 'username');
$project=filter_input(INPUT_POST, 'project_name');
if( !empty($uname)){
if(!empty($project)){
  //connection
  if(mysqli_connect_error()){
    die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());
  }
  else{
    $sql= "INSERT INTO project (username, project_name) values ('$uname', '$project')";

    if($conn->query($sql)){
        echo "new record inserted.";
    }
    $conn->close();
  }
}
}
if (isset($_POST['submit'])) {
    header('location:admin_page.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admindash.css">
 <style>
    .sidebar{
    background: #C38154;
}
 </style>
    
    </head>
    <body>
        <input type="checkbox"  id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class="lab la-accusoft"></span><span>Accusoft</span></h2>
            </div>
    
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="admin_page.php"><span class="las la-clipboard-list"></span>
                        <span>Projects</span></a>
                    </li>
                    <li>
                        <a href=""><span class="las la-receipt"></span>
                        <span>Inventory</span></a>
                    </li>
                    <li>
                        <a href=""><span class="las la-clipboard-list"></span>
                        <span>Tasks</span></a>
                    </li>
                    
                    
                </ul>
            </div>
        </div>


        <div class="main-content">
            <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    Dashboard
                </h2>
                    <div class="search-wrapper">
                        <span class="las la-search">
                        </span>
                        <input type="search" placeholder="Search here">
                    </div>
    
                <div class="user-wrapper">
                    <img src="images.jpeg" width="30px" height="30px" alt="">
                    <div>
                        <h4>
                        <?php echo $_SESSION['admin_name'] ?>
                        </h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

    
        <div class="form-container">
            <form  method="post" >

                <label for="username">Userame:</label>
                <input type="text" id="username" name="username" required>
    
                <label for="project">Project Name:</label>
                <input type="text" id="project" name="project_name" required>
    
                <button type="submit" value="sumbit" name="submit">Submit</button>
            </form>

        </div>

       
    </body>
</html>
