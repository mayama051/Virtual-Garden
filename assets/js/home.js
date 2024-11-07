/* Sourcecode example for Slides */
/* https://www.w3schools.com/howto/howto_js_slideshow.asp */

let home = document.getElementById('home');
if (home != null){
    
    let slideIndexHome = 1;

    const pre = document.getElementById('prev');
    const nex = document.getElementById('next');
    pre.addEventListener("click",  plusSlides(-1));
    nex.addEventListener("click",  plusSlides(1));

    showSlides(slideIndexHome);

    function plusSlides(n) {
        showSlides(slideIndexHome += n);
    }

    function currentSlide(n) {
        showSlides(slideIndexHome = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        
        if (n > slides.length) {
            slideIndexHome = 1;
        }
        if (n < 1) {
            slideIndexHome = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        
        slides[slideIndexHome-1].style.display = "block";
   
    }
}

