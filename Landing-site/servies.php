<?php
    require_once("../config/connection.php");
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
    <link rel="stylesheet" href="./css/about.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <?php
        session_start();
        if(isset($_SESSION["user_status"])) $logged_in = $_SESSION["user_status"];
        else $logged_in = 'not';
    ?>
    <title>Services</title>
    <style>
        .content
        {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        h2.label{
            font-size:1.5rem !important;
            
        }
        li{
            font-size:1.2rem !important;
            line-height: 2rem;
        }
        @media screen and (max-width:700px) {
            body{
                font-size:0.8rem !important;
                fex-direction: column;
            }
            ol{
                display:block;
                width:90%;
                margin:0 auto;
            }
            h2.label{
                font-size:1.2rem !important;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-bar">
            <div class="menu" >
                <div class="menu-ico">
                    <span onclick="OpenNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <span class="menu-lable">Services</span>
                </div>
                <div id="Sidenav" class="nav">
                    <h2>Sympholic</h2>
                    <div class="nav-link">
                        <a class="closebtn" onclick="closeNav()" class="closebtn">&times;</a>
                        <a href="./homepage.php">HomePage</a>
                        <a href="#" class="active">Services</a>
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
            <img src="img/services.jpg" alt="" width="100%" style="height:50vh;object-fit:cover; filter: brightness(75%); z-index:1">
        </section>
        <section class="header">
            <h1 style="text-align: center;">Services</h1>
            <p>“To give real service you must add something which cannot be bought or measured with money, and that is sincerity and integrity.”</p>
        </section>
        <section class="content">
            <div>
                <h2 class="label" style="color:black;">Projects</h2></li>
                    <ol type="a">
                        <li>Tracking of Project</li>    
                        <li>All information of the Project (Name, duration, cost)</li>    
                        <li>Report of the Project</li>    
                    </ol>
            </div>
            <div>
                <h2 class="label" style="color:black;">Schemes/scholarship</h2>
                <ol type="a">
                    <li>Users can check information regarding Schemes and scholarship</li>
                    <li>Govt. can upload information regarding Schemes and scholarship</li>
                    <li>Eligibility for schemes or scholarships is reflect on the user side.</li>
                </ol>
            </div>
        </section>
        <section class="bg-dark">
            <h2 class="text-center padding-64px white">Partners</h2>
            <div class="brand-partner">
                <img src="img/Google_logo_white_2015.svg" alt="" width="20%" style="padding: 20px 0;">
                <img src="img/cropped-lpu-logo-white-text.png  " alt="" width="20%" height="10%">
                <img src="img/amazlog.png" alt="" width="20%" style="padding: 20px 0;">
            </div>
        </section>
        <?php
            include './footer.php';
        ?>
        <script src="./javascript/about.js"></script>
</body>
</html>