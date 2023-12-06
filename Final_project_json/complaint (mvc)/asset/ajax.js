function editComplaint(complaintNumber) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);

            
            document.getElementById("comno").value = data.comno;
            document.getElementById("category").value = data.category;
            document.getElementById("subcategory").value = data.subcat;
            document.getElementById("complaintype").value = data.complaintype;
            document.querySelector("select[name='state']").value = data.state;
            document.querySelector("input[name='noc']").value = data.noc;
            document.getElementById("complaint_details").value = data.complaintdetials;

            
        }
    };

    

    var url = "get_complaint_details.php?comno=" + complaintNumber;

    xhr.open("GET", url, true);
    xhr.send();
}
