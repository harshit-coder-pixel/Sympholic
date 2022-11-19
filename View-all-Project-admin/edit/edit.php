<?php
    require_once '../../config/connection.php';
    if(isset($_GET['id']))
    {
        $sql = "SELECT * FROM project WHERE sno = '$_GET[id]'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['Name'];
        $desp = $row['Description'];
        $start_date = $row['StartDate'];
        $end_date = $row['EndDate'];
        $start_date = date('m/d/Y', strtotime($start_date));
        $end_date = date('m/d/Y', strtotime($end_date));
        $company= $row['CompanyName'];
        $Budget = $row['Budget'];
        $state = $row['State'];
        $district = $row['District'];
        $pincode = $row['Pincode'];
        $location = $row['location'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Simpholic-Project Post</title>
</head>
<body onload='call("<?php echo"$state"?>","<?php echo"$district"?>")'>    
    <div class="contianer">
        <form method="post" action="pushupdate.php" enctype="multipart/form-data" autocomplete="off" onsubmit="checksub(event)" >
            <input type="hidden" name="id" value="<?php echo $row['sno'] ?>">
            <h1 class="heading">Post Project</h1>
            <div class="form">
                <div class="floating-form">
                    <input type="text" name="name" id="postTitle" value="<?php echo $title ?>" required>
                    <label for="" class="floating-label">Post Title</label>
                </div>
                <div class="floating-form margin-20">
                    <textarea cols="30" rows="12" name="description" id="postDescription" value="" required><?php echo $desp; ?></textarea>
                    <label for="" class="floating-label">Description of the project</label>
                </div>
                <h2 class="section-heading margin-20">Project Duration</h2>
                <div class="date margin-20">
                    <div class="form-flex">
                        <div class="floating-form">
                            <input type="text" id="from" name="from" autocomplete="off"  value="<?php echo $start_date ?>"required>
                            <label for="from" class="font-18 floating-label">From</label> 
                        </div>
                        <div class="floating-form">
                            <input type="text" id="to" name="to" autocomplete="off" value="<?php echo $end_date ?>"required>
                            <label for="to" class="floating-label">To</label>
                        </div>
                </div>
            </div>
            <h2 class="section-heading margin-20">Important Details</h2>
            <div class="margin-10">
                <div class="form-flex">
                    <div class="floating-form">
                        <input type="text" name="companyname" id="companyName" value="<?php echo $company ?>" required>
                        <label for="" class="floating-label">Company Name</label>
                    </div>
                    <div class="floating-form">
                        <input type="number" name="budget" id="budget" value="<?php echo $Budget ?>"required>
                        <label for="" class="floating-label">Project Budget</label>
                    </div>
                </div>
                <h3 class="sub-section-heading margin-20" >Project Location</h3>
                <div class="form-flex margin-10">
                    <div class="floating-form">
                    <select name="state" id="state" required>
                        <option value="" <?=$state== '' ? ' selected="selected"' : '';?> disabled="true" onchange="">Select your State</option>
                    </select>
                        <label for="state" class="non-floating-label">State</label>
                    </div>
                    <div class="floating-form">
                        <select name="district" id="district" required>
                            <option value="" selected="true" disabled="true">Select Your District</option>
                        </select>
                        <label for="District" class="non-floating-label">District</label>
                    </div>
                </div>
                <div class="form-flex margin-10">
                    <div class="floating-form">
                        <input type="number" name="pincode" id="pincode" value="<?php echo $pincode; ?>" onchange="verifyPincode(event)" required>
                        <label for="" class="floating-label">Pincode</label>
                    </div>
                    <div class="floating-form">
                        <input type="text" name="location" id="location" value="<?php echo $location; ?>" readonly>
                        <label for="" class="non-floating-label">Location</label>
                    </div>
                </div>
            </div>
            <h3 class="section-heading margin-20">Relative document</h3>
            <!-- <h4 class="margin-20 sub-section-heading">Hold <kbd>Ctrl</kbd> to Upload Multiple images</h4> -->
            <div>
                <label for="" class="document-label">Related Image</label>
                <span style="margin-left:40px;margin-bottom: 10px;">*Please Upload JPG only</span>
                <br>
                <br>
                <input type="file" src="" alt="" name="images[]" id="upload_file" onchange="preview_image();" multiple accept=".jpg">
                <div id="image_preview"></div>
            </div>
            <div>
                <label for="" class="document-label">Related File PDF</label>
                <input type="file" name="pdf" src="" alt="" id="pdf_file" accept=".pdf">
            </div>
            
        </div>
        <button type="submit" name="submit"value="UPLOAD" class="submit-button" id="submit">Submit</button>
    </form>
    </div>
<?php
    }
?>
    <script src="main.js"></script>
</body>
</html>