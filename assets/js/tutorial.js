let tutorial = document.getElementById('tutorialImage');
if (tutorial != null){
    let curIndex= 0;
    
    const imgs = document.querySelectorAll('.tutorial');
    const previous = document.getElementById('previous');
    const next = document.getElementById('next');
    const goGarden = document.getElementById('goGarden');
    
    previous.addEventListener("click",  previousPicture);
    next.addEventListener("click",  nextPicture);
    
    console.log(imgs.length);
    
    function nextPicture(){
        if(curIndex+1 == (imgs.length-1)){
            goGarden.classList.add('show');
            console.log("add");
        }

        if(curIndex+1 >  (imgs.length-1)){
            curIndex =  (imgs.length-1);
            imgs[curIndex].classList.add('active');
            return;
        } 
        
        if (curIndex < imgs.length){
            imgs[curIndex].classList.remove('active');
            imgs[(curIndex+1)%imgs.length].classList.add('active');
            curIndex = (curIndex + 1) % imgs.length;
        }
    
        
        console.log(curIndex);
    }
    
    function previousPicture(){
        console.log("previous");
        imgs[curIndex].classList.remove('active');
        if (curIndex - 1 < 0){
            curIndex = 0;
            imgs[0].classList.add('active');
        } else {
            curIndex--;
            console.log((curIndex) % imgs.length);
            imgs[(curIndex) % imgs.length].classList.add('active');
        
        }
        
    }

    
}

