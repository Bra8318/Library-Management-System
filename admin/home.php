<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="head.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .fa{
            padding: 5px;
            font-size: 30px;
            width: 30px;
            height: 30px;
            text-decoration: none;
            border-radius: 50%;
        }
       

        .fa-twitter{
            background-color: #55ACEE;
            color: white;
        }
        .fa-facebook{
            background-color: #3b5998;
            color: white;
        }
        .fa-google{
            background-color: #dd4b39;
            color: white;
        }
        .fa-instagram{
            background-color: #125688;
            color: white;
        }
       
        #link{
            text-decoration: none;

        }
        #link:hover{
            background-color: white;
        }
        #homel a{
            font-weight: 600;
        }
        #homel span{
            font-size: 18px;
            padding: 5px;
        }
        #homel a:hover{
            text-decoration: none;
            padding: 5px;
            border-radius: 10px;
            background-color: white;
        }
    </style>
</head>
<body>
    
        <header style="position: sticky;top:0;z-index:15000; background-color:#08083d;">
            <div class="nav navbar-header" style="padding-top: 10px;">
            <img src="logo.jpg" alt="Library_logo" height="120" width="200">
            <h1 style="color: white;padding:10px;font-weight:700">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>
            <?php
            if(isset($_SESSION['login_user'])){

            ?>
                <nav>
                    <ul>
                         <li id="homel"><a href="home.php"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
                         <li id="homel"><a href="books.php"><span class="glyphicon glyphicon-book"></span>BOOKS</a></li>
                         <li id="homel"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
                         
                         <li id="homel"><a href="feedback.php"><span class="fa-solid fa-comments"></span>FEEDBACK</a></li>
                    </ul>
                </nav>
                <?php
            }
            else{
                ?>

                <nav>
                <ul>
                     <li id="homel"><a href="home.php"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
                     <li id="homel"><a href="books.php"><span class="glyphicon glyphicon-book"></span>BOOKS</a></li>
                     
                     <li id="homel"><a href="admin.php"><span class="glyphicon glyphicon-log-in"></span>ADMIN_LOGIN</a></li>
                     <li id="homel"><a href="feedback.php"><span class="fa-solid fa-comments"></span>FEEDBACK</a></li>
                </ul>
            </nav>
            <?php
            }
            ?>

            
        </header>
        <section style="background-image: url(library.jpg);">
            <br><br><br><br>
            <div class = "section"><br>
                <h1 style="color: white;">Welcome To Library</h1>
                <h1 style="color: white;">Opens At: 09:00</h1>
                <h1 style="color: white;">Closes At: 17:00</h1>

            </div>
        </section>
        <footer style=" background-color:#08083d; ">
            <br><br>
            <h3 style="color: white; text-align: center;">Contact Us:</h3>
            <div style="margin: 0px 570px; text-align: center;">
                <a href="#" class="fa fa-facebook" id="link"></a>&nbsp  &nbsp 
                <a href="#" class="fa fa-twitter" id="link"></a>&nbsp &nbsp 
                <a href="#" class="fa fa-google" id="link"></a>&nbsp &nbsp 
                <a href="#" class="fa fa-instagram" id="link"></a>
            </div>
                <br><br>
                <p style="color: white; text-align: center;" >
                    Email : OnlineLibrary@gmail.com <br><br>
                    Mobile No: +918265478595
                </p>



        </footer>
    </div>
    
</body>
</html>