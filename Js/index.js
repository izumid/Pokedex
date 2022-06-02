function showLogin(a, b, c){
    
    if (c == 'true'){
        location.href = "adminPanel.php"; 
    }
    else{
        x = document.getElementById(a);
        y = document.getElementById(b);

        x.style.zIndex ='100';
        x.style.opacity ='1';
        y.style.marginTop = "0vh";
    }
}

function hideLogin(a, b){
    x = document.getElementById(a);
    y = document.getElementById(b);
    
    y.style.marginTop = "-200vh";

    x.style.zIndex ='1';
    x.style.opacity ='0';
}

