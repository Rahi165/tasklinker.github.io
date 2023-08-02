<?php   
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
@include('config.php');
if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

//-----------------CONNECTION WITH ADD PROJECT-----------------------

$mname=filter_input(INPUT_POST, 'module_name');
$date=filter_input(INPUT_POST, 'date');
$assign=filter_input(INPUT_POST, 'assign');
if(!empty($mname)){
    if(!empty($assign)){
       
        if(mysqli_connect_error()){
            die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());
          }
        else{
            $sql= "INSERT INTO module (module_name, date, assign) values ('$mname','$date', '$assign')";

    if($conn->query($sql)){
        echo "new record inserted.";
    }
    $conn->close();
  }
          }     
        }   
        if (isset($_POST['submit'])) {
            header('location:module.php');
          }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Form</title>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admindash.css">

    <style>
        .sidebar{
            background: lightcoral;
        }
    </style>
</head>
<body>
    <input type="checkbox"  id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>TaskLinker</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="module.php"><span class="las la-clipboard-list"></span>
                    <span>Module</span></a>
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
                <span class="las la-search"></span>
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
            <form method="POST" >

                <label for="module">Module name:</label>
                <input type="text" name="module_name" required><br><br>

                <label for="date">Created Date:</label>
                <input type="date" name="date" required><br><br>
                
                <label for="assign">Assigned to:</label>
                <input type="text" name="assign" required><br><br>

                <button type="submit" value="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
