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
    </nav> -->
    <section class="box"><br>
        
        <div class="register"><br>

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

</section>
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
    ?>
    
</body>
</html>