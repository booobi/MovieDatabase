function submit(e) {
    e.preventDefault();
    console.log("TEEEEEEEST");
    //validation for Category
    /**/

}

function validateMovieFields() {
    if (document.getElementById('title-field').value === "" ||
        document.getElementById('poster-field').value === "" ||
        document.getElementById('director-field').value === "" ||
        document.getElementById('awards-field').value === "" ||
        document.getElementById('music-field').value === "" ||
        document.getElementById('studio-field').value === "" ||
        document.getElementById('language-field').value === "" ||
        document.getElementById('release-field').value === "" ||
        document.getElementById('trailer-field').value === "" ||
        document.getElementById('duration-field').value === "" ||
        document.getElementById('country-field').value === "" ||
        document.getElementById('location-field').value === "" ||
        document.getElementById('rating-field').value === "" ||
        document.getElementById('stars-field').value === "" ||
        document.getElementById('description-area').value === "" ) {
        alert("Please fill all the fields!");
    } else {
        alert("cool");
    }
}