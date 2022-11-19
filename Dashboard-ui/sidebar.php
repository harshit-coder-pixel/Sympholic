<?php
    require '../config/session.php';
    $count = $_SESSION['loginCount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "../fav.php";
    ?>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Dashboard</title>

</head>
<body >
    <nav>
        <div class="nav-bar">
            <div class="menu" >
                <div class="menu-ico" onclick="OpenNav()">
                    <span ><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <span class="menu-lable">Menu</span>
                </div>
                <div id="Sidenav" class="nav">
                    <!-- <h2>Sympholic</h2> -->
                    <div class="nav-link">
                        <li>
                            <a page="main" target="main-frame" href="./main.php">
                                <i class='bx bx-home-alt icon' ></i> &nbsp;
                                Dashboard
                            </a>
                        </li>
                        <li class="subnav">
                            <span class="subnavbtn">
                                <i class='bx bx-sitemap'></i> &nbsp;
                                    Schemes
                                    <i class="fa fa-caret-down right"></i>
                            </span>
                            <div class="subnav-content">
                                <a target="main-frame" page="all-schemes" href="../view-Schemes-user/main.php">View All Schemes</a>
                                <a target="main-frame" page="eligible-schemes" href="../view-Schemes-user/eligible.php">View Eligible Schemes</a>
                            </div>
                        </li>
                        <li class="subnav">
                                <span class="subnavbtn">
                                    <i class='bx bxs-spreadsheet'></i> &nbsp;
                                        Project
                                        <i class="fa fa-caret-down right"></i>
                                </span>
                                <div class="subnav-content">

                                    <a target="main-frame" page="all-projects" href="../ProjectView/display.php">All Project</a>
                                    <a target="main-frame" page="completed-projects" href="../Project-type/completed.php">Completed Project</a>
                                    <a target="main-frame" page="ongoing-projects" href="../Project-type/ongoing.php">Ongoing Project</a>
                                    <a target="main-frame" page="upcoming-projects" href="../Project-type/upcoming.php">Upcomming Project</a>
                                </div>  
                        </li>
                        <li class="subnav">
                                <span class="subnavbtn">
                                    <i class='bx bxs-user'></i>&nbsp;&nbsp;
                                        Profile
                                        <i class="fa fa-caret-down right"></i>
                                </span>
                                <div class="subnav-content">
                                    <a target="main-frame" page="edit-profile" href="../Dashboard/userprofile.php">Edit Profile</a>
                                    <a target="main-frame" page="change-password" href="../Dashboard/passwordChange.php">Change Password</a>
                                </div>  
                        </li>
                        <li>
                            <a target="_top" href="../Landing-site/about.php">
                                <i class='bx bx-info-circle'></i> &nbsp;
                                        About
                            </a>
                        </li>
                        <?php
                            $role = $_SESSION['role']; 
                            if($role == 'admin' || $role == 'Admin'){
                        ?> 
                        <li>
                            <a target="_top" href="./admin-sidebar.php">
                            <i class='bx bx-show-alt'></i>&nbsp;
                                       Admin Panel
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="btn-logout">
                        <button onclick="window.location.replace('../Dashboard/login.php')">
                            <span>
                                <i class='bx bx-log-out'></i> &nbsp;
                                Logout
                        </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="Nav-title">
                <a href="../Landing-site/homepage.php" style="text-decoration:none;"><h2 id="page-title">Sympholic</h2></a>
            </div>
            <div class="user subnav">
                <img src="../Landing-site/img/user.png"  class="subnavbtn1"alt="">
                <div class="subnav-content1">
                <a style=" pointer-events: none; cursor:default"><i class='bx bx-user' ></i> &nbsp;<?php echo $_SESSION['username'] ?></a>
                    <a target="main-frame" page="edit-profile" href="../Dashboard/userprofile.php">
                        <i class='bx bxs-pencil' ></i> &nbsp;
                        Edit Profile</a>
                    <a target="main-frame" page="change-password" href="#team">
                        <i class='bx bx-lock-alt' ></i>
                        Change Password</a>
                    <a href="../Dashboard/login.php">
                        <i class='bx bx-log-out'></i> &nbsp;
                        Logout
                    </a>
                </div> 
            </div>
        </div>
        </nav>
        <main class="container" id="container"> 
            <!-- <h2>Hello</h2> -->
            <iframe id="main-frame" name="main-frame" src="<?php 
                if(isset($_GET['p'])){
                    require '../config/directories.php';
                    if(isset($_GET['id'])){
                        echo $dirs[$_GET['p'].'-single'].$_GET['id'];
                    }else{
                        echo $dirs[$_GET['p']];
                    }
                }else{
                    echo './main.php';
                }
            ?>" border="0"></iframe>
        </main>
        <script>
            
            console.log(document.getElementById("Sidenav").style.width);
            if(screen.width<=600){
            document.getElementById("Sidenav").style.width="0px";
            }
            else if(screen.width>600){
                document.getElementById("Sidenav").style.width="300px";
                document.getElementById('container').style.marginLeft="300px";
            }
            function OpenNav() {
                if(document.getElementById("Sidenav").style.width == "300px"){
                    document.getElementById("Sidenav").style.width = "0";
                    document.getElementById("container").style.marginLeft = "0px";
                }else{
                    document.getElementById("Sidenav").style.width = "300px";
                    if(screen.width<=600){
                        document.getElementById("container").style.marginLeft = "0px";
                    }
                    else if(screen.width>600){
                        document.getElementById("container").style.marginLeft = "300px";
                    }
                } 
            }
            $('a').click(function(){
                window.location.href = '?p='+$(this).attr('page');
            });
            document.querySelector('#main-frame').onload = function(){
                let iframeUrl = this.contentWindow.location.href;
                console.log('iframeUrl',iframeUrl);
                if(iframeUrl.includes('id')){
                    modifyState(window.title,window.location.href.split('&id=')[0]+'&id='+iframeUrl.split('=')[1]);
                }
            }
            function modifyState(title,url) {
                let stateObj = { id: "100" };
                window.history.pushState(stateObj,title, url);
            }
            
    </script>
</body>
</html>