<?php
    require_once ('../conn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `schemes` WHERE `Sno` = '$id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_array($result))
        {
            $id = $row['Sno'];
            $title = $row['title'];
            $description = $row['desp'];
            $buttonCondtion = $row['buttonC'];
            $buttonText = $row['buttonText'];
            $buttonLink = $row['buttonLink'];
            echo "<script> var id = '$id'
                console.log(id);
            </script>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>  
    <!-- <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script> -->
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.9/adapters/jquery.js"></script>
    <link rel="stylesheet" href="./edit.css">
    <script defer src="update.js"></script>
    <title>Post scheme</title>
</head>
<body>
    <div class="container-main">
        <main>
            <form autocomplete="off">
                <section>
                    <h2 class="page-title">Edit Scheme</h2>
                    <div class="form-float scheme-title">
                        <input type="text" class="inputText" id="schemeTitle" value="<?php echo $title ?> " required/>
                        <label class="floating-label">Title of the scheme</label>
                    </div>
                    <div class="form-float scheme-des">
                        <label>Description of scheme</label>
                        <textarea name="content" class="inputText" id="schemeDesc" cols="20" rows="10" name="desc" placeholder=" "><?php echo $description ?> </textarea>
                      </div>
        
                      <div class="button-check ">
                          <p>Want to show any button in end of scheme?</p> 
                          <label>
                              <input type="checkbox" id="btn" value="ybtn" name="show_btn" onchange="show()">
                              <span>
                                  <i></i>
                                </span>
                            </label>
                        </div>
                       
                        <div class="flex-btn" id="btn-show-hide">
                            <div class="form-group btn-add ">
                                <input type="text" class="form-control" placeholder=" " id="btn-label" value="<?php echo $buttonText; ?>">
                                <label class="form-control-placeholder" >Button text</label>
                            </div>
                            <div class="form-group btn-add-link">
                                <input type="text" class="form-control" placeholder=" " id="btn-link" value="<?php echo $buttonLink;?>">
                                <label class="form-control-placeholder">Button link</label>
                            </div>
                        </div>
                    </section>
                    <section style="display:none">
                        <div class="button-check">
                            <p>Show post to only selected user groups</p> 
                            <label>
                                <input type="checkbox" id="condtionbtn" value="" name="" onchange="cshow()" >
                                <span>
                                    <i></i>
                                </span>
                            </label>
                        </div>
                    </section>
                    <?php
                        if($buttonCondtion == "true")
                        {
                            echo "<script>
                                $('#btn').prop('checked', true);
                                var btn = document.getElementById('btn');
                                var main = document.getElementById('btn-show-hide')
                                if (btn.checked) {
                                    main.style.display = 'flex';
                                } else {
                                    main.style.display = 'none';
                                }
                                 </script>";
                                }

                        ?>
                    <section id="condtion-section" class="animated-box in">
                        <h2 class="conditon-title">Conditions for scheme eligibility</h2>
                        
                        <div class="container">
                            <p>States and Districts:</p>
                            <div class="custom-checkbox">
                        <input type="checkbox" onchange="locationhide()" id="locationbtn" >
                        <div class="checkbox-btn"></div>
                        
                    </div>
                </div>
                
                <div id="location-section">
                    <div class="ui-widget">
                        <div class="searchbar">
                            <input type="text" id="tags" placeholder="Search for a state...">
                            <button type="button" id="add-btn-data" onclick="addstate()">+</button>
                        </div>
                        <div id="states-input">
                        </div>
                        <button id="clear-all" type="button" onclick="deleteall()">Clear</button>
                        <button id="clear-last" type="button" onclick="deletelast()">Delete last</button>
                        <div class="r1" id="">
                            <input type="radio" name="states" data-waschecked="true" value="allut"><span class="radio-title">All UT</span>
                            <input type="radio" name="states" data-waschecked="true" value="nout"><span class="radio-title">Expect UT</span>
                            <br>
                            <input type="radio" name="states" data-waschecked="true" id="except-state" value="except-state"><span class="radio-title">Except selected States</span>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <p>Reservation Category:</p>
                    <div class="custom-checkbox">
                        <input type="checkbox" onchange="reservation()" id="reser" >
                        <div class="checkbox-btn"></div>
                    </div>
                </div>
                
                
                <div id="dropdowncat">
                    <span class="select-info">Press or Hold <kbd>Ctrl</kbd> to select multiple</span>
                    <select id="category" class="select-mul" required multiple size="5">
                        <option value="GC">GC</option>
                        <option value="ST">ST</option>
                        <option value="OBC">OBC</option>
                        <option value="SC">SC</option>
                        <option value="other">other</option>
                    </select>
                    <div class="selectedLabel">
                        <span style="color: red;">You have Selected: &nbsp;</span><span id="show-cat"></span>
                    </div>
                </div>
                <div class="container">
                    <p>Gender:</p>
                    <div class="custom-checkbox">
                        <input type="checkbox" onchange="usergenhide()" id="usergenbtn" >
                        <div class="checkbox-btn"></div>
                    </div>
                </div>
                <div id="dropgen">
                    <span class="select-info">Press or Hold <kbd>Ctrl</kbd> to select multiple</span>
                    <select name="" id="genvalselected" size="3" multiple>
                        <!-- <option value="" selected="true" disabled>select user Gender</option> -->
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="selectedLabel">
                        <span style="color: red;">You have Selected: &nbsp;</span><span id="gender-selected"></span>
                    </div>
                </div>
                <div class="container">
                    <p>Age:</p>
                    <div class="custom-checkbox">
                        <input type="checkbox" onchange="agebtnshow()" id="agebtn" >
                        <div class="checkbox-btn"></div>
                    </div>
                </div>
                <div id="ageshow">
                    <div id="slider-range" style="padding: 0;"></div><br>
                    <span style="color: red; font-size:130%;">Condition: </span><input type="text" id="amount" readonly style="border:0;width: 100%;"><br><br>
                    <div id="output"></div>
                </div>
            </form>    
                
            </section>
            <section class="submitcont">
                <button type="button" class="submitbtn" id="save"  onclick="save()">Update</button>
            </section>
        </main>
        
                    
    </div>
    <!-- <script src="../ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('schemeDesc');
        </script> -->
    <!-- <script src="../ckeditor/ckeditor.js"></script> -->
    
    <!-- <button class="btn btn-dark">class</button> -->
</body>
</html>