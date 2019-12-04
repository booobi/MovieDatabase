/*

   jQuery('.entrance-btn').click(function () {
        $('.entrance-btn').hide();

        if (this.id === 'sign-in') {
            $('#log-out').show();
            $('#profile').show();
        } else if (this.id === 'log-in') {
            $('#profile').show();
            $('#log-out').show();
        } else if (this.id === 'admin-log-in') {
            $('#admin').show();
            $('#profile').show();
            $('#log-out').show();
        }

        if ($('.mobile-headings').is(":hidden")) {
            $('.watch-later').show();
            $('.watch-later-tbl').show();
        }else{
            $('.watch-later-btn').show();
        }
    });

    jQuery('.profile-btn').click(function () {

        if (this.id === 'log-out')  {
            $('.profile-btn').hide();

            $('.watch-later').hide();
            $('.watch-later-tbl').hide();
            $('.watch-later-btn').hide();
            $('.entrance-btn').show();
        }
    });
*/

/*
function myFunction() {
    let checkBox = document.getElementById("check-adv-search");
    let text = document.getElementById("hid");
    if (checkBox.checked === true) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}*/

jQuery('.top-week-btn').click(function () {
	if($(this).text() === "This week top movies") {
		$('.top-week-tbl').show();
		$(this).text("Hide");
		$(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
	}else {
		$('.top-week-tbl').hide();
		$(this).text("This week top movies");
	}
});

jQuery('.shared-movies-btn').click(function () {
	if($(this).text() === "Movies shared by the community") {
		$('.shared-movies-tbl').show();
		$(this).text("Hide");
		$(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
	}else {
		$('.shared-movies-tbl').hide();
		$(this).text("Movies shared by the community");
	}
});

jQuery('.projections-btn').click(function () {
	if($(this).text() === "Movies projections this week") {
		$('.projections-tbl').show();
		$(this).text("Hide");
		$(this).css('background-color', 'rgba(105, 52, 60, 0.48)');
	}else {
		$('.projections-tbl').hide();
		$(this).text("Movies projections this week");
	}
});

jQuery('.festivals-btn').click(function () {
	if($(this).text() === "Movie festivals") {
		$('.festivals-tbl').show();
		$(this).text("Hide");
		$(this).css('background-color', 'rgba(105, 52, 60, 0.48)');

	}else {
		$('.festivals-tbl').hide();
		$(this).text("Movie festivals");
	}
});

jQuery('.watch-later-btn').click(function () {
	if($(this).text() === "Watch later") {
		$('.watch-later-tbl').show();
		$(this).text("Hide");
		$(this).css('background-color', 'rgba(105, 52, 60, 0.48)');

	}else {
		$('.watch-later-tbl').hide();
		$(this).text("Watch later");
	}
});


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
			url: '/Services/Login.php',
			type: 'POST',
			dataType: 'json',
			data: $( "form[name='login-form']" ).serialize(),
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
			url: '/Services/RegisterUser.php',
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
	$('#log-in-box').show();
}
//Function to Hide Popup
function login_hide(){
	$('form[name="login-form"]').trigger('reset');
	$('#log-in-box').hide();
}

//Function To Display Popup
function signin_show() {
	$('form[name="signup-form"]').trigger('reset');
	$('#sign-in-box').show();
}
//Function to Hide Popup
function signin_hide(){
	$('#sign-in-box').hide();
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}