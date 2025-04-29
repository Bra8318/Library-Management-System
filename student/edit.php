<?php
include "dbconnect.php";
include "head.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        .form-control{
            width: 350px;
            height: 40px;
        }
        form{
            padding-left: 500px;
        }
        label{
            color: white;
        }
    </style>
</head>
<body style="background-color: #004528;">
    <h2 style="text-align:center;color:white;">Edit Information</h2>

    <?php
        $sql = "SELECT * FROM student WHERE user = '$_SESSION[login_user]'";
        $result = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc(($result))){
            $name = $row['name'];
            $user = $row['user'];
            $password = $row['password'];
            $email = $row['email'];
            $contact = $row['mob'];
            $address = $row['address'];

            
           
        }

    ?>



    <form method="post" enctype="multipart/form-data">
        <label for="admin">Student Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo $name ?>"><br>
        <label for="user">User Name</label>
        <input class="form-control" type="text" name="user" value="<?php echo $user ?>"><br>
        <label for="password">Password</label>
        <input class="form-control" type="text" name="password" value="<?php echo $password ?>"><br>
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo $email ?>" ><br>
        <label for="contact">Contact No.</label>
        <input class="form-control" type="text" name="mob" value="<?php echo $contact ?>"><br>
        <label for="address"> Current Address</label>
        <input class="form-control" type="text" name="address" value="<?php echo $address ?>"><br>
        <label for="pic">Profile Image</label>
        <input class="form-control" type="file" name="file"><br>
        <button class="btn btn-submit" type="submit" name="submit">Update</button>
    </form>

<?php
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"image/".$_FILES['file']['name']);
        $name = $_POST['name'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $contact = $_POST['mob'];
        $address = $_POST['address'];
        $pic = $_FILES['file']['name'];

        $query = "UPDATE student SET `name`= '$name',user = '$user',`password` = '$password'
        ,email='$email',mob='$contact',`address` = '$address',pic = '$pic' WHERE user = '".$_SESSION['login_user']."';";

        if(mysqli_query($db,$query)){
            ?>
            <script>
                alert("Data updated successfullt");
                window.location = "logout.php";
            </script>
            <?php
        }
    }
?>
</body>
</html>