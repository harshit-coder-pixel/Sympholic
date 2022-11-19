<!DOCTYPE html>
<html lang="en">
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title> Contact Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/contact.css">
    <?php
        include "../fav.php";
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <?php
        session_start();
        if(isset($_SESSION["user_status"])) $logged_in = $_SESSION["user_status"];
        else $logged_in = 'not';
    ?>
   </head>
<body>
    <nav>
        <div class="nav-bar">
            <div class="menu" >
                <div class="menu-ico" onclick="OpenNav()">
                    <span ><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <span class="menu-lable">Menu</span>
                </div>
                <div id="Sidenav" class="nav">
                    <h2>Sympholic</h2>
                    
                    <div class="nav-link">
                        <a  class="closebtn" onclick="closeNav()" class="closebtn">&times;</a>
                        <a href="./homepage.php">HomePage</a>
                        <a href="./servies.php">Services</a>
                        <a href="./mission.php">Mission</a>
                        <a href="./about.php">About</a>
                    </div>
                    <div class="social-icon-nav">
                        <a href="https://www.facebook.com/profile.php?id=100079857722997" ><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/"> <i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/simpholic_/"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="btn-contact">
                        <button>
                            <a href="#" class="active">Contact Us</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="user subnav">
                <img src="../Landing-site/img/user.png"  class="subnavbtn1"alt="">
                    <?php
                        if($logged_in == "logged_in"){
                    ?>
                <div class="subnav-content1">
                <a style=" pointer-events: none; cursor:default"><i class='bx bx-user' ></i> &nbsp;<?php echo $_SESSION['username'] ?></a>
                    <a  href="../loginCheck.php">
                    <i class='bx bx-tachometer'></i>&nbsp;
                        Your Dashboard</a>
                    <a href="../config/logout.php">
                    <i class='bx bx-log-out'></i>&nbsp;
                        Logout</a>
                </div>
                    <?php
                        }
                        else
                        {
                    ?>
                <div class="subnav-content1">   
                    <a  href="../loginCheck.php">
                    <i class='bx bx-tachometer'></i>&nbsp;
                        Your Dashboard</a>
                    <a href="../Dashboard/login.php">
                        <i class='bx bx-lock-alt' ></i> &nbsp;
                        Sign in</a>
                    <a href="../DashBoard/register.php">
                    <i class='bx bx-lock-open' ></i> &nbsp;
                        Sign Up
                    </a>
                    </div> 
                    <?php
                        }
                    ?>
            </div>
        </div>
        </nav>
        <main>
            <div class="container">
                <div class="content">
                    <div class="image-box">
                        <img src="./img/contact.webp" alt="" >
                    </div>
                    <form action="../Dashboard/php/contact.php" method="post">
                        <div class="topic">Send us a message</div>
                        <div class="input-box">
                            <input type="text" name="name"required>
                            <label>Enter your name*</label>
                        </div>
                        <div class="input-box">
                            <input type="text" name="email" required>
                            <label>Enter your email*</label>
                        </div>
                        <div class="message-box">
                            Enter your message<br>
                            <textarea name="msg" placeholder="Please Enter Your Msg here*"></textarea>
                        </div>
                        <div class="captcha">
                            <div class="g-recaptcha" data-sitekey="6LcNa7UfAAAAAMP-d9Kw1suM1W3ZHT3Qpn1NRjqc" ></div>
                        </div>
                        <div class="input-box">
                            <input type="submit"  name="submit" value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php
        include './footer.php';
        ?>
        <script>
              $('form').on('submit',function(e){
                if(grecaptcha.getResponse() === "") {
                e.preventDefault();
                alert('Error: \n please validate the Captcha test');
                }

                });
        </script>
        <script src="javascript/homepage.js"></script>
</body>
</html>
        