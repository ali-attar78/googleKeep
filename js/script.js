function nightmode() {
    var mybody = document.body;
    var image = document.getElementById("myImage");
    
    if(image.getAttribute('src')=="image/moon.png")
    {
        mybody.classList.toggle("darkmode") ;
        image.src="image/sun.png";
    }
    else if(image.getAttribute('src')=="image/sun.png")
    {        
        mybody.classList.toggle("lightmode") ;
        image.src="image/moon.png";
    }
 }