$('#log-out-btn').click(() => {
	$.ajax({
		url: '/api/logout.php',
		type: 'POST',
		dataType: 'json',
		success: (data) => {
				alert(data["description"]);
				window.location.href = "Home.php";
			}
		});
})

// Validating Empty Field
function validate_login() {
	if (document.getElementById('log-email').value == "" ||
	document.getElementById('log-password').value == "") {
		alert("Please fill all the fields!");
	} 
	else if(!validateEmail(document.getElementById('log-email').value)){
		alert("Please enter a valid email address!");
	}
	else{
		$.ajax({
			url: '/api/login.php',
			type: 'POST',
			dataType: 'json',
			data: $( "form[name='login-form']" ).serialize(),
			success: function(data) {
				alert(data["description"]);
				if(data["status"] == "success"){
					window.location.href = "Home.php";
				}
			}
		});
	}
}

function validate_signin() {
	if (document.getElementById('sign-email').value == "" ||
	document.getElementById('firstname').value == "" ||
	document.getElementById('lastname').value == "" ||
	document.getElementById('sign-password').value == "" ||
	document.getElementById('repeat').value == "") {
		alert("Please fill all the fields!");
	} 
	else if(!validateEmail(document.getElementById('sign-email').value)){
		alert("Please enter a valid email address!");
	}
	else if(document.getElementById('sign-password').value.length  < 6){
		alert("Password should be at least 6 symbols!");
	}
	else if(document.getElementById('sign-password').value != document.getElementById('repeat').value){
		alert("Password and Repeat Password do not match!");
	}
	else{
		//document.getElementsByName("signin").submit();
		$.ajax({
			url: '/api/register.php',
			type: 'POST',
			dataType: 'json',
			data: $( "form[name='signup-form']" ).serialize(),
			success: function(data) {
				if(data["status"] == "error"){
					alert(data["description"]);
				} else if(data["status"] == "success"){
					alert(data["description"]);
					signin_hide();
				}
			}
		});
		

	}
}

//Function To Display Popup
function login_show() {
	$('#log-in-container').show();
}
//Function to Hide Popup
function login_hide(){
	$('form[name="login-form"]').trigger('reset');
	$('#log-in-box').hide();
}

//Function To Display Popup
function signin_show() {
	$('form[name="signup-form"]').trigger('reset');
	$('#sign-in-container').show();
}
//Function to Hide Popup
function signin_hide(){
	$('#sign-in-box').hide();
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}