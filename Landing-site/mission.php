<?php
    require_once("../config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <?php
        include "../fav.php";
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="./css/about.css">
    <?php
        session_start();
        if(isset($_SESSION["user_status"])) $logged_in = $_SESSION["user_status"];
        else $logged_in = 'not';
    ?>
    <title>Our Mission</title>
</head>
<body>
    <nav>
        <div class="nav-bar">
            <div class="menu" >
                <div class="menu-ico">
                    <span onclick="OpenNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <span class="menu-lable">Our Mission</span>
                </div>
                <div id="Sidenav" class="nav">
                    <h2>Sympholic</h2>
                    
                    <div class="nav-link">
                        <a  class="closebtn" onclick="closeNav()" class="closebtn">&times;</a>
                        <a href="./homepage.php">HomePage</a>
                        <a href="./servies.php">Services</a>
                        <a href="#" class="active">Mission</a>
                        <a href="./about.php">About</a>
                    </div>
                    <div class="social-icon-nav">
                        <a href="https://www.facebook.com/profile.php?id=100079857722997" ><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/"> <i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/simpholic_/"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="btn-contact">
                        <button>
                            <a href="./contact.php">Contact Us</a>
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
        <section>
            <img src="img/mission.jpg" alt="" width="100%" style="max-height:50vh;object-fit:cover; filter: brightness(75%); object-position:center; z-index:10">
        </section>
        <section class="header">
            <h1 style="text-align: center;">Our Mission</h1>
            <p>“Show me the heroes that the youth of your country look up to, and I will tell you the future of your country.”</p>
        </section>
        <section class="content">
            <p>
                Corruption affects all areas of society. Our Mission primary mission is to reduce the corruption in the government sector so that the capital can be used for a better purpose like educating the younger generations and feeding the poor.Preventing corruption unlocks progress towards the Sustainable Development Goals, helps protect our nation, creates jobs, achieves gender equality, and secures wider access to essential services such as healthcare and education. While it is everyone’s right to benefit from strong anti-corruption efforts, misconduct and wrongdoing is stealing away valuable resources at a time when they are most needed to respond to and recover from the COVID-19 crisis. 

            </p>
            <p>
                Information enables people to be aware of the economic status of a nation and help them to find out measures to engage in activities that can improve their economic status and also that of the nation. We also have the scholarships platform where the one can enter the data and have the available information provided to them without scrolling through all the scholarships. We have also made donations platform and made to transparent so that the citizen can see where the capital is going. The project platform helps in the contract workers in check as the people can check the work progresss of any building and public places so that there will be less corruption. like the scholarships we have the schemes available for all and made is easily available to all.
            </p>
        </section>
        <section class="bg-dark">
            <h2 class="text-center padding-64px white">Partners</h2>
            <div class="brand-partner">
                <img src="img/Google_logo_white_2015.svg" alt="" width="20%" style="padding: 20px 0;">
                <img src="img/cropped-lpu-logo-white-text.png  " alt="" width="20%" height="10%">
                <img src="img/amazlog.png" alt="" width="20%" style="padding: 20px 0;">
            </div>
        </section>
        
        <footer>
            <footer class="light">
                <i class="fa fa-facebook-official hov"></i>
                <i class="fa fa-instagram hov"></i>
                <i class="fa fa-snapchat  hov"></i>
                <i class="fa fa-pinterest-p  hov"></i>
                <i class="fa fa-twitter  hov"></i>
                <i class="fa fa-linkedin hov"></i>
                <p class="text-center light" style="font-size: 15px;padding: 0; margin:0;">Copyright Reserved &copy; 2022</p>
            </footer> 
        <script src="./javascript/about.js"></script>
</body>
</html>