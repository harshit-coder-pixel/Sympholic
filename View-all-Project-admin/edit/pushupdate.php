<?php
    require '../../config/connection.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $start_date = $_POST['from'];
    $end_date = $_POST['to'];
    $company_name= $_POST['companyname'];
    $budget = $_POST['budget'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $pincode = $_POST['pincode'];
    $location = $_POST['location'];
    $end_date = date('Y-m-d', strtotime($end_date));
    $start_date = date('Y-m-d', strtotime($start_date));
    
    $lastquery = "SELECT * FROM project WHERE sno = '$id'";
    $run= mysqli_query($conn,$lastquery);
    $row = mysqli_fetch_array($run);
    $total_img = $row['image'];
    $imgCount = $total_img;
    $sno = $id;
    chdir('../../ProjectPost/serverData');
    $current_dir = getCwd();
    $path = $current_dir."/PostData_1".$id."/img/";
    $path2 = $current_dir."/PostData_".$id."/pdf/";
    $pdfCount=$row['pdf'];
    $allowed_types = array('jpg', 'png', 'jpeg', 'gif','webp','JPG','PNG','JPEG','GIF','WEBP');
     
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
            $filepath = "PostData_".$sno."/img/img_".strval($imgCount+1).".".$file_ext;
 
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

 if($_FILES['pdf']['name']!='')
    {
    unlink($path2.'/pdf_1.pdf');
    
    $pdf = $_FILES['pdf']['name'];
    $pdfCount=0;
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
    }
    echo $end_date;
    $sql = "UPDATE project SET `Name` = '$name', `Description`='$description', `StartDate` ='$start_date',`EndDate`='$end_date', `CompanyName`='$company_name',`Budget`='$budget',`State`='$state',`District`='$district',`Pincode`='$pincode',`location`='$location',`image`='$imgCount',`pdf`=
    '$pdfCount' WHERE sno = $sno";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Project Updated Successfully');</script>";
        echo "<script>window.location.href='../main.php';</script>";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        echo "<script>alert('Error Updating Project');</script>";
    }

?>