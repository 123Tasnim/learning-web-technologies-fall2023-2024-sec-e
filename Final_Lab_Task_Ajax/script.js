
function searchEmployee() {
    let searchQuery = document.getElementById('employeeSearch').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Model/backend.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            document.getElementById('employeeResults').innerHTML = xhttp.responseText;
        }
    };

    xhttp.send('action=searchEmployee&query=' + encodeURIComponent(searchQuery));
}