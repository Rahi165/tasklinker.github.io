<?php   
session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
}

//-----------------CONNECTION WITH ADD PROJECT-----------------------
@include('scconfig.php');

$id=$_GET['editid'];
$sql="SELECT * from screen_form WHERE id=$id";
$result=mysqli_query($sc,$sql);
$row=mysqli_fetch_assoc($result);



$sname=filter_input(INPUT_POST, 'screen_name');
$status=filter_input(INPUT_POST, 'status');


       
        if(mysqli_connect_error()){
            die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());
          }
        else{
            $sql= "UPDATE screen_form SET id=$id, screen_name='$sname', status='$status'
            where id=$id";
            $result=mysqli_query($sc,$sql);
            if($result){
                echo "updated";
            }
            else{
                die(mysqli_error($sc));
            }

        }
        if (isset($_POST['submit'])) {
            header('location:userscreen.php');
          }
   
          
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screen Form</title>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admindash.css">

    <style>
        .sidebar{
          background: lightseagreen;
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
                    <a href="userscreen.php"><span class="las la-clipboard-list"></span>
                    <span>Screen</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-receipt"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Tasks</span></a>
                </li>
                <li>
                    <a href="logout.php"><span class="las la-user-circle"></span>
                    <span>Logout</span></a>
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
                        <?php echo $_SESSION['user_name'] ?>
                    </h4>
                    <small>User Name</small>
                </div>
            </div>
        </header>

        <div class="form-container">
            <form method="POST" >

                

                <label for="screen">Screen name:</label>
                <input type="text" name="screen_name" value="<?php  echo $sname  ?>"  required><br><br>

                <label for="screen">Status:</label>
                <select name="status"  >
                    <option value="">Select one</option>
                    <option value="Pending">Pending</option>
                    <option value="Done">Done</option>
                    <option value="Updated">Updated</option>
                    <option value="To be change">To be change</option>
                    <option value="Cancled">Cancled</option>
                </select> <br><br><br>


                <button type="submit" value="submit" name="submit">Edit</button>
            </form>
        </div>
    </div>
</body>
</html>
