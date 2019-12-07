function deleteMovie(id) {
	var answer = window.confirm("Are you sure you want to delete this movie?");
	
	if(answer) {
		$.ajax({
			url: '/api/Movies/Delete.php',
			type: 'POST',
			dataType: 'json',
			data: {movieId: id},
			success: function(data) {
                    alert(data["description"]);
                    if(data["status"]=="success") {
                        location.reload();
                    }
				}
			});
	}
}