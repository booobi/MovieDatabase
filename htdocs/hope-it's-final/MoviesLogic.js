
function showLogIn() {
    document.getElementById('log-in-container').style.display = "block";
}

function showSignIn() {
    document.getElementById('sign-in-container').style.display = "block";
}

function showRating() {
    document.getElementById("rating-box").style.display = "block";
}

function showShareRating() {
    document.getElementById("rating-share-box").style.display = "block";
}

function showInfo() {
    document.getElementById("info-container").style.display = "block";
}

function showEditProjectionForm() {
    document.getElementById("edit-projection-container").style.display = "block";
}

function showEditShareForm() {
    document.getElementById("edit-share-container").style.display = "block";
}

function validateEmail(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateLogIn() {
    if (document.getElementById('log-email').value === "" ||
        document.getElementById('log-password').value === "") {
        alert("Please fill all the fields!");
    }
    else if(!validateEmail(document.getElementById('log-email').value)){
        alert("Please enter a valid email address!");
    }
    else{
        document.getElementById('form').submit();
        document.getElementById('log-in').style.display = "none";
        //log-in or log-in-btn ??
    }
}

function validateSignIn() {
    if (document.getElementById('sign-email').value === "" ||
        document.getElementById('firstname').value === "" ||
        document.getElementById('lastname').value === "" ||
        document.getElementById('sign-password').value === "" ||
        document.getElementById('repeat').value === "") {
        alert("Please fill all the fields!");
    } else if (!validateEmail(document.getElementById('sign-email').value)) {
        alert("Please enter a valid email address!");
    } else if (document.getElementById('sign-password').value.length < 6) {
        alert("Password should be at least 6 symbols!");
    } else if (document.getElementById('sign-password').value !== document.getElementById('repeat').value) {
        alert("Password and Repeat Password do not match!");
    } else {
        document.getElementById('form').submit();
        document.getElementById('sign-in').style.display = "none";
        //the sign-in or sign-in-btn is none???
    }
}


