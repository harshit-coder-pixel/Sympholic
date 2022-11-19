<?php
    require './config/session.php';
    $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Change Password</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato:wght@300&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Lato', sans-serif;
    flex-wrap: wrap;
}
:root{
    --contianer-bgcolor: #e0e0e0;
    --heading-color: rgb(0, 0, 0);
    --heading-underline-color: #000000;
    --section-heading-font-size: 1.5rem;
    --section-heading-color: rgba(0, 0, 0, 0.77);
    --section-heading-margin-left: 2.5rem;
    --floating-label-color: rgba(0, 0, 0, 0.797);
    --input-box-label-color: #ffffff;
    --border-radius: 6px;
    --flex-gap: 1rem;
    --label-top-gap:1rem;
    --btn-submit: #5195EA;
}
.main-contianer{
    max-width: 80%;
    margin: 20px auto;
    /* box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; */
    background: var(--contianer-bgcolor) !important;
    padding: 30px;
    border-radius: 10px;
}
.heading{
    position: relative;
    display: block;
    padding: 0px 0px 10px 0px;
    padding: 30px;
    font-weight: 500;
    text-decoration: none;
    transition: .35s ease;
    border-bottom: 3px solid transparent;
    font-size: 48px;
    color: var(--heading-color);
    font-family: 'Times New Roman', Times, serif;
}
.heading:after {
    position: absolute;
    display: inline-block;
    background: var(--heading-underline-color);
    content: " ";
    height: 0;
    transition: 1s ease;
    bottom: 0;
    width: 200px;
    height: 3px;
    margin: 100px 30px 15px 30px;
    left: 0;
    transform: none;
    /* box-shadow: 1px 1px 10px var(--heading-underline-color); */
}
.section-heading{
    font-size: var(--section-heading-font-size);
    font-weight: 500;
    margin-left: var(--section-heading-margin-left) ;
    color: var(--section-heading-color);
    font-family: 'Times New Roman', Times, serif;
}
.form{
    margin: 10px 20px auto;  
}
*:focus{
    outline: #5195EA 1px solid ;
}
.floating-form{
    position: relative;
    flex: 1;
}
.floating-label {
    position: absolute;
    pointer-events: none;
    left: 20px;
    top:15px;
    transition: 0.2s ease all;
    color: var(--floating-label-color);
    font-size: 150%;
}
input[type="text"],
input[type="Email"],
input[type="date"],
input[type="number"],
input[type="password"],
select,
textarea
{
    width: 100%;
    padding: 25px 20px 5px 20px;
    border-radius: var(--border-radius);
    font-size: 140%;
    border: none;
    color: rgb(0, 0, 0);
    background-color: var(--input-box-label-color);
}
input:focus ~ .floating-label,
input:not(:focus):valid ~ .floating-label,
textarea:focus ~ .floating-label,
textarea:not(:focus):valid ~ .floating-label
{
    top: 3px;
    bottom: 10px;
    left: 22px;
    font-size: 15px;
    opacity: 1;
    color: #000000;   
}
.non-floating-label{
    position: absolute;
    top: 3px;
    bottom: 10px;
    left: 22px;
    font-size: 15px;
    opacity: 1;
    color:#000000;  
}
.form-flex{
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: space-between;
    gap:var(--flex-gap);
}
.top-margin{
    margin-top: var(--label-top-gap);
}
input[type=date]{
    padding: 25px 20px 3px 20px;
    color-scheme: dark;
    color: var(--floating-label-color);
}
select{
    padding: 25px 20px 5px 20px;
    color-scheme: dark;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1em;
    color: var(--floating-label-color);
}
.top-margin-30px{
    margin-top: 30px;
}
.btn-submit{
    background-color: var(--btn-submit) ;
    color: #fff;
    padding: 13px 50px;
    border-radius: var(--border-radius);
    font-weight: 500;
    font-size: 120%;
    cursor: pointer;
    transition: .35s ease;
    border: none;
    outline: none;
    width: 18%;
}
.right{
    display: flex;
    justify-content: right;
}
.fa{
    position: absolute;
    right: 20px;
    font-size: 1.5rem;
    color: #000000;
    top: 15px;
} 
@media screen and (max-width:700px) {
    .form-flex{
        flex-direction: column;
        /* align-item: full; */
    }
    input[type="text"]{
        width:100%;
    }
    .main-contianer{
        padding:3px;
    }
    .btn-submit{
        width: 100%;
    }
    .fa{
        top:50%;
        right:5px;
        transform: translateY(-50%);
        font-size: 1.2rem;
    }
    .floating-form{
        width: 100%
    }
}
</style>
</head>
<body>
    <form action="./php/passwordchange.php" onsubmit="val1(event)" method="POST">
    <section class="main-contianer">
        <h2 class="heading">Change your Password</h2>
        <!-- <h4 class="section-heading">Change your Password</h4> -->
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form">
            <div class="top-margin">
                <div class="floating-form">
                    <input type="password" name="o_pass" id="old_password" required>
                    <label for="" class="floating-label">Old Password</label>
                    <i class="fa fa-eye-slash" id="1" onclick="eye1()"></i>
                </div>
            </div>
            <div class="form-flex top-margin">
                <div class="floating-form">
                    <input type="password" name="n_pass" id="new_password" required>
                    <label for="" class="floating-label">New Password</label>
                    <i class="fa fa-eye-slash" id="2" onclick="eye2()"></i>

                </div>
                <div class="floating-form">
                    <input type="password" name="c_pass" id="confirm_password" required>
                    <label for="" class="floating-label">Confirm New Password</label>
                    <i class="fa fa-eye-slash" id="3" onclick="eye3()"></i>

                </div>
            </div>
            <div class="right">
                <button type="submit"name="submit" value="submit"class="btn-submit top-margin-30px">Change</button>
            </div>            
        </div>

        </section>
        </form>
        <script>
            var old_password = document.getElementById('old_password');
            var new_password = document.getElementById('new_password');
            var confirm_password = document.getElementById('confirm_password');
            
            function eye1(){
                var eye= document.getElementById("1");
                if(old_password.type=="password"){
                    old_password.type="text";
                    eye.setAttribute("class","fa fa-eye");
                }
                else
                {
                    old_password.type="password";
                    eye.setAttribute("class","fa fa-eye-slash");
                }
            }

                function eye2(){
                    var eye= document.getElementById("2");
                    var pass= document.getElementById("new_password");
                    if(pass.type=="password"){
                        pass.type="text";
                        eye.setAttribute("class","fa fa-eye");
                    }
                    else
                    {
                        pass.type="password";
                        eye.setAttribute("class","fa fa-eye-slash");
                    }
                }
                function eye3(){
                    var eye= document.getElementById("3");
                    var pass= document.getElementById("confirm_password");
                    if(pass.type=="password"){
                        pass.type="text";
                        eye.setAttribute("class","fa fa-eye");
                    }
                    else
                    {
                        pass.type="password";
                        eye.setAttribute("class","fa fa-eye-slash");
                    }
                }
            function val1(e){
                if(old_password.value==new_password.value){
                    e.preventDefault();
                    alert("Old password and new password must not be same");
                }
                else if(new_password.value.length<8){
                    e.preventDefault();
                    alert("Password must be atleast 8 characters long");
                }
                else if(new_password.value.includes(" ")){
                    e.preventDefault();
                    alert("Password must not contain spaces");
                }
                
                else if(!new_password.value.match(/[A-Z]/g)){
                    e.preventDefault();
                    alert("Password must contain atleast one Uppercase letter");
                }
                else if(!new_password.value.match(/[0-9]/g)){
                    e.preventDefault();
                    alert("Password must contain atleast one number");
                }
                else if(!new_password.value.match(/[!@#$%^&*]/g)){
                    e.preventDefault();
                    alert("Password must contain atleast one special character");
                }
                else if(new_password.value!=confirm_password.value){
                    e.preventDefault();
                    alert("Password not matched");
                }   
               
            }   
        </script>
</body>
</html>