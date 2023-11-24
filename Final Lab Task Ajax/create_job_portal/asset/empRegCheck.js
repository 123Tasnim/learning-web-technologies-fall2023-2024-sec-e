function empRegValidation() 
{
    let empname = document.getElementById("emp_name").value;
    let compname = document.getElementById("comp_name").value;
    let emp_cno = document.getElementById("cont_no").value;
    let empuname = document.getElementById("emp_uname").value;
    let emppass = document.getElementById("emp_pass").value;

    let emp_reg_error = [];

    // Name Check.
    if (empname === "") 
    {
        emp_reg_error.push("Employer Name cannot be empty.");
    }

    //Company name Check.
    if (compname === "") 
    {
        emp_reg_error.push("Company Name cannot be empty.");
    }

    // Contact Number Check.
    if (emp_cno === "") 
    {
        emp_reg_error.push("Contact no cannot be empty.");
    }

    // Username Check.
    if (empuname === "") 
    {
        emp_reg_error.push("Please enter a username."); 
    } 
    else if (empuname.length > 8) 
    {
        emp_reg_error.push("Username maximum 8 characters.");
    }

    // Password validation
    if (emppass === "") 
    {
        emp_reg_error.push("Password fields must be filled.");  
    }


    // Check if there are any errors
    if (emp_reg_error.length == 0) 
    {
        // Generate XMLHttpRequest to send form data to PHP
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/empRegCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        let requestBody = 'empname=' + empname +
        '&compname=' + compname +
        '&emp_cno=' + emp_cno +
        '&empuname=' + empuname +
        '&emppass=' + emppass;

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) 
            {
                // Handle the response from the PHP script
                if(this.responseText.trim() === "success"){
                    window.open("../view/adminHome.php");
                }
                else{
                    emp_reg_error.push("Database Connection fail!");
                }
                
            }
        };
        xhttp.send(requestBody);

    }
    else {
        // Display all errors or take other actions
        let allErrors = emp_reg_error.join('\n');
        alert(allErrors);
    }
}
