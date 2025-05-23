<?php
include "admin_head.php";
include "dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Book Request</title>
<style>
              body {
                background-color: grey;
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
       .container{
            height:400px;
            width: 600px;
            background-color: black;
            opacity: .8;

       }
    </style>
</head>


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
 <div class="h"><a href="issue_info.php">Issue Information</a> </div> 
  
  
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

  <div class="container">
        <h3 style="text-align:center;color:white;">Approve Request</h3><br><br>
        <form method="post">
            <input class="form-control" type="text" name="approve" placeholder="Yes or No" required><br>
            <input class="form-control" type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required><br>
            <input class="form-control" type="text" name="return" placeholder="Return Date  yyyy-mm-dd" required><br>
            <button class="btn btn-default" type="submit" name="submit">Approve</button>
        </form>
  </div>

</div>
<?php
if(isset($_POST['submit'])){
    mysqli_query($db," UPDATE `issue_book` SET `approve` = '$_POST[approve]',
    `issue` = '$_POST[issue]', `return` = '$_POST[return]'
    WHERE user = '$_SESSION[user]' and bid ='$_SESSION[bid]'; ");

    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid ='$_SESSION[bid]';" );
    $result = mysqli_query($db,"SELECT `quantity` from `books` where bid ='$_SESSION[bid]';");

    while($row = mysqli_fetch_assoc($result)){
        if($row ['quantity']==0){
            mysqli_query($db,"UPDATE `books` SET `status` = 'not-availabe' where bid ='$_SESSION[bid]';");

        }
    }?>
    <script>
        alert("Updated Successfully.");
        window.location = "request.php";
    </script>
    <?php


}
?>
</body>
</html>
