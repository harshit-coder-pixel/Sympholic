var pass=document.getElementById("password");
function eye(){
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