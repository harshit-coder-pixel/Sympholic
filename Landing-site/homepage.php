<?php
require_once "../config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
        include "../fav.php";
    ?>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="css/homepage.css">
    <?php
        session_start();
        if(isset($_SESSION["user_status"])) $logged_in = $_SESSION["user_status"];
        else $logged_in = 'not';
    ?>
    <title>HomePage - Sympholic</title>
</head>
<body>
    <script>
        function test() {
                    document.location.href="../Dashboard/register.php";
                    }
    </script>
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
                        <a href="#" class="active">HomePage</a>
                        <a href="./servies.php">Services</a>
                        <a href="./mission.php">Mission</a>
                        <a href="./about.php" >About</a>
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
                <div class="subnav-content1" style="margin-top:140px">
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
                    <a href="../Dashboard/register.php">
                    <i class='bx bx-lock-open' ></i> &nbsp;
                        Sign Up
                    </a>
                    </div> 
                    <?php
                        }
                    ?>
            </div>
        </div>
        <section class="header">
            <div class="bg-op">
                <h1 class="brand-name">Sympholic</h1>
                <p class="brand-caption">Our goal of creating Sympholica site is to help the citizen of India to have up to date information, easily accessible in an organized manner, Be it about policy, scholarship, ongoing projects. We also host donation services to help the one in need. Our vision is to have a corruption less country with transparency about everything.</p>
                <button class="btn-header" onclick="exp()">Explore More</button>
                <script>
                    function exp() {
                        document.location.href="../Landing-site/about.php";
                    }
                </script>
                <br>
                <Br>
                <br>
            </div>
            </section>
        </nav>
        <main>
            <section class=".test" style="padding: 0 0 14px;">
                <h2 class="text-center padding-64px">Testimonial <hr></h2>
                <div class="testimonial-container">
                    <div class="progress-bar"></div>
                    <p class="testimonial">
                        I've worked with literally hundreds of HTML/CSS developers and I have to
                        say the top spot goes to this guy. This guy is an amazing developer. He
                        stresses on good, clean code and pays heed to the details. I love
                        developers who respect each and every aspect of a throughly thought out
                        design and do their best to put it in code. He goes over and beyond and
                        transforms ART into PIXELS - without a glitch, every time.
                    </p>
                    <div class="user">
                        <img
                        src="https://randomuser.me/api/portraits/women/40.jpg"
                       alt="user"
                       class="user-image"
                       />
                       <div class="user-details">
                           <h4 class="username">Miyah Myles</h4>
                           <p class="role">Marketing</p>
                        </div>
                    </div>
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
            <section class="second-section">
                <h2 class="text-center">Who we are? <hr></h2>
                <p class="text-center light padding-32px"><i>We are Sympholic</i></p>
                <p class="content">We are a small company whose vision is to create a clean India without corruption and equal opportunity to all be it someone from Tamil Nadu or someone from Ladakh. We help in creating who is with the help of this site Sympholica. In which we give information to all without any charges and all the information is specifically curated to them so that they can get to their required information in limited about of time. Which time they can use to do other things. We provide information such as government policy, both national, international scholarship and ongoing Project.  We also have a donation service which is different than others as it gives all the information about the transaction of the money paid to the donation. Which will result in better India.</p>
            </section>
            
                <?php
                $Projectsql = "SELECT * FROM project" ;
                $Projectresult = $conn->query($Projectsql);
                $completeProject = 0;
                $ongoingProject = 0;
                $upcomingProject = 0;
                while($row = $Projectresult->fetch_assoc()){
                    $id = $row['sno'];
                    $title = $row['Name'];
                    $Description = $row['Description'];
                    $StartDate = $row['StartDate'];
                    $EndDate = $row['EndDate'];
                    $CompanyName = $row['CompanyName'];
                    $Budget = $row['Budget'];
                    $State = $row['State'];
                    $District = $row['District'];
                    $Pincode = $row['Pincode'];
                    $image = $row['image'];
                    $pdf = $row['pdf'];
                    $StDate = date('d-m-Y', strtotime($StartDate));
                    $EDate = date('d-m-Y', strtotime($EndDate));
                    $StartDate = date('d M, Y', strtotime($StartDate));
                    $EndDate = date('d M , Y', strtotime($EndDate));              
                   
                    $currentDate = date('d-m-Y');
                    $count= 1;
                    
                    if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) > strtotime($EDate)){
                        $completeProject++;
                    }
                    else if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) < strtotime($EDate)){ 
                        $ongoingProject++;    
                    }
                    else {
                    $upcomingProject++;
                }
                }
            ?>
            <section class="tour">
                <div class="third-section padding-8px">
                        <h2 class="text-center" >Project Detials</h2>
                    <p class="text-center light padding-32px"><i>Check Project Status here</i></p>
                    <ul class="month-card">
                        <li>Past Projects
                            <span class="red-float"><?php echo $completeProject ?>+</span>
                        </li>
                        <li>Upcoming Projects
                            <span class="red-float"><?php echo $upcomingProject ?>+</span>
                        </li>
                        <li>Ongoing Projects
                            <span class="message"><?php echo $ongoingProject?></span>
                        </li>
                    </ul>
                    <div class="con-section padding-8px" style="margin: 35px -16px;">

                    <?php
                       function readMore($content,$link,$var,$id, $limit) {
                        $content = substr($content,0,$limit);
                        $content = substr($content,0,strrpos($content,' '));
                        $content = $content."<button class='btn-black'> <a href='$link?$var=$id' id='myBtn'>Read More...</a> </button>";
                        return "<br>".$content;
                    }
                $sqlProjectShow = 'SELECT * FROM project ORDER BY RAND() LIMIT 3';
                $resultProjectShow = mysqli_query($conn,$sqlProjectShow);
                while($row= mysqli_fetch_array($resultProjectShow))
                {
                    $Projectid = $row['sno'];
                    $Projecttitle = $row['Name'];
                    $Description = $row['Description'];
                    $StartDate = $row['StartDate'];
                    $EndDate = $row['EndDate'];
                    $CompanyName = $row['CompanyName'];
                    $Budget = $row['Budget'];
                    $State = $row['State'];
                    $District = $row['District'];
                    $Pincode = $row['Pincode'];
                    $image = $row['image'];
                    $pdf = $row['pdf'];
                    $testDate = $StartDate;
                    $StartDateDay = date('D d M Y', strtotime($testDate));
                    $StDate = date('d-m-Y', strtotime($StartDate));
                    $EDate = date('d-m-Y', strtotime($EndDate));
                    $currentDate = date('d-m-Y');
                    $count= 1;
                    $content = $Description;
                    $link= "../ProjectView/fullpageProject.php";
                    $limit= "60";

            ?>
                        <div class="card padding-8px">
                            <img src="../ProjectPost/serverData/PostData_<?php echo $Projectid ?>/img/img_1.jpg" alt="" width="100%" height="250px" style="object-fit: cover">
                            <div class="card-info" >
                                <p><?php echo $Projecttitle ?></p>
                                <p class="light"><?php echo $StartDateDay ?></p>
                                <p syle="margin-top:-40px"><?php echo readMore($content,$link,"id",$Projectid,$limit)?></p>
                            </div>
                        </div>
                        
                        <?php
                }
                ?>
                </div>   
            </section>
            
           <section class="second-section">
                <h2 class="text-center" >Contact</h2>
                <p class="light text-center"><i>Any Query?</i></p>
                <div class="contact-container">
                    <div class="contact-item" style="font-size: 18px;">
                        <i class="fa fa-map-marker" style="width: 10%;;"></i>Chicago,US<br>
                        <i class="fa fa-phone" style="width: 10%;"></i>Phone: +00 151515<br>
                        <i class="fa fa-envelope" style="width:10%;"></i>Email: mail@gmail.com
                    </div>
                    <div class="contact-item-1">
                        <div class="padding-8px" >
                            <form action="../Dashboard/php/contact.php" method="POST">
                                <div class="half" style="margin-right: 3%;">
                                    <input type="text" name="name" placeholder="Name*" required>
                                </div>
                                <div class="half">
                                    <input type="text"  name="email" placeholder="Email*" required>
                                </div>
                                <input type="text" name="msg" placeholder="Message*" required>
                                <button type="submit" name="submit"class="btn-black">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        <section class="login">
                <div class="padding-64px">
                    <h2 align="center">Take all benifits</h2>
                    <p style="text-align: center;">Don't miss any update from now!!</p>
                </div>
                <div>
                    <button class="login-btn res-padding" onclick="test()">Sign Up</button>
                </div>
            </section>
        </main>
               <?php
                include './footer.php';
                ?>
            <script src="javascript/homepage.js"></script>
            </body>
            </html>