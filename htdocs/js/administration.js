$('#submit-category').click(() => {
    $.ajax({
        url: '/api/categories/add.php',
        type: 'POST',
        dataType: 'json',
        data: { name: $('#new-category-name').val(), description: ' ', isActive: 1},
        success: function (data) {
            alert(data["description"]);
            location.reload();
        }
    });
})

$('#submit-category-changes').click(()=>{
    let categoryId = $("#edit-category-container").data('categoryId');
    $.ajax({
        url: '/api/categories/edit.php',
        type: 'POST',
        dataType: 'json',
        data: { categoryId, name: $('#edit-category-name').val(), description: ' ', isActive: 1},
        success: function (data) {
            alert(data["description"]);
            location.reload();
        }
    });
});

deleteCategory = (categoryId) => {
    $.ajax({
        url: '/api/categories/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { categoryId },
        success: function (data) {
            alert(data["description"]);
            location.reload();
        }
    });
}

function showCategoryForm() {
    document.getElementById("new-category-container").style.display = "block";
}

function showEditCategoryForm(categoryid) {
    $("#edit-category-container").show();
    $("#edit-category-container").data('categoryId', categoryid);
    $.ajax({
        url: '/api/categories/get.php',
        type: 'GET',
        dataType: 'json',
        data: { id: categoryid },
        success: function (data) {
            console.log(data.data.name);
            $('#edit-category-name').val(data.data.name);
        }
    });
}

function showParticipantForm() {
    $("#new-participant-container").show();
    $("#new-participant-form").validate({
        submitHandler: function() {
            $.ajax({
                url: '/api/participants/add.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    name: $('#participant-name').val(),
                    role: $('#participant-role').val()
                },
                success: (data) => {
                        alert(data["description"]);
                        location.reload();
                    }
            });
        }   
    });
}

function showEditParticipantForm(participantId) {
    $("#edit-participant-container").show();
    $.ajax({
        url: '/api/participants/get.php',
        type: 'GET',
        dataType: 'json',
        data: { id: participantId },
        success: (data) => {
            $('#edit-participant-name').val(data.data.firstName + ' ' + data.data.lastName);
            $('#edit-participant-role').val(data.data.position);
            }
    });

    $("#edit-participant-form").validate({
        submitHandler: function() {
            $.ajax({
                url: '/api/participants/edit.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    participantId: participantId,
                    name: $('#edit-participant-name').val(),
                    role: $('#edit-participant-role').val()
                },
                success: (data) => {
                        alert(data["description"]);
                        location.reload();
                    }
            });
        }   
    });
}

deleteParticipant = (participantId) => {
    $.ajax({
        url: '/api/participants/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { 
            participantId: participantId
        },
        success: (data) => {
                alert(data["description"]);
                location.reload();
            }
    });
}

function showFestivalForm() {
    $("#new-festival-container").show();
    $("#new-festival-form").validate({
        submitHandler: function() {
            $.ajax({
                url: '/api/festivals/add.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    name: $('#new-festival-name').val(),
                    description: $('#festival-description-text').val(),
                    posterUrl: $('#festival-poster-field').val()
                },
                success: (data) => {
                        alert(data["description"]);
                        location.reload();
                    }
            });
        }   
    });
}

function showEditFestivalForm(festivalId) {
    $("#edit-festival-container").show();

    $.ajax({
        url: '/api/festivals/get.php',
        type: 'GET',
        dataType: 'json',
        data: { id: festivalId },
        success: (data) => {
            $('#edit-festival-name').val(data.data.name);
            $('#edit-festival-description-text').val(data.data.description);
            $('#edit-festival-poster-field').val(data.data.posterSrc)
        }
    });

    $("#edit-festival-form").validate({
        submitHandler: function() {
            $.ajax({
                url: '/api/festivals/edit.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    festivalId,
                    name: $('#edit-festival-name').val(),
                    description: $('#edit-festival-description-text').val(),
                    posterUrl: $('#edit-festival-poster-field').val()
                },
                success: (data) => {
                        alert(data["description"]);
                        location.reload();
                    }
            });
        }   
    });

}


deleteFestival = (festivalId) => {
    $.ajax({
        url: '/api/festivals/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { festivalId },
        success: function (data) {
            alert(data["description"]);
            location.reload();
        }
    });
}


$('.active-users-scroller > .checkbox-box, .active-users-scroller > .checkbox-box > .check-mark').click((event)=> {
    if(event.target != event.currentTarget) {
        return;
    }
    event.stopPropagation();
    $.ajax({
        url: '/api/users/alterStatus.php',
        type: 'POST',
        dataType: 'json',
        data: {
            userId: $(event.target).attr('userId'),
            isActive: $('input[userId='+ $(event.target).attr('userId') + ']').attr('checked') ? 0 : 1
        },
        success: (data) => {
            if($('input[userId='+ $(event.target).attr('userId') + ']').attr('checked')) {
                $('input[userId='+ $(event.target).attr('userId') + ']').removeAttr('checked');
            } else {
                $('input[userId='+ $(event.target).attr('userId') + ']').attr('checked','');
            }
            alert(data.description); 
        }
    });
})

$('.awaiting-users-scroller > .checkbox-box, .awaiting-users-scroller >  .checkbox-box > .check-mark').click((event)=> {
    if(event.target != event.currentTarget) {
        return;
    }
    event.stopPropagation();
    $.ajax({
        url: '/api/users/approve.php',
        type: 'POST',
        dataType: 'json',
        data: {
            userId: $(event.target).attr('userId'),
            isApproved: 1
        },
        success: (data) => {
            alert(data.description);
            location.reload();
        }
    });
})