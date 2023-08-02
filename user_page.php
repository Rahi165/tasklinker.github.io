<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linker Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admindash.css">

    <style>
     table{
    border-collapse: collapse;
    width: 100%;  
}
tr{
    border-top: 1px solid #f0f0f0;
    border-bottom: 2px solid #f0f0f0;
    text-align: center;
}
th{
    width: 33.33%;
    text-align: center;
    
}
 td{
    font-size: .9rem;
    color:  grey;
    text-align: center;
}
tr td:last-child{
    display: inline-block;
    align-items: center ;
    
}
.sidebar{
   background: #4F709C;
}
.card-header button{
   background: #4F709C;
   border: 1px solid #4F709C;
}
</style>

</head>
<body>
    <!--DASHBOARD-->
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
                    <a href=""><span class="las la-clipboard-list"></span>
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
                <li>
                    <a href="logout.php"><span class="las la-user-circle" ></span>
                    <span>Logout</span></a>
                </li>
                
            </ul>
        </div>
    </div>

<!--====================NAV========================-->


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
                        <?php echo $_SESSION['user_name'] ?>
                    </h4>
                    <small>User Name</small>
                </div>
            </div>
        </header>




<!--MAIN SCREEN-->

            <!-------------------ADD PROJECT-------------------------->
            <main>
               <!--
            <div class="cards" >
                <div class="card-single">
                
                    <div >
                    <a href="form.php">
                       <span >Add Project</span></a>
                    </div>
                    <div>
                       <div class="span las la-clipboard"></div>
                    </div>
                </div>
            </div>
-->
 <!---------------LIST OF PROJECT------------------>
            <div class="recent-grid">
                <div class="projects">
                     <div class="card">
                        <div class="card-header">
                           <h3>List Of Project</h3>

                           <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                

<!--============PHP CODE FOR LIST OF PROJECT DISPLAY DB========================-->


        <?php 
           include('proconfig.php');
           $sqlget = "SELECT * FROM PROJECT";
           $sqldata = mysqli_query($proconn,$sqlget) or die("error");

           echo "<table>";
           echo "<tr><th>ID</th><th>Username</th><th>Project Name</th></tr>";

           while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            $id= $row['id'];
            echo "<tr>";
            echo "<td><a href='usermodule.php?id=" . urlencode($row['id']) . "'>" . $row['id'] . "</a></td>";
            echo "<td><a href='usermodule.php?id=" . urlencode($row['id']) . "'>" . $row['username'] . "</a></td>";
            echo "<td><a href='usermodule.php?id=" . urlencode($row['id']) . "'>" . $row['project_name'] . "</a></td>";
            echo "</tr>";
           }
           echo "</table>";
         ?>
<!------------------END-------------------->
        
                     </div>
                        </div>

                     </div>
                </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>