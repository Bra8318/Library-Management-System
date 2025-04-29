<?php
    include "dbconnect.php";
    include "head.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    
    <link rel="stylesheet" href="student.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .login{
    height: 450px;
    width: 500px;
    background: #000;
    opacity: .7;
    margin :0px auto;
    padding: 10px;
}
label{
            font-size: 20px;
            font-weight: 600;
        }
</style>
   
</head>
<body>
    <!-- <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                 <img src="logo.jpg" alt="Library_logo" height="120" width="200">
                 <h1 style="color: white;">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
        
            
                <ul class="nav navbar-nav">
                     <li><a href="home.php">HOME</a></li>
                     <li><a href="books.php">BOOKS</a></li>
                     <li><a href="feedback.php">FEEDBACK</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                     <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                     <li><a href="student_registration.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                     <li><a href="student_registration.php"><span class="glyphicon glyphicon-user"> SIGN_UP</span></a></li>
                  
                </ul>
             
        </div>
    </nav>-->
    <section class="box"><br>
        
        <div class = "login">
            <h1 style="text-align: center; color: white;">Login Form</h1><br>
            <form action="" method="post">
                <div>
                    <h3 style="padding-left:50px ;color:white">Login As:</h3>
                    <input style="margin-left:50px; width: 18px;" type="radio" name="users" id="admin" value="admin">
                    <label for="admin">Admin</label>
                   
                    <input style="margin-left:50px; width: 18px;" type="radio" name="users"
                     id="student" value="student" checked>
                <label for="student" >Student</label>
                    
                </div><br>
                <div class="form">
                    <input class = "form-control" type="text" name="user" placeholder="Username" required><br>
                    <input class = "form-control" type="password" name="password" placeholder="Enter password" required><br>
                    <button class="btn btn-success" type="submit" name = "submit">Login</button>
                </div>
            </form><br><br> 
            <p style="color: white; padding-left: 30px;" >
               <a href="password.php">Forget Password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp
                New User <a href="student_registration.php">Sign Up?</a>
                
            </p>
        </div>
    </section>
	 <?php
    if(isset($_POST['submit'])){
        
        if($_POST['users']=='admin'){
            $count = 0;
            $result = mysqli_query($db,"SELECT * FROM `admin` WHERE user = '$_POST[user]' && password = '$_POST[password]';");
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows( $result );
    
            if($count == 0){
                ?>
                <script>
                    alert ("The Username And Password Doesn't Match.");
                </script>
                <!-- <div class = "alert alert-danger" style = "width:700px; margin-left:300px; background-color:grey">
                   <strong>The Username And Password Doesn't Match.</strong> 
                </div> -->
                <?php
            }
            else{
                
                $_SESSION['login_user'] = $_POST['user'];
                $_SESSION['pic'] = $row['pic'];
                ?>
                <script>
                    window.location = "admin/home.php";
                </script>
                <?php
            }
        
        }
        else{
        $count = 0;
        $result = mysqli_query($db,"SELECT * FROM `student` WHERE user = '$_POST[user]' && password = '$_POST[password]';");
	    $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows( $result );

        if($count == 0){
            ?>
            <script>
                alert ("The Username And Password Doesn't Match.");
            </script>
            <!-- <div class = "alert alert-danger" style = "width:700px; margin-left:300px; background-color:grey">
               <strong>The Username And Password Doesn't Match.</strong> 
            </div> -->
            <?php
        }
        else{
            $_SESSION['login_user'] = $_POST['user'];
            $_SESSION['pic'] = $row['pic'];
            ?>
            <script>
                window.location = "student/home.php";
            </script>
            <?php
        }
    }
}
    ?>
</body>
</html>