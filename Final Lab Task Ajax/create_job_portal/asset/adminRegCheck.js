function adminRegValidation() {
    let admin_name = document.getElementById("admin_name").value;
    let admin_cno = document.getElementById("cont_no").value;
    let admin_uname = document.getElementById("uname").value;
    let adminpass = document.getElementById("admin_pass").value;

    let admin_reg_error = [];

   
    if (admin_name === "") 
    {
        admin_reg_error.push("Name cannot be empty.");
    }

   
    if (admin_cno === "") 
    {
        admin_reg_error.push("Contact no cannot be empty."); 
    }

    
    if (admin_uname === "") 
    {
        admin_reg_error.push("Please enter a username.");   
    } 
    else if (admin_uname.length > 8) 
    {
        admin_reg_error.push("Username maximum 8 characters.");
    }

    
    if (adminpass === "") 
    {
        admin_reg_error.push("Password fields must be filled."); 
    }


    
    if (admin_reg_error.length == 0) 
    {
        
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/adminRegCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        let requestBody = 'admin_name=' + admin_name +
        '&admin_cno=' + admin_cno +
        '&admin_uname=' + admin_uname +
        '&adminpass=' + adminpass;

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) 
            {
                
                if(this.responseText.trim() === "success"){
                    window.open("../view/login.php");
                }
                else
                {
                    admin_reg_error.push("Database Connection fail!");
                }
                
            }
        };
        xhttp.send(requestBody);

    }
    else {
       
        let allErrors = admin_reg_error.join('\n');
        alert(allErrors);
    }
}
