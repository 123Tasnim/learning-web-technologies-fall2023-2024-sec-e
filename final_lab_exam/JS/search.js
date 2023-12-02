function searchValidation() 
{
    let searchuname = document.getElementById("srch_username").value;

    if (searchuname === "") 
    {
        alert("Username cannot be empty!");
    } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                let responseText = this.responseText;
                let values = responseText.split(",");

                if (values.length < 4) 
                {  
                    alert("Username not found!");  
                } 
                else 
                {
                    document.getElementById('s_en').innerHTML = values[0];
                    document.getElementById('s_cn').innerHTML = values[1];
                    document.getElementById('s_un').innerHTML = values[2];
                    document.getElementById('s_p').innerHTML = values[3];
                }
            }
        };
        xmlhttp.open("POST", "../controller/search.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("empuname=" + searchuname);
    }
}
