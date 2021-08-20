<?php
error_reporting(0);

if (isset($_POST['submit'])) {

    include 'db.php';

    $username = $_POST['username'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "select * from login where email = '$email' ";
    $query = mysqli_query($con, $emailquery);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        echo ("This Email is already exist");
    } 
    else {
        if ($password === $cpassword) {
            $insertquery = "insert into login( username, email, password, cpassword) values('$username', '$email', '$pass', '$cpass')";

            $iquery = mysqli_query($con, $insertquery);
            if ($con) {
                $alt = true;
?>

                <script>
                    alert(" connected");
                </script>
            <?php
            } else {
            ?>

                <script>
                    alert(" not connected");
                </script>
<?php
            }
        } else {
            echo " password does not matched";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    h1 {
        color: green;
    }

    h3 {

        text-align: center;
        margin: 120px auto 20px auto;
        font-size: x-large;
        padding: 10px;
        border-radius: 5px;
        background-color: rgb(133, 238, 133);
        color: white;
        width: 30vw;
        
    }

    * {
        font-family: 'Georama', sans-serif;


    }

    form {
        text-align: center;

    }

    input {
        margin: auto;
        margin-top: 5px;
        display: block;
        font-size: 20px;

        margin-top: 25px;
        width: 20vw;
        height: 5vh;
        background-color: rgb(182, 243, 182);
        border-radius: 5px;
        border: white;

    }

    .new {
        color: rgb(3, 230, 60);
        position: relative;
        left: 10vw;
        
    }

    .btn {
        display: block;
        width: 10vw;
        height: 5vh;
        border-radius: 5px;
        border: white;
        margin: 20px auto;
        background-color: rgb(133, 238, 133);
        color: white;
        font-size: 20px;
    }

    .container {
        background-color: rgb(216, 238, 241);
        width: 30vw;
        margin: auto;
        padding: 10px;
        border-radius: 10px;
    }
</style>

<body>
    <?php
    if ($alt) {
        echo "<h1>Your account is created</h1>";
    }
    ?>
    <h3>Sign-Up Form</h3>
    <form action="" method="POST">
        <div class="container">
            <a class="new" href="login.php"> Already have account</a>
            <input type="text" name="username" required placeholder=" Enter Name">
            <input type="email" name="email" required placeholder=" Enter E-mail">
            <input type="password" name="password" required placeholder=" Create Password">
            <input type="password" name="cpassword" required placeholder=" Confirm Password">
            <button class="btn" id="btn" type="submit" name="submit">Create Account</button>
        </div>
    </form>

</body>

</html>