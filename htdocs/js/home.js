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