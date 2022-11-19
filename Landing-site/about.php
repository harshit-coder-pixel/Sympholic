<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "../fav.php";
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="./css/about.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <?php
        session_start();
        if(isset($_SESSION["user_status"])) $logged_in = $_SESSION["user_status"];
        else $logged_in = 'not';
    ?>
    <title>About Us</title>
</head>
<body>
    <nav>
        <div class="nav-bar">
            <div class="menu" >
                <div class="menu-ico">
                    <span onclick="OpenNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <span class="menu-lable">About Page</span>
                </div>
                <div id="Sidenav" class="nav">
                    <h2>Sympholic</h2>
                    
                    <div class="nav-link">
                        <a  class="closebtn" onclick="closeNav()" class="closebtn">&times;</a>
                        <a href="./homepage.php">HomePage</a>
                        <a href="./servies.php">Services</a>
                        <a href="./mission.php">Mission</a>
                        <a href="#" class="active">About</a>
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
            <img src="img/about-min.jpg" alt="" width="100%">
        </section>
        <section class="header">
            <h1 style="text-align: center;">About us</h1>
            <p>"Innovation is taking two things that exist and putting them together in a new way"</p>
        </section>
        <section class="content">
            <p>We are a small company founded in 2022 for the purpose of beating corruption and to provide basic information to the citizen of India. We do this by providing services like First, we have the donation service which has a functions like status which will help the donor check the status of the donation so that he can stay rest assured that the money goes to which it is intended to be used for as we provide the status update on the site. All the donors and non-donors can check how much donation has been accumulated in the donation. We also have the donation for events like tsunami and earthquake. To encourage donations, we display the donor's name and any message he wants to display to the people. Second, we have the Project which gives information about projects like Ongoing project, Upcoming project, Completed projects. It also has a tracking service which will help them follow a project. They can obtain information such as the name of project completion date, cost, and manager. If someone thinks that the project is not being done on time, we also have the report function. Which will help the project get completed fast. As there is a problem of delay project in india. The schemes and the services are very vital information to a citizen of a nation as education is considered important so to obtain that at a good institute, they will need a scholarship so here they can get that information about it. Not only that, but they can also get information of the policy in place which will help them get a better life.</p>
            <p>The user will be able to check the information on it. The government will be able to upload the information regarding it. The eligibility of these will be displayed to the user as we have the user data so we can give policy and scholarship made for them. In future we intend to use blockchain, with it we will not need separate databases. Because blockchain uses a distributed system, transactions and data are recorded identically in multiple sites and computers. the user can access see the same information at the same time, providing full transparency. All transactions are immutability recorded and are date- and time-. This enables members to view the entire history of a transaction of the donations and virtually eliminates any opportunity for corruption when the money is being sent to the one in need. We also intend to automate the process of adding the policy. Scholarhip, and project and donation. Like we can use AI to extract information from the internet and test if the information is valid or not. If valid display it on the website. Like that we can also run donations as the AI will take information from internet of disaster and people who are in need like disabled people. If they find it and it is valid, they will run a donation event by itself and send the donation to one in need. With no human intervention there will be no corruption and no human greed.</p>
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