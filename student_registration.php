<?php

include "dbconnect.php";
include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="form.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .box{
            height: 300px;
            width: 600px;
            background-color: black;
            opacity: .8;
            margin: 0px auto;
            padding: 20px;
            color: white;
        }
        label{
            font-size: 20px;
            font-weight: 600;
        }
    </style>
    
</head>
<body style=" background-color: grey;"><br><br><br>
    <div class="box">
        <form action="" method="post"><br><br><br>
        <h3 style="padding-left:50px ;color:white">Sign_Up As:</h3>
            <input style="margin-left:50px; width: 18px;" type="radio" name="users" id="admin" value="admin">
            <label for="admin">Admin</label>
                   
            <input style="margin-left:50px; width: 18px;" type="radio" name="users"
            id="student" value="student" checked>
            <label for="student" >Student</label>
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp 
            <button class="btn btn-success" name="submit1" type="submit"
            style="width: 70px;">OK</button>
        </form>


    </div>
        <?php
        if(isset($_POST['submit1'])){
            if($_POST['users']=='admin'){
                ?>
                <script>
                    window.location = "admin/admin_registration.php";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    window.location = "student/student_registration.php";
                </script>
                <?php
            }
        }
        ?>

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
    </nav> -->
    <!-- <section class="box"><br> -->
        
        <!-- <div class="register"><br>

        <h1 style="text-align: center;color:white" >Student Registration Form</h1><br>
     
        <form action="" method="post">
            <div class ="login">
        <label for="roll">Roll No. <span style="color: red;">*</span></label>
        <input class = "form-control" type="text" id="roll" name="roll" required><br>
        <label for="name">Student Name <span style="color: red;">*</span></label>
        <input class = "form-control" type="text" id="name" name="name" required><br>
        <label for="user">User Name <span style="color: red;">*</span></label>
        <input  class = "form-control"type="text" id="user" name="user" required><br>
        <label for="password">Enter Password <span style="color: red;">*</span></label>
        <input  class = "form-control"type="password" id="password" name="password" required><br>
       
        <label for="dob">Date Of Birth <span style="color: red;">*</span></label>
        <input  class = "form-control"type="date" id="dob" name="dob" required><br>
        <label for="email">Email ID <span style="color: red;">*</span></label>
        <input  class = "form-control"type="email" id="email" name="email" required><br>
        
        <label for="mob">Mobile No <span style="color: red;">*</span></label>
        <input  class = "form-control"type="text" id="mob" name="mob"><br>
        <label for="address">Current Address <span style="color: red;">*</span></label>
        <input  class = "form-control"type="text" id="address" name="address" required><br>
        <label for="paddress">Permanent Address <span style="color: red;">*</span> </label>
        <input  class = "form-control"type="text" id="paddress" name="paddress"><br>
        <label for="course">Enter Course Name <span style="color: red;">*</span></label>
        <input  class = "form-control"type="text" name="course" id="course"><br>
        <label for="image">Profile Image</label>
        <input type="file" name="image" id="image"><br>
        
        <input class="btn btn-success" type="submit" value="submit"  name = "submit">
        <input class="btn btn-danger" type="reset" value="reset">

    </div>
        </form>
   
    </div>


  <?php
     if(isset($_POST['submit']))
     {
        $count = 0;
        $sql = "SELECT user FROM student";
        $result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if($row['user'] == $_POST['user']){
                $count += 1;
            }
        }
        if($count == 0){
        mysqli_query($db,"insert into `student` values('$_POST[roll]','$_POST[name]','$_POST[user]','$_POST[password]','$_POST[dob]','$_POST[email]','$_POST[mob]','$_POST[address]','$_POST[paddress]','$_POST[course]','user.png'); ");
     
     
     ?>
    <script>
        alert("Registration Successfully Done");
    </script>
    <?php
     }
     else
     {
          ?> 
    <script>
        alert(" The Username Already Existed.");
    </script>
    <?php
     }
}
    ?> --> 
    <!-- </section> -->
</body>
</html>