<?php

session_start();
include 'db.php';

if (isset($_POST['login'])) 
{
    $email = $_POST["email"];
    $password = $_POST['password'];

    $email_search = "select * from login where email = '$email' ";
    $query = mysqli_query($con, $email_search);
    $email_count = mysqli_num_rows($query);

    if ($email_count)  
    {
        $email_pass = mysqli_fetch_assoc($query);
        $dbpass = $email_pass['password'];
       $_SESSION['username']=$email_pass['username'];
        $pass_decode = password_verify($password, $dbpass);

        if ($pass_decode)
        {
             echo 'login successful';
?>
            <script>
                location.replace("index.php")
            </script>
        <?php
        } else 
        {
        ?>

            <script>
                alert("invalid Password");
            </script>
        <?php
        }
    } else 
    {
        ?>

        <script>
            alert("invalid E-mail");
        </script>
<?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Georama:wght@300&family=Merienda:wght@700&display=swap" rel="stylesheet">
</head>
<style>
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

    }

    .aa {
        margin-top: 25px;
        width: 20vw;
        height: 5vh;
        background-color: rgb(182, 243, 182);
        border-radius: 5px;
        border: white;

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

    body {
        background-color: rgb(210, 219, 208);
    }

    #btn1 {
        background-color: rgb(240, 47, 47);
        color: beige;
        border-radius: 8px;
        border: white;
        font-size: 16px;
        width: 15vw;
        height: 5vh;

    }

    #btn2 {
        background-color: rgb(38, 38, 252);
        color: beige;
        width: 15vw;
        height: 5vh;
        margin: 10px 0px;
        font-size: 16px;

        border-radius: 8px;
        border: white;

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
        /* height: 10vh; */
    }

    .container {
        background-color: rgb(216, 238, 241);
        width: 30vw;
        margin: auto;
        padding: 10px;
        border-radius: 10px;
    }

    .fb {
        width: 20px;

        position: relative;
        top: 4px;
    }

    .new {
        color: rgb(3, 230, 60);
        position: relative;
        left: 12vw;
    }
</style>


<body>
    <h3>Log-In Form </h3>

    <form action="" method="POST">
        <div class="container">
            <!-- <button type="submit" class="new"> Create Account</button> -->
            <a class="new" href="Sign-Up.php">Create Account</a>
            <input type="text" class="aa" name="email" placeholder="     E-mail">
            <input type="password" class="aa" name="password" placeholder="      Password">
            <!-- <input type="submit"class="aa" href = "index.html" name =index> -->
            <!-- <a href="index.html" type="submit" class="btn" name='login'>Log-In</a> -->
            <button type="submit" class="btn" name="login"> Log-In</button>
            <button type="submit" id="btn1"> <img class="fb" src="image/google-logo.png"  alt="">Connect with G-Mail </button>
            <button type="submit" id="btn2"><img class="fb" src="image/facebook-circled.png" alt=""> Connect with Facebook </a></button>

        </div>
    </form>
    <script>
    </script>
</body>

</html>