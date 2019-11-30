// Validating Empty Field
function validate_login() {
	if (document.getElementById('lemail').value == "" ||
	document.getElementById('lpassword').value == "") {
		alert("Please fill all the fields!");
	} 
	else if(!validateEmail(document.getElementById('lemail').value)){
		alert("Please enter a valid email address!");
	}
	else{
		$.ajax({
			url: '/Services/Login.php',
			type: 'POST',
			dataType: 'json',
			data: $( "form[name^='login']" ).serialize(),
			success: function(data) {
				if(data["status"] == "success"){
					alert(data["description"]);
					window.location.href = "Home.php";
				} else if(data["status"] == "error"){
					alert(data["description"]);
					console.log(1);
				}
			}
		});
	}
}

function validate_signin() {
	if (document.getElementById('semail').value == "" ||
	document.getElementById('firstname').value == "" ||
	document.getElementById('lastname').value == "" ||
	document.getElementById('spassword').value == "" ||
	document.getElementById('repeat').value == "") {
		alert("Please fill all the fields!");
	} 
	else if(!validateEmail(document.getElementById('semail').value)){
		alert("Please enter a valid email address!");
	}
	else if(document.getElementById('spassword').value.length  < 6){
		alert("Password s	hould be at least 6 symbols!");
	}
	else if(document.getElementById('spassword').value != document.getElementById('repeat').value){
		alert("Password and Repeat Password do not match!");
	}
	else{
		//document.getElementsByName("signin").submit();
		$.ajax({
			url: '/Services/RegisterUser.php',
			type: 'POST',
			dataType: 'json',
			data: $( "form[name^='signin']" ).serialize(),
			success: function(data) {
				if(data["status"] == "error"){
					alert(data["description"]);
				} else if(data["status"] == "success"){
					alert(data["description"]);
					document.getElementById('signin').style.display = "none";
				}
			}
		});
		//document.getElementById('signin').style.display = "none";

	}
}


//Function To Display Popup
function login_show() {
	document.getElementById('login').style.display = "block";
}
//Function to Hide Popup
function login_hide(){
	document.getElementById('login').style.display = "none";
}

//Function To Display Popup
function signin_show() {
	document.getElementById('signin').style.display = "block";
}
//Function to Hide Popup
function signin_hide(){
	document.getElementById('signin').style.display = "none";
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}