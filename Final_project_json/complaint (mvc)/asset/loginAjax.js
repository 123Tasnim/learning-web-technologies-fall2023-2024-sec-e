function submitForm() {
    var username = document.getElementById('user').value;
    var password = document.getElementById('pass').value;

    var xhr = new XMLHttpRequest();
    var url = '../control/loginCheck.php';
    var params = 'user=' + username + '&pass=' + password;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);

            if (data.success) {
               
                window.location.href = 'dashboard.html';
            } else {
                
                document.getElementById('userError').innerText = data.message;
            }
        }
    };

    xhr.send(params);
}
