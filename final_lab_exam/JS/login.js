function loginValidation() 
{
    let username = document.getElementById("user_name").value;
    let password = document.getElementById("pass").value;

    if(username === "") 
    {
        alert("User name can not be Empty!");
        return false;
    }
    
    if(password === "") 
    {
        alert("Password can not be Empty!");
        return false;
    }

    return true;
}
