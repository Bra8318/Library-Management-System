<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    
    <!-- <link rel="stylesheet" href="student.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            margin: 2px;
            font-size: 18px;
            padding: 5px;

        }
        #homel a:hover{
            margin: 0px;
            text-decoration: none;
            /* padding: 5px; */
            border-radius: 10px;
            background-color: blue;
        }
        </style>
</head>
<body>
<header style="position: sticky;top:0;z-index:15000; ">
    <nav class="navbar navbar-inverse" style="background-color:#08083d;" >
            <div class="navbar-header" style="padding-top: 10px;">
                 <img src="logo.jpg" alt="Library_logo" height="120" width="200">
                 <h1 style="color: white;padding:10px;font-weight:700">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
        
            
                <ul class="nav navbar-nav" style="margin: 20px;text-align:center">
                     <li id ="homel"><a href="home.php"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
                     <li id ="homel"><a href="Books.php"><span class="glyphicon glyphicon-book"></span>BOOKS</a></li>
                     <li id ="homel"><a href="feedback.php"><span class="glyphicon glyphicon-edit"></span>FEEDBACK</a></li>

                </ul>
                <?php
                if(isset($_SESSION['login_user'])){?>
                     <ul class="nav navbar-nav" style="margin:20px">
                        <li id="homel"><a href="profile.php"><span class="glyphicon glyphicon-user"></span>PROFILE</a></li>
                    </ul>
                     <ul class="nav navbar-nav" style="margin:20px">
                        <li id="homel"><a href="student.php"><span class="glyphicon glyphicon-info-sign"></span>STUDENT-INFO</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right" style="padding-right: 10px;">
                    <li><a href="profile.php">
                    <div style = "color:white">
                        <?php 
                        echo "<img class='img-circle profile_img' height = 50 width=50
                        src = 'image/".$_SESSION['pic']."'>";

                        echo " ".$_SESSION['login_user'];
                        ?>
                    </div>
                    </a></li>
                    <li id="homel"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
                   
                    </ul>
                   <?php
                   
                }
                else{
                    ?>
                    <ul class="nav navbar-nav navbar-right" style="margin: 20px;text-align:center">>

                    <li id="homel"><a href="admin.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    <li id="homel"><a href="admin_registration.php"><span class="glyphicon glyphicon-user"> SIGN_UP</span></a></li>
                    </ul>
                    <?php
                }?>
                
                     
                  
               
            
        </div>
    </nav>
</header>
</body>
</html>