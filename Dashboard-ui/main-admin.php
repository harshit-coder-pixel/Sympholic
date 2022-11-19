<?php
    require_once '../config/connection.php';
    require_once '../config/session.php';
    $countSql= "SELECT COUNT(*) FROM schemes";
    $countSchemes = mysqli_query($conn,$countSql);
    $countSchemes = mysqli_fetch_array($countSchemes);
    $UserSql= "SELECT COUNT(*) FROM users";
    $countUsers = mysqli_query($conn,$UserSql);
    $countUsers = mysqli_fetch_array($countUsers);
    $countProject = "SELECT COUNT(*) FROM project";
    $countProjects = mysqli_query($conn,$countProject);
    $countProjects = mysqli_fetch_array($countProjects);
        
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Simpholic -Dashbord</title>
</head>
<body class="dark"> 
    <main class="home" >
        <h2 class="heading">Welcome <?=$_SESSION["Name"]?></h2>
        <section class="Scheme-post">
            <div class="post-box">
                <h3>Total Scheme's</h3>
                <p><?php echo $countSchemes[0] ?></p>
                <button class="btn-color"><a href="../view-all-schemes/main.php" style="text-decoration:none;color:white;">See All</a></button>
            </div>
            <div class="post-box">
                <h3>Total User's</h3>
                <p><?php echo $countUsers[0] ?></p>
                <button class="btn-color"><a href="../userView/main.php" style="text-decoration:none;color:white;">See All</a></button>
            </div>
        </section>
        <section class="collection-data">
            <h3>Latest Schemes</h3>
            <div class="pattern">
            <?php
                $fetchScheme = "SELECT * FROM schemes ORDER BY RAND() LIMIT 5";
                $result = mysqli_query($conn,$fetchScheme);
                while($row = mysqli_fetch_array($result))
                {
            ?>
            <a target="_self" href="../Dashboard/singlepost.php?id=<?php echo $row['Sno'];?>"><p><?php echo $row['title']; ?></p></a>
            <?php
                }
            ?>
            </div>
            <a href="../view-Schemes-user/main.php" class="checkPost">See All</a>
            <br>
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
        </section>
        <h2 class="project-heading">Project Detials</h2>
        <section class="Scheme-post">
            <div class="post-box">
                <h3>Total Project's</h3>
                <p><?php echo $countProjects[0];?></p>
                <button class="btn-color"><a href="../View-all-Project-admin/main.php" style="text-decoration:none;color:white;">See All</a></button>
            </div>
        </section>
        <section class="Project">
            <div class="project-box past">
                <h3>Past Project</h3>
                <p><?php echo $completeProject ?></p>
                <button class="btn-color"><a target="_self" style="text-decoration:none;color:black;" href="../Project-type/completed.php">See All</a></button>
            </div>
            <div class="project-box current">
                <h3>Ongoing Project</h3>
                <p><?php echo $ongoingProject ?></p>
                <button class="btn-color"><a target="_self" style="text-decoration:none;color:black;" href="../Project-type/ongoing.php">See All</a></button>
            </div>
            <div class="project-box upcoming">
                <h3>Upcoming Project</h3>
                <p><?php echo $upcomingProject ?></p>
                <button class="btn-color"><a target="_self" style="text-decoration:none;color:black;" href="../Project-type/upcoming.php">See All</a></button>
            </div>
        </section>

        <!--  -->
            
        <!--  -->
        
        <br>
        <div class="main-container">
            <div class="slideshow-container">
            <?php
                $sqlProjectShow = "SELECT * FROM project ORDER BY RAND() LIMIT 5";
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
                    $StDate = date('d-m-Y', strtotime($StartDate));
                    $EDate = date('d-m-Y', strtotime($EndDate));
                    $StartDate = date('d M, Y', strtotime($StartDate));
                    $EndDate = date('d M , Y', strtotime($EndDate));
                    // echo gettype($StartDate);
                    // echo $StartDate;
                    
                    $currentDate = date('d-m-Y');
                    $count= 1;
                    
                    $content = $Description;
                    $link= "../ProjectView/fullpageProject.php";
                    $limit= "200";
            ?>

            <!--  -->
            <div class="mySlides fade">
            <div class="container">
            <div class="flex-header">
                <div class="sectionBg"style="background:url('../ProjectPost/serverData/PostData_<?php echo $Projectid ?>/img/img_1.jpg');background-position: center;background-size: cover;">
                </div>
                <div>
                    <h2 class="Project-title"><?php echo $Projecttitle ?></h2>
                    <p class="desp"><?php echo readMore($content,$link,"id",$id,$limit)?></p>
                </div>
            </div>
            <div class="Info">
                <p class="orange big"><?php echo $CompanyName ?></p>
                <p><span class="orange">Location: <span> <?php echo $District ?> ,<?php echo $State ?> (<?php echo $Pincode ?>)</p>
                <p><span class="orange">Budget: </span> <?php echo $Budget ?></p>
            </div>
            <div class="foot ">
                <p style="display: inline-block; margin-top: 8px;"><?php echo $StartDate ?> - <?php echo $EndDate ?></p>
                <div class="float">
                    <a href="../ProjectPost/serverData/PostData_<?php echo $id ?>/pdf/pdf_1.pdf" download ><i class="fa fa-file-pdf-o" style="font-size: 20px; color:white"></i></a>
                    <?php
                        if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) > strtotime($EDate)){
                    ?>
                        <div class="status-completed">Complete Project</div>
                    <?php
                        }else if(strtotime($currentDate) > strtotime($StDate) && strtotime($currentDate) < strtotime($EDate)){
                    ?>
                        <div  class="status-ongoing">ongoing</div>
                    
                    <?php
                        }else {
                    ?>
                        <div class="status-upcoming">Upcomming</div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        
                    </div>
        <!--  -->
        <?php
    }   
    function readMore($content,$link,$var,$id, $limit) {
        $content = substr($content,0,$limit);
        $content = substr($content,0,strrpos($content,' '));
        $content = $content." <a href='$link?$var=$id' id='myBtn'>Read More...</a>";
        return "<br>".$content;
    }
    ?>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</div>
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
<span class="dot" onclick="currentSlide(4)"></span>
<span class="dot" onclick="currentSlide(5)"></span>
</div>
<section class="video">
            <h3 class="videoTitle">Watch us on youtube</h3>
            <iframe  class="mobile"style="width:100%;height:25rem" src="https://www.youtube.com/embed/-q6qQL0JLgs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
        </section>
        <footer class="light">
            <i class="fa fa-facebook-official hov"></i>
            <i class="fa fa-instagram hov"></i>
            <i class="fa fa-snapchat  hov"></i>
            <i class="fa fa-pinterest-p  hov"></i>
            <i class="fa fa-twitter  hov"></i>
            <i class="fa fa-linkedin hov"></i>
            <p class="text-center light" style="font-size: 15px;padding: 0; margin:0;">Copyright Reserved &copy; 2022</p>
        </footer>
    </main >
    <script>
        let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
    </script>
    <script src="main.js"></script>
</body>
</html>