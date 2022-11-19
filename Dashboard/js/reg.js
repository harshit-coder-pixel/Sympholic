var pass=document.getElementById("pass");
var cpass=document.getElementById("cpass");
function eye1(){
    var eye= document.getElementById("1");
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

function eye2(){
    var eye= document.getElementById("2");
    var pass=document.getElementById("cpass");
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

function check(){
    var eye= document.getElementById("1");
    var ceye= document.getElementById("2");
    if(pass.value!=cpass.value ){
        pass.style.borderBottom="1px solid red";
        cpass.style.borderBottom="1px solid red";
        eye.style.color="red";
        ceye.style.color="red";
        return false;
    }
    else{
        pass.style.borderBottom="1px solid #333";
        cpass.style.borderBottom="1px solid #333";
        eye.style.color="#333";
        ceye.style.color="#333";
        return true;
    }
}
function checksub(e){
    var new_password = pass.value;
    if(new_password.length<8){
        e.preventDefault();
        alert("Password must be atleast 8 characters long");
    }
    else if(new_password.includes(" ")){
        e.preventDefault();
        alert("Password must not contain spaces");
    }
    
    else if(!new_password.match(/[A-Z]/g)){
        e.preventDefault();
        alert("Password must contain atleast one Uppercase letter");
    }
    else if(!new_password.match(/[0-9]/g)){
        e.preventDefault();
        alert("Password must contain atleast one number");
    }
    else if(!new_password.match(/[!@#$%^&*]/g)){
        e.preventDefault();
        alert("Password must contain atleast one special character");
    }
    else 
    if(pass.value!=cpass.value){
        e.preventDefault();
        alert("Password and Confirm Password must be same");
    }
}