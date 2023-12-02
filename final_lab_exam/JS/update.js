function updateValidation() 
{
    let empname = document.getElementById("emp_name").value;
    let emp_cno = document.getElementById("cont_no").value;
    let empuname = document.getElementById("emp_uname").value;
    let emppass = document.getElementById("emp_pass").value;

    
    if (empname === "") 
    {
        alert("Employer Name cannot be empty.");
        return false;
    }

   
    if (emp_cno === "") 
    {
        alert("Contact no cannot be empty.");
        return 
    }

   
    if (empuname === "") 
    {
        alert("Please enter a username."); 
    } 
    else if (empuname.length > 8) 
    {
       alert("Username maximum 8 characters.");
    }

    
    if (emppass === "") 
    {
       alert("Password fields must be filled.");  
    }


}