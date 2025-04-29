<?php
include "dbconnect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    
    <!-- <link rel="stylesheet" href="student.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #link{
            text-decoration: none;

        }
        #link:hover{
            background-color: white;
        }
        #homel a{
            font-weight: 600;
            color: white;
        }
        #homel span{
            font-size: 18px;
            padding: 10px;
        }
        #homel a:hover{
            text-decoration: none;
            /* padding: 5px; */
            border-radius: 10px;
            background-color: blue;
        }
        
    </style>
   
</head>
<body>
    <!-- <header style="position: sticky;top:0; z-index:1000;background-color:#08083d;"> -->
    <header style="position: sticky;top:0;z-index:15000; ">
    <nav class="navbar navbar-inverse" style="background-color:#08083d;">
            <div class="navbar-header" style="padding-top: 10px;">
                 <img src="logo.jpg" alt="Library_logo" height="120" width="200">
                 <h1 style="color: white;padding:10px;font-weight:700">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
        
            
                <ul class="nav navbar-nav">
                    
                     <li id ="homel"><a href="home.php"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
                     <li id ="homel"><a href="Books.php"><span class="glyphicon glyphicon-book"></span>BOOKS</a></li>
                     <!-- <li><a href="feedback.php">FEEDBACK</a></li> -->

                </ul>
                <?php
                if(isset($_SESSION['login_user'])){?>
                     <ul class="nav navbar-nav">
                        <li><a href="profile.php">PROFILE</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php">
                    <div style = "color:white">
                        <?php
                        echo "<img class='img-circle profile_img' height = 50 width=50
                        src = 'image/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user'];
                        ?>
                    </div>
                    </a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                    </ul>
                   <?php
                   
                }
                else{
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                    
                    <li id ="homel"><a href="login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    <li id ="homel"><a href="student_registration.php"><span class="glyphicon glyphicon-user"> SIGN_UP</span></a></li>
                    </ul>
                    <?php
                }?>
        </div>
    </nav>
    </header>
    <?php
    if(isset($_SESSION['login_user'])){
        $day = 0;
        $expire = '<p style="color:yellow; background-color:red;">EXPIRED</p>';
        $result = mysqli_query($db,"SELECT `return` FROM issue_book 
        WHERE user = '$_SESSION[login_user]' and approve='$expire' ;");
       
       while($row = mysqli_fetch_assoc($result)){
        // return date
        $d = strtotime($row['return']);
        // current date
        $c = strtotime(date("Y-m-d"));
        
        $diff = $c-$d;
        if($diff >= 0){
            $day = $day + floor($diff/(60*60*24));
            $_SESSION['days']= $day ;

        }
       // echo floor($diff/(60*60*24)); //in days
       }
    }
    ?>
    
</body>
</html>