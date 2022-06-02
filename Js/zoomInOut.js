var img = document.getElementById("pokemonImg");       
var counter = 4;     
                                 
function zoomIn(){                                  
    counter += 1;                                   
    img.style.transform += "scale(1.1)";            
    img.style.transition = "transform 0.25s ease";  

    if (counter>10){                                
        resizeReset();                              
        counter = 4;                                
    }                  
}

function zoomOut(){
    counter -= 1;
    img.style.transform += "scale(0.9)";
    img.style.transition = "transform 0.25s ease";

    if (counter<1){
        resizeReset();
        counter = 4;
    }
}

function resizeReset() {
    img.style.transform = "scale(1)";
    img.style.transition = "transform 0.25s ease";
    counter = 3;
}

