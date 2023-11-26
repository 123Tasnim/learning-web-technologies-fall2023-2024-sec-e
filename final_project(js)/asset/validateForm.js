function complaintForm() {
    var hasError = false;

    if(document.getElementById('category').value == ''){
        document.getElementById('catErr').innerHTML="Please Select a Category";
        hasError = true;
    }
    else{document.getElementById('catErr').innerHTML="";}

    if(document.getElementById('subcategory').value == ''){
        document.getElementById('subcatErr').innerHTML="Please Select a subcategory";
        hasError = true;
    }
    else{document.getElementById('subcatErr').innerHTML="";}

    if(document.getElementById('complaint_type').value == ''){
        document.getElementById('typeErr').innerHTML="Please Select a complaint type";
        hasError = true;
    }
    else{document.getElementById('typeErr').innerHTML="";}

    if(document.getElementById('state').value == ''){
        document.getElementById('stateErr').innerHTML="Please select a state";
        hasError = true;
    }
    else{document.getElementById('stateErr').innerHTML="";}
    
    if(document.getElementById('noc').value == ''){
        document.getElementById('nocErr').innerHTML="Please Write the nature of complaint";
        hasError = true;
    }
    else{document.getElementById('nocErr').innerHTML="";}

    if(document.getElementById('complaint_details').value == ''){
        document.getElementById('detailErr').innerHTML="Please Write some details";
        hasError = true;
    }
    else{document.getElementById('detailErr').innerHTML="";}

    if (!hasError) {
        // Make an AJAX request to the edit_complaint.php script
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