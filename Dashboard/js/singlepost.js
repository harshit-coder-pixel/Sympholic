// Function To Display Random img in the Div
//==========================================================================================================================
function randomImg()
{
    let images=['./assests/img2.webp','./assests/img3.webp','./assests/img4.webp','./assests/img5.webp','./assests/img6.webp','./assests/img7.webp','./assests/img8.webp','./assests/img9.webp','./assests/img10.webp','./assests/img11.webp','./assests/img12.webp','./assests/img13.webp','./assests/img14.webp','./assests/img15.webp','./assests/img16.webp','./assests/img17.webp','./assests/img18.webp','./assests/img19.webp']
    let arrsize = images.length;
    let random = Math.floor(arrsize * Math.random());
    let img_element = document.getElementsByClassName('random-background');
    img_element[0].style.backgroundImage = 'url('+images[random]+')';
}
document.addEventListener("DOMContentLoaded", randomImg);
// Ends here
//==========================================================================================================================

