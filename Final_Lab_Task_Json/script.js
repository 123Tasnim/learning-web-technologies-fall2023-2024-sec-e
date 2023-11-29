function getStudentDetails(username) {
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'get_student_details.php?username=' + username, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let studentDetails = JSON.parse(this.responseText);
            displayStudentDetails(studentDetails);
        }
    };
}

function displayStudentDetails(studentDetails) {
    
    let detailsDiv = document.getElementById('studentDetails');
    detailsDiv.innerHTML = '<h2>Student Details</h2>';
    detailsDiv.innerHTML += '<p>Username: ' + studentDetails.username + '</p>';
    detailsDiv.innerHTML += '<p>Email: ' + studentDetails.email + '</p>';
    detailsDiv.innerHTML += '<p>ID: ' + studentDetails.id + '</p>';
    detailsDiv.innerHTML += '<p>CGPA: ' + studentDetails.cgpa + '</p>';
    detailsDiv.innerHTML += '<p>Gender: ' + studentDetails.gender + '</p>';
    detailsDiv.innerHTML += '<p>Phone: ' + studentDetails.phone + '</p>';
    
}