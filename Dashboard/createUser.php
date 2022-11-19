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
    /* align-items: flex-start; */
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
    color-scheme: light;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
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
}
</style>
</head>
<body>
    <form action="./php/create.php" onsubmit="val1(event)" method="POST" autocomplete="off">
    <section class="main-contianer">
        <h2 class="heading">Add User</h2>
        <!-- <h4 class="section-heading">Change your Password</h4> -->
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form">
             <div class="form-flex top-margin">
                <div class="floating-form">
                    <input type="text" name="fname" id="fname" required>
                    <label for="" class="floating-label">First Name</label>
                </div>
                <div class="floating-form">
                    <input type="text" name="lname" id="lname" required>
                    <label for="" class="floating-label">Last name</label>
                </div>
            </div>
            <div class="top-margin">
                <div class="floating-form">
                    <input type="text" name="username" id="user"  required>
                    <label for="" class="floating-label">Username</label>
                </div>
            </div>
            <div class="top-margin">
                <div class="floating-form">
                    <input type="email" name="email" id="email" required>
                    <label for="" class="floating-label">Email</label>
                </div>
            </div>
            <div class="form-flex top-margin">
            <div class="floating-form">
                    <select name="role" require>
                        <option value="" selected disabled>Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="user">User</option>
                    </select>
                    <label for="" class="non-floating-label">Role</label>
            </div>
                <div class="floating-form">
                    <input type="password" name="password" id="new_password" required>
                    <label for="" class="floating-label">New Password</label>
                    <i class="fa fa-eye-slash" id="1" onclick="eye1()"></i>
                </div>
           
            </div>
            <div class="right">
                <button type="submit"name="submit" value="submit"class="btn-submit top-margin-30px">Submit</button>
            </div>            
        </div>

        </section>
        </form>
        <script>
            var new_password = document.getElementById('new_password');
            
            function eye1(){
                var eye= document.getElementById("1");
                if(new_password.type=="password"){
                    new_password.type="text";
                    eye.setAttribute("class","fa fa-eye");
                }
                else
                {
                    new_password.type="password";
                    eye.setAttribute("class","fa fa-eye-slash");
                }
            }
            function val1(e){
                if(new_password.value.length<8){
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
            }   
            function makeid(length) {
                    var result           = '';
                    var characters       = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    var charactersLength = characters.length;
                    for ( var i = 0; i < length; i++ ) {
                    result += characters.charAt(Math.floor(Math.random() * 
                charactersLength));
                }
                return "sym_"+result;
            }
            var user=document.getElementById('user');
            user.value=makeid(6);
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }   
        </script>
</body>
</html>