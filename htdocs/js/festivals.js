function deleteFestival(festivalId) {
    $.ajax({
        url: '/api/festivals/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { festivalId },
        success: (data) => {
                alert(data["description"]);
                location.reload();
        }
    });
}

$("#new-fest-form").validate({
    submitHandler: function() {
        $.ajax({
            url: '/api/festivals/add.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                name: $('#new-fest-name').val(),
                description: $('#fest-description-text').val(),
                posterUrl: $('#fest-poster-field').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    location.reload();
                }
        });
    }   
});

jQuery('.close-btn').click(function () {
    $(this).parent().hide();
});

function showFestForm() {
    $("#new-fest-container").show();
    
}

function showEditFestForm(festivalId) {
    $("#edit-fest-container").show();
    $("#edit-fest-container").data('festivalId', festivalId);
    $.ajax({
        url: '/api/festivals/get.php',
        type: 'GET',
        dataType: 'json',
        data: { 
            id: festivalId
        },
        success: (data) => {
            $('#edit-fest-name').val(data.data.name),
            $('#edit-fest-description-text').val(data.data.description),
            $('#edit-fest-poster-field').val(data.data.posterSrc)
        }
    });
}

$("#edit-fest-form").validate({
    submitHandler: function() {
        $.ajax({
            url: '/api/festivals/edit.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                festivalId: $("#edit-fest-container").data('festivalId'),
                name: $('#edit-fest-name').val(),
                description: $('#edit-fest-description-text').val(),
                posterUrl: $('#edit-fest-poster-field').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    location.reload();
                }
        });
    }   
});