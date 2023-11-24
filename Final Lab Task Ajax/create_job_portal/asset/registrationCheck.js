

function validateForm() {
    var errors = [];

    var name = document.getElementById('name').value;
    var username = document.getElementById('usrname').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;
    var gender = document.querySelector('input[name="gender"]:checked');
    var id = document.getElementById('id').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;

    if (!isValidName(name)) {
        errors.push('Invalid name.');
    }

    if (!isValidUsername(username)) {
        errors.push('Invalid username.');
    }

    if (!isValidEmail(email)) {
        errors.push('Invalid email address.');
    }

    if (!isValidPhone(mobile)) {
        errors.push('Invalid phone number.');
    }

    if (!gender) {
        errors.push('Please select a gender.');
    }

    if (!isValidID(id)) {
        errors.push('Invalid ID. It should contain only numeric characters.');
    }

    if (!isValidPassword(password)) {
        errors.push('Invalid password.');
    }

    if (!isValidConfirmPassword(password, cpassword)) {
        errors.push('Passwords do not match.');
    }

    if (!isValidGender(gender)) {
        errors.push('Invalid gender.');
    }

    if (errors.length > 0) {
        alert(errors.join('\n'));
        return false;
    } else {
        return true;
    }
}
