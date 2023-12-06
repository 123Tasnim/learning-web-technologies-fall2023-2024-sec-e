function complaintForm() {
    var hasError = false;

    if (document.getElementById('category').value == '') {
        alert('Please Select a Category');
        hasError = true;
    }

    if (document.getElementById('subcategory').value == '') {   
        alert('Please Select a Subcategory');
        hasError = true;
    }

    if (document.getElementById('complaint_type').value == '') {
        alert('Please Select a Complaint Type');
        hasError = true;
    }

    if (document.getElementById('state').value == '') {
        alert('Please select a State');
        hasError = true;
    }

    if (document.getElementById('noc').value == '') {
        alert('Please Write the Nature of Complaint');
        hasError = true;
    }

    if (document.getElementById('complaint_details').value == '') {
        alert('Please Write Some Details');
        hasError = true;
    }

    if (!hasError) {
        editComplaint(document.getElementById('comno').value);
    }

    return !hasError;
}





// function editComplaint(comno){
//     document.getElementById('comno') = comno;
//     alert('hi');
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);
//         }
//     };
//     xhttp.open("POST", "edit_complaint.php", true);
//     xhr.send('comno=' + encodeURIComponent(comno));
// }