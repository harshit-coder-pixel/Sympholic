<?php
    session_start();
    $_SESSION["user_status"]="logged_out";
    $_SESSION["username"]="";
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        include "../fav.php";
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
    <style>
        .backhome{
                /* display:block; */
                position: fixed;
                bottom:80px;
                left: 46%;
                text-align:center;
        }
        @media screen and (max-width:700px) {
            .backhome{
                position: fixed;
                bottom:20px;
                left:30%;
            }
        }
    </style>
</head>
<body>
    <section class="backhome">
    <a href="../Landing-site/homepage.php" style="text-decoration:none;color:purple">
    <i class="fa fa-arrow-circle-left" style="font-size:24px"></i>
    Go Back to Home
    </a>
    </section>
<main>
    <section class="left"></section>
    <section class="right">
        <h2>Simpholic</h2>
        <p>Welcome back! Login in to your account</p>
        <form method="post" action="./php/logval.php">
            <div class="mail">
                <label for ="user">Username</label>
                <input type="text" name="username" id="user" placeholder="User" required #mail>
            </div>
            <div class="password">
                <label for ="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required >
                <span ><i  class="fa fa-eye-slash hide" id="1" style="margin-left:-40px;font-size: 20px;" onclick="eye()"></i></span>
            </div>
            <button type="submit" name="submit">Login</button>
            <p class="sign-in" align="center" id="hov" class="hov"  style="clear:both;"><a href="register.php"> Sign up?</a></p>
        </form>
    </section>
    <script src="./js/login.js"></script>
</main>
    
</body>
</html>