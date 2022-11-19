<?php
    require '../config/directories.php';
    require '../config/connection.php';
    require '../config/session.php';
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
    <link rel="stylesheet" target="main-frame" href="nav.css">
    <link rel="stylesheet" target="main-frame" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link target="main-frame" href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        if(screen.width<=700)
        {
            alert('Some features of Admin Panel are not available on mobile devices \nPlease use a laptop or desktop to access Admin Panel');
        }
    </script>
    <title>Dashboard</title>
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
                    <!-- <h2>Sympholic</h2> -->
                    <div class="nav-link">
                        <li>
                            <a target="main-frame" page="admin-main" href="./main-admin.php">
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
                                <a target="main-frame" page="post-scheme" href="../posting/index.html">Post New Scheme</a>
                                <a target="main-frame" page="all-schemes" href="../view-all-schemes/main.php">All Schemes</a>
                                <a target="main-frame" page="all-user-schemes" href="../view-Schemes-user/main.php">All User Schemes</a>
                            
                            </div>
                        </li>
                        <li class="subnav">
                                <span class="subnavbtn">
                                    <i class='bx bxs-spreadsheet'></i> &nbsp;
                                        Project
                                        <i class="fa fa-caret-down right"></i>
                                </span>
                                <div class="subnav-content">
                                    <a target="main-frame" page="post-project" href="../ProjectPost/main.html">Post Project</a>
                                    <a target="main-frame" page="view-all-Editproject" href="../View-all-Project-admin/main.php">Edit Project</a>
                                    <a target="main-frame" page="view-all-project" href="../View-all-Project-admin/main.php">All Project</a>
                                    <a target="main-frame" page="view-user-project" href="../ProjectView/display.php">Project User View</a>
                                </div>  
                        </li>
                        <li class="subnav">
                                <span class="subnavbtn">
                                    <i class='bx bxs-user'></i>&nbsp;&nbsp;
                                        Users
                                        <i class="fa fa-caret-down right"></i>
                                </span>
                                <div class="subnav-content">
                                    <a target="main-frame" page="all-user" href="../userView/main.php">All User</a>
                                    <a target="main-frame" page="add-user" href="../Dashboard/createUser.php">Add User</a>
                                    <a target="main-frame" page="delete-user" href="../userView/main.php">Delete User</a>
                                    <a target="main-frame" page="change-password" href="../Dashboard/passwordChange.php">Change Own Password</a>
                                </div>  
                        </li>
                        <li>
                            <a target="_top" href="../Landing-site/about.php">
                                <i class='bx bx-info-circle'></i> &nbsp;
                                        About
                            </a>
                        </li>
                        <li>
                            <a target="_top" href="./sidebar.php">
                            <i class='bx bx-show-alt'></i>&nbsp;
                                        View UserPanel
                            </a>
                        </li>
                       
                    </div>
                    <div class="btn-logout" >
                        <button style="bottom:50px" onclick="window.location.replace('../Dashboard/login.php')">
                            <span>
                                <i class='bx bx-log-out'></i> &nbsp;
                                Logout
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="Nav-title"> 
                <h2>Admin Panel</h2>
            </div>
            <div class="user subnav">
                <img src="../Landing-site/img/user.png"  class="subnavbtn1"alt="">
                <div class="subnav-content1">
                    <a style=" pointer-events: none; cursor:default"><i class='bx bx-user' ></i> &nbsp;<?php echo $_SESSION['username'] ?></a>
                    <a target="main-frame" page="edit-profile" href="../Dashboard/userprofile.php">
                        <i class='bx bxs-pencil' ></i> &nbsp;
                        Edit Profile</a>
                    <a target="main-frame" page="change-password" href="../Dashboard/passwordChange.php">
                        <i class='bx bx-lock-alt' ></i>
                        Change Password</a>
                    <a target="_top" href="../Dashboard/login.php">
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
                        echo $dirs1[$_GET['p'].'-single'].$_GET['id'];
                    }else{
                        echo $dirs1[$_GET['p']];
                    }
                }else{
                    echo './main-admin.php';
                }
            ?>" border="0"></iframe>
        </main>
        <script>
            
            // console.log(document.getElementById("Sidenav").style.width);
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
            // document.querySelector('#main-frame').onload = function(){
            //     let iframeUrl = this.contentWindow.location.href;
            //     console.log('iframeUrl',iframeUrl);
            //     if(iframeUrl.includes('id')){
            //         modifyState(window.title,window.location.href.split('&id=')[0]+'&id='+iframeUrl.split('=')[1]);
            //     }
            // }
            // function modifyState(title,url) {
            //     let stateObj = { id: "100" };
            //     window.history.pushState(stateObj,title, url);
            // }
        </script>
</body>
</html>