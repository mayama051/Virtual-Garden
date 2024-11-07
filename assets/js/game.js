/* Code inspired from https://www.youtube.com/watch?v=OHTudicK7nY */
let games = document.getElementById('games');
if (games != null) {
    let draggableElement = document.querySelectorAll(".dragable-items");
    let score = 0;
    let count = 0;
    const yes = ["donut", "corn", "egg", "eggshell", "fish"];
    const no = ["oil", "rock"];

    document.getElementById("score-ingame").innerHTML = score;

    for (let i = 0; i < draggableElement.length; i++) {
        draggableElement[i].addEventListener("dragstart", e => {
            console.log(e);
            e.dataTransfer.setData("text/plain", draggableElement[i].id);
        });
    }
    
    // draggableElement.addEventListener("dragstart", e => {
    //     console.log(e);
    //     e.dataTransfer.setData("text/plain", draggableElement.id);
    // });

    for (const dropZone of document.querySelectorAll(".bin")) {
        dropZone.addEventListener("dragover", e=> {
            //console.log("dcode");
            e.preventDefault();
            dropZone.classList.add("bin--over");
        });

        dropZone.addEventListener("dragleave", e=> {
            dropZone.classList.remove("bin--over");
        });

        dropZone.addEventListener("drop", e=>{
            e.preventDefault();
            
            const droppedElementId = e.dataTransfer.getData("text/plain");
            const droppedElement = document.getElementById(droppedElementId);

            dropZone.appendChild(droppedElement);
            console.log(droppedElementId);
            dropZone.classList.remove("bin--over");
            console.log(dropZone.id);

            if(dropZone.id == "yes-bin") {
                if(yes.includes(droppedElementId)) {
                    score++;
                    document.getElementById("score-ingame").innerHTML = score;
                }
            }
            if(dropZone.id == "no-bin") {
                if(no.includes(droppedElementId)) {
                    score++;
                    document.getElementById("score-ingame").innerHTML = score;
                }
            }
            console.log(score);
            count++;
            if(count == 7) {
                document.getElementById("score").innerHTML = score;
                showPopup();
            }
        });
    }
    

    let startPopup = document.getElementById("start-popup");
    let resultPopup = document.getElementById("result-popup");


    function closePopup1() {
        startPopup.classList.add("close-start");
    }

    function showPopup() {
        resultPopup.classList.add("result-show");
        document.cookie = "points="+score;
    
        console.log("enter");
    }
    function closePopup2() {
        resultPopup.classList.remove("result-show");
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }




}
