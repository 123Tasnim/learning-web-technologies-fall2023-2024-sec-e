function checkLogin(){
    var hasError = false;

    if(document.getElementById('user').value == ''){
        document.getElementById('userError').innerHTML="Please Write Username";
        hasError = true;
    }
    else{document.getElementById('userError').innerHTML="";}
        
    if(document.getElementById('pass').value == ''){
        document.getElementById('passError').innerHTML='Please Write Password';
        hasError = true;
    }
    else{document.getElementById('passError').innerHTML='';}

    return !hasError;
} 