function OpenNav(){
    document.getElementById("Sidenav").style.width = "300px";
    // document.getElementById("main").style.marginLeft = "300px";
}
function closeNav(){
    document.getElementById("Sidenav").style.width = "0";
    // document.getElementById("main").style.marginLeft = "0";
}
window.addEventListener('mouseup', function(event){
	var box = document.getElementById('Sidenav');
	if (event.target != box && event.target.parentNode != box){
        box.style.width = 0;
        // document.getElementById("main").style.marginLeft = "0";
    }
});
