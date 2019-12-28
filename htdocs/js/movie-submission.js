$(document).ready(()=>{
    //create dropdowns
    $("#directorSelect").CreateMultiCheckBox({ width: '190px', defaultText : 'Director . . . ', height:'350px' });
    $("#categorySelect").CreateMultiCheckBox({ width: '190px', defaultText : 'Category . . . ', height:'350px' });
    $("#actorsSelect").CreateMultiCheckBox({ width: '190px', defaultText : 'Actors . . . ', height:'350px' });
    $("#mainActorsSelect").CreateMultiCheckBox({ width: '190px', defaultText : 'Main Actors . . . ', height:'350px' });

    //release date changes
    $("#release-field").change(()=> {
        $("#movie-release p").html($("#release-field").val());
    });
    
    //actor changes
    const registerDropdownChanges = (sectionParentId, defaultEmptyText) => {
        $("#" + sectionParentId + " .MultiCheckBoxDetailBody input[type='checkbox']").change(() => {
            let text="";
            $.each($("#" + sectionParentId + " input[type='checkbox']:checked"), (index, el) => {
                let jEl = $($(el).parent().parent().find("div").get(1));
                text += jEl.text() + ", ";
            });
            text = text ? text : defaultEmptyText;

            $("#" + sectionParentId + " .MultiCheckBox").text(text);
        });
    }

    registerDropdownChanges("movie-director", "Select Director ...");
    registerDropdownChanges("movie-category", "Select Categories ...");
    registerDropdownChanges("movie-actors", "Select Actors ...");
    registerDropdownChanges("movie-stars", "Select Main Actors ...");

    $(document).on("click", ".MultiCheckBox", function () {
        let detail = $(this).next();
        detail.show();
    });
    

    /*  $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {
           e.stopPropagation();
           let hc = $(this).prop("checked");
           $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
           $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
       });

       $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {
           let inp = $(this).find("input");
           let chk = inp.prop("checked");
           inp.prop("checked", !chk);
           $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
           $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
       });
    */
    $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
        e.stopPropagation();
        $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

        let val = ($(".MultiCheckBoxDetailBody input:checked").length === $(".MultiCheckBoxDetailBody input").length)
        $(".MultiCheckBoxDetailHeader input").prop("checked", val);
    });

    $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
        let inp = $(this).find("input");
        let chk = inp.prop("checked");
        inp.prop("checked", !chk);
        inp.trigger("change");

        let multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
        let multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
        multiCheckBoxDetail.next().UpdateSelect();

        let val = ($(".MultiCheckBoxDetailBody input:checked").length === $(".MultiCheckBoxDetailBody input").length)
        $(".MultiCheckBoxDetailHeader input").prop("checked", val);
    });

    $(document).mouseup(function (e) {
        let container = $(".MultiCheckBoxDetail");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });


});

function submitMovie(e) {
    e.preventDefault();
    if (document.getElementById('title-field').value === "" ||
        document.getElementById('poster-field').value === "" ||
        // document.getElementById('awards-field').value === "" ||
        // document.getElementById('music-field').value === "" ||
        // document.getElementById('studio-field').value === "" ||
        document.getElementById('language-field').value === "" ||
        ($('#release-field').attr("value") === "" && document.getElementById('release-field').value === "") ||
        document.getElementById('trailer-field').value === "" ||
        document.getElementById('duration-field').value === "" ||
        document.getElementById('country-field').value === "" ||
        document.getElementById('location-field').value === "" ||
        document.getElementById('rating-field').value === "" ||
        document.getElementById('description-area').value === "" ) {
        
        alert("Please fill all the fields!");
    } else {

        //collect directorIds
        let directorIds = [];
        $.each($("#movie-director .MultiCheckBoxDetailBody input"), (index, value) => {
            if($(value).is(":checked")) {
                directorIds.push($(value).attr("value"));    
            }
        });
    
        //collect actorIds
        let actorIds = [];
        $.each($("#movie-actors .MultiCheckBoxDetailBody input"), (index, value) => {
            if($(value).is(":checked")) {
                actorIds.push($(value).attr("value"));    
            }
        });
        
        //collect mainActorIds
        let mainActorIds = [];
        $.each($("#movie-stars .MultiCheckBoxDetailBody input"), (index, value) => {
            if($(value).is(":checked")) {
                mainActorIds.push($(value).attr("value"));    
            }
        });
        
        //collect categoryIds
        let categoryIds = [];
        $.each($("#movie-category .MultiCheckBoxDetailBody input"), (index, value) => {
            if($(value).is(":checked")) {
                categoryIds.push($(value).attr("value"));    
            }
        });

        const movieData = {
            name: $("#title-field").val(),
            posterUrl: $("#poster-field").val(),
            directorIds,
            awards: $("#awards-field").val(),
            musicCompany: $("#music-field").val(),
            movieCompany: $("#studio-field").val(),
            categoryIds: categoryIds,
            actorIds: actorIds,
            language: $("#language-field").val(),
            releaseDate: $("#release-field").val() ? $("#release-field").val() : $("#release-field").attr("value"),
            description: $("#description-area").val(),
            trailerUrl: $("#trailer-field").val(),
            duration: $("#duration-field").val(),
            country: $("#country-field").val(),
            location: $("#location-field").val(),
            rating: $("#rating-field").val(),
            mainActorIds: mainActorIds
        }
        
        $.ajax({
            url: action == 'edit' ? '/api/Movies/Edit.php' : '/api/Movies/Add.php',
			type: 'POST',
			dataType: 'json',
			data: action == 'edit' ? { ...movieData, movieId } : movieData,
			success: function(data) {
				alert(data["description"]);
				if(data["status"] == "success"){
					window.location.href = "Movies.php";
				}
			}
        });

    }
    
}

let defaultMultiCheckBoxOption = { width: '200px', defaultText: 'Select Below', height: '200px' };

jQuery.fn.extend({
    CreateMultiCheckBox: function (options) {

        let localOption = {};
        localOption.width = (options !== null && options.width !== null && options.width !== undefined) ? options.width : defaultMultiCheckBoxOption.width;
        localOption.defaultText = (options !== null && options.defaultText !== null && options.defaultText !== undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
        localOption.height = (options !== null && options.height !== null && options.height !== undefined) ? options.height : defaultMultiCheckBoxOption.height;

        this.hide();
        this.attr("multiple", "multiple");
        let divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
        divSel.css({ "width": localOption.width });

        let detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
        detail.css({ "width": parseInt(options.width) + 10, "max-height": localOption.height });
        let multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

        this.find("option").each(function () {
            let val = $(this).attr("value");

            if (val === undefined)
                val = '';

            multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
        });

        multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
        multiCheckBoxDetailBody.css("overflow", "auto");
    },
    UpdateSelect: function () {
        let arr = [];

        this.prev().find(".mulinput:checked").each(function () {
            arr.push($(this).val());
        });

        this.val(arr);
    },
});