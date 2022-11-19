<?php
require_once '../config/connection.php';
$name = $_POST['name'];
$description = $_POST['description'];
$start_date = $_POST['from'];
$end_date = strtotime($_POST['to']);
$company_name= $_POST['companyname'];
$budget = $_POST['budget'];
$state = $_POST['state'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$location = $_POST['location'];
$end_date = date('Y-m-d', $end_date);
$start_date = date('Y-m-d', strtotime($start_date));


$lastquery = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'project' ORDER BY 'auto_increment' DESC LIMIT 1;";

$run= mysqli_query($conn,$lastquery);
$row = mysqli_fetch_array($run);
$sno = $row['auto_increment'];

$imgCount = 0;
$pdfCount = 0;

chdir('./serverData');
$current_dir = getCwd();
echo $current_dir;

if(!is_dir($current_dir.'PostData_'.$sno)){
    mkdir('PostData_'.$sno.'/img', 0777, true);
    mkdir('PostData_'.$sno.'/pdf', 0777, true);
}

$allowed_types = array('jpg', 'JPG');
     
    // Define maxsize for files 
    $maxsize = 12 * 1024 * 1024;
 
    // Checks if user sent an empty form
    if(!empty(array_filter($_FILES['images']['name']))) {
 
        // Loop through each file in files[] array
        foreach ($_FILES['images']['tmp_name'] as $key => $value) {
             
            $file_tmpname = $_FILES['images']['tmp_name'][$key];
            $file_name = $_FILES['images']['name'][$key];
            $file_size = $_FILES['images']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
 
            // Set upload file path
            $filepath = "PostData_".$sno."/img/img_".strval(intval($key)+1).".".$file_ext;
 
            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {
 
                // Verify file size 
                if ($file_size > $maxsize)        
                    echo "Error: File size is larger than the allowed limit.";
 
                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                if(file_exists($filepath)) {
                    $filepath = $upload_dir.time().$file_name;
                     
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                        $imgCount++;
                    }
                    else {                    
                        echo "Error uploading {$file_name} <br />";
                    }
                }
                else {
                 
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                        $imgCount++;
                    }
                    else {                    
                        echo "Error uploading {$file_name} <br />";
                    }
                }
            }
            else {
                 
                // If file extension not valid
                echo "Error uploading {$file_name} ";
                echo "({$file_ext} file type is not allowed)<br / >";
            }
        }
    }
    else {
         
        // If no files selected
        echo "No files selected.";
    }


$allowed_types = array('pdf','PDF');
    //pdf
    if(!empty($_FILES['pdf']['name']) && !empty($_FILES['pdf']['tmp_name'])) {
 
        // Loop through each file in files[] array
        echo $_FILES['pdf']['name'];
        // foreach ($_FILES['pdf']['tmp_name'] as $key => $value) {
             
            $file_tmpname = $_FILES['pdf']['tmp_name'];                                         
            $file_name = $_FILES['pdf']['name'];
            $file_size = $_FILES['pdf']['size'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
 
            // Set upload file path
            $filepath = "PostData_".$sno."/pdf/pdf_1.".$file_ext;
 
            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {
 
                // Verify file size - 2MB max
                if ($file_size > $maxsize)        
                    echo "Error: File size is larger than the allowed limit.";
 
                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                if(file_exists($filepath)) {
                    $filepath = $upload_dir.time().$file_name;
                     
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                        $pdfCount++;
                    }
                    else {                    
                        echo "Error uploading {$file_name} <br />";
                    }
                }
                else {
                 
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                        $pdfCount++;
                    }
                    else {                    
                        echo "Error uploading {$file_name} <br />";
                    }
                }
            }
            else {
                 
                // If file extension not valid
                echo "Error uploading {$file_name} ";
                echo "({$file_ext} file type is not allowed)<br / >";
            }
        // }
    }
    else {
         
        // If no files selected
        echo "No files selected.";
    }

    echo $start_date;
    echo $end_date;

    $sql = "INSERT INTO `project`(`Name`, `Description`, `StartDate`, `EndDate`, `CompanyName`, `Budget`, `State`, `District`, `Pincode`, `location`, `image`, `pdf`) VALUES ('$name','$description','$start_date','$end_date','$company_name','$budget','$state','$district','$pincode','$location','$imgCount','$pdfCount')";

    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Project Added Successfully');</script>";
        echo "<script>location.href='./main.html';</script>";
    }
    else{
        echo "Error".mysqli_error($conn);
        echo "<script>alert('Error Adding Project');</script>";
    }

?>