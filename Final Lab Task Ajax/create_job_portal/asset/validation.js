// validation.js

function isValidName(name) {
    if (name.length < 5) {
        return false;
    } else {
        let allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_ ';
        for (let i = 0; i < name.length; i++) {
            let character = name[i];
            if (allowedCharacters.indexOf(character) === -1) {
                return false;
            }
        }
        return true;
    }
}

function isValidUsername(username) {
    let allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_';

    if (username.length < 4) return false;

    for (let i = 0; i < username.length; i++) {
        let character = username[i];

        if (allowedCharacters.indexOf(character) === -1) {
            return false;
        }
    }

    return true;
}

function isValidID(id) {
    return !isNaN(id);
}

function isValidEmail(email) {
    let atIndex = email.indexOf('@');
    let dotIndex = email.lastIndexOf('.');

    if (atIndex === -1 || dotIndex === -1) {
        return false;
    }

    if (atIndex === 0 || dotIndex === (email.length - 1)) {
        return false;
    }

    if (email.indexOf('..') !== -1) {
        return false;
    }

    if (email.indexOf('.@') !== -1 || email.indexOf('@.') !== -1) {
        return false;
    }

    if (email.indexOf('.com') === -1) {
        return false;
    }

    if (email.indexOf(' ') !== -1) {
        return false;
    }

    return true;
}

function isValidPhone(mobile) {
    if (mobile.length !== 11) return false;
    let allowedCharacters = '0123456789';

    for (let i = 0; i < mobile.length; i++) {
        let character = mobile[i];

        if (allowedCharacters.indexOf(character) === -1) {
            return false;
        }
    }

    return true;
}

function isValidPassword(password) {
    if (password.length < 5) {
        return false;
    } else {
        let allowedCharactersSpecial = '.,!@#$%^&*|:;';
        let allowedCharactersCapitalLetter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        let allowedCharactersSmallLetter = 'abcdefghijklmnopqrstuvwxyz';
        let allowedCharactersNumber = '0123456789';
        let countSpCharacter = 0;
        let countCapLetter = 0;
        let countSmLetter = 0;
        let countNumber = 0;

        for (let i = 0; i < password.length; i++) {
            let character = password[i];
            if (allowedCharactersSpecial.indexOf(character) !== -1) {
                countSpCharacter = 1;
            }
            if (allowedCharactersCapitalLetter.indexOf(character) !== -1) {
                countCapLetter = 1;
            }
            if (allowedCharactersSmallLetter.indexOf(character) !== -1) {
                countSmLetter = 1;
            }
            if (allowedCharactersNumber.indexOf(character) !== -1) {
                countNumber = 1;
            }
        }

        if (countSpCharacter === 0 || countCapLetter === 0 || countSmLetter === 0 || countNumber === 0) {
            return false;
        }

        return true;
    }
}

function isValidConfirmPassword(password, confirmPassword) {
    return password === confirmPassword;
}

function isValidGender() {
    var genderRadios = document.getElementsByName('gender');

    for (var i = 0; i < genderRadios.length; i++) {
        if (genderRadios[i].checked) {
            return true;
        }
    }

    return false;
}
