function login_show() {
	$('#log-in-container').show();
}
function signin_show() {
	$('#popup-form').trigger('reset');
	$('#sign-in-container').show();
}

function login() {
	if (document.getElementById('log-email').value == "" ||
		document.getElementById('log-password').value == "") {
		alert("Please fill all the fields!");
	} else {
		$.ajax({
			url: '/api/login.php',
			type: 'POST',
			dataType: 'json',
			data: $("form[name='login-form']").serialize(),
			success: function (data) {
				alert(data["description"]);
				if (data["status"] == "success") {
					window.location.href = "Home.php";
				}
			}
		});
	}
}


function signup() {
	if (document.getElementById('sign-email').value == "" ||
		document.getElementById('firstname').value == "" ||
		document.getElementById('lastname').value == "" ||
		document.getElementById('sign-password').value == "" ||
		document.getElementById('repeat').value == "") {
		alert("Please fill all the fields!");
	} else if (document.getElementById('sign-password').value.length < 6) {
		alert("Password should be at least 6 symbols!");
	} else if (document.getElementById('sign-password').value != document.getElementById('repeat').value) {
		alert("Password and Repeat Password do not match!");
	} else {
		$.ajax({
			url: '/api/register.php',
			type: 'POST',
			dataType: 'json',
			data: $("form[name='signup-form']").serialize(),
			success: function (data) {
				if (data["status"] == "error") {
					alert(data["description"]);
				} else if (data["status"] == "success") {
					alert(data["description"]);
					window.location.href = "Home.php";
				}
			}
		});
	}
}

function logout() {
	$.ajax({
		url: '/api/logout.php',
		type: 'POST',
		dataType: 'json',
		success: (data) => {
			alert(data["description"]);
			window.location.href = "Home.php";
		}
	});
}