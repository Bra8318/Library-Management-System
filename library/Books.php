<?php
include "admin_head.php";
include "dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 190px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
        .search {
            padding-left: 1000px;
           
        }
        .list{
            background-color: white;
        }
        .img-circle{
            margin-left:30px;
        }
        .h:hover{
            color: white;
            width: 300px;
            height: 50;
            background-color: #00544c; 
        }
    </style>
</head>
<body>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style = "color:white ;margin-left:50px;font-size:20px;">
    <?php 
    if(isset($_SESSION['login_user']))
      {  echo "<img class='img-circle profile_img' height = 50 width=50
            src = 'image/".$_SESSION['pic']."'>";
        echo "</br></br>";
        echo "Welcome ".$_SESSION['login_user'];
        echo "</br>";}
    ?>
   </div><br><br>
 <div class="h"><a href="add.php">Add Books</a></div>
 
 <div class="h"><a href="request.php">Book Request</a></div>
 <div class="h"><a href="#">Issue Information</a> </div> 
  
  
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<!-- searchbar -->

   <div class = "search">
        <form method="post" class = "navbar-form">
            <input type="text" name="search" placeholder="Search Book..">
            <button type="submit" name = "submit" class = "btn btn-default">
                <span class = "glyphicon glyphicon-search"></span>
            </button>
        </form>

        <form method="post" class = "navbar-form">
            <input type="text" name="bid" placeholder="Enter Book ID..">
            <button type="submit" name = "submit1" class = "btn btn-danger">
                Delete
            </button>
        </form>
    </div>
  


   
    <h2>List of Books</h2>
    <?php
    if(isset($_POST['submit'])){
        $query = mysqli_query($db,"SELECT * FROM `books` WHERE name like '%$_POST[search]%' ");
        if(mysqli_num_rows($query)==0){
            echo "Sorry! no books found.Try again";
        }
        else{
        echo "<table class = 'table table-bordered table-hover' >";
        echo "<tr style = 'background-color:white'>";
            echo "<th>"; echo "ID"; echo "</th>";
            echo "<th>"; echo "Books_Name"; echo "</th>";
            echo "<th>"; echo "Author_Name"; echo "</th>";
            echo "<th>"; echo "Edition"; echo "</th>";
            echo "<th>"; echo "Status"; echo "</th>";
            echo "<th>"; echo "Quantity"; echo "</th>";
            echo "<th>"; echo "Department"; echo "</th>";
        echo " </tr>";

        while($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['author']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "<td>"; echo $row['quantity']; echo "</td>";
            echo "<td>"; echo $row['department']; echo "</td>";
            echo "</tr>";
            }
            echo "</table>";


        }
    }

    else{

    $result = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
    echo "<table class = 'table table-bordered table-hover'>";
    echo "<tr style = 'background-color:white'>";
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Books_Name"; echo "</th>";
        echo "<th>"; echo "Author_Name"; echo "</th>";
        echo "<th>"; echo "Edition"; echo "</th>";
        echo "<th>"; echo "Status"; echo "</th>";
        echo "<th>"; echo "Quantity"; echo "</th>";
        echo "<th>"; echo "Department"; echo "</th>";
    echo " </tr>";

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['author']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

}   

    if(isset($_POST['submit1'])){
        if(isset($_SESSION['login_user'])){
            mysqli_query($db,"DELETE from books where bid = '$_POST[bid]';");
            ?>
            <script>
                alert("Delete Successfully.")
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("please Login First.");
            </script>
            <?php
        }
    }
    ?>
 </div>   
</body>
</html>