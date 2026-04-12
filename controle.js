function alpha(str) {
    str = str.toUpperCase();
    for (let i = 0; i < str.length; i++) {
        let c = str.charAt(i);
        if (c < "A" || c > "Z") {
            return false;
        }
    }
    return true;
}

function numbers(str) {
    for (let i = 0; i < str.length; i++) {
        let c = str.charAt(i);
        if (c < "0" || c > "9") {
            return false;
        }
    }
    return true;
}

function verify1() {
    let license = document.f1.license.value;

    if (license.length != 8) {
        alert("Invalid license: it must be 8 characters long");
        return false;
    }

    if (license.indexOf("/") != 2) {
        alert("Invalid license: it must have the format xx/xxxxx");
        return false;
    }

    let part1 = license.substring(0, license.indexOf("/"));
    let part2 = license.substring(license.indexOf("/") + 1);

    if (!numbers(part1) || !numbers(part2)) {
        alert("Invalid license: format must be xx/xxxxx where X are digits");
        return false;
    }

    // Test name and lastname
    let name = document.f1.name.value;
    let lastname = document.f1.lastname.value;

    if (!alpha(name)) {
        alert("Invalid name: only letters are allowed");
        return false;
    }

    if (name.length < 3 || name.length > 20) {
        alert("Invalid name: length must be between 3 and 20");
        return false;
    }

    if (!alpha(lastname)) {
        alert("Invalid lastname: only letters are allowed");
        return false;
    }

    if (lastname.length < 3 || lastname.length > 20) {
        alert("Invalid lastname: length must be between 3 and 20");
        return false;
    }

    // Test gender
    let gender = document.f1.gender;
    if (!gender[0].checked && !gender[1].checked) {
        alert("Choose your gender");
        return false;
    }
}

function verify2() {
    let license = document.f1.license.value;

    if (license.length != 8) {
        alert("Invalid license: it must be 8 characters long");
        return false;
    }

    if (license.indexOf("/") != 2) {
        alert("Invalid license: format must be xx/xxxxx");
        return false;
    }

    let part1 = license.substring(0, license.indexOf("/"));
    let part2 = license.substring(license.indexOf("/") + 1);

    if (!numbers(part1) || !numbers(part2)) {
        alert("Invalid license: format must be xx/xxxxx with digits only");
        return false;
    }

    // Test model
    let model = document.f1.model;
    if (model.selectedIndex == 0) {
        alert("Choose a model");
        return false;
    }

    // Test criteria
    let e1 = document.f1.e1.value;
    let e2 = document.f1.e2.value;
    let e3 = document.f1.e3.value;

    if (e1 < 1 || e1 > 5) {
        alert("Choose a number between 1 and 5 for safety");
        return false;
    }

    if (e2 < 1 || e2 > 5) {
        alert("Choose a number between 1 and 5 for driving");
        return false;
    }

    if (e3 < 1 || e3 > 5) {
        alert("Choose a number between 1 and 5 for comfort");
        return false;
    }

    // Test robot
    let robot = document.f1.robot;
    if (!robot.checked) {
        alert("Verify that you are not a robot!");
        return false;
    }
}