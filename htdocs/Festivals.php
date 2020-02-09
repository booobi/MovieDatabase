<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/festivals.css">
    <link rel="stylesheet" href="/css/duplicated.css">

</head>

<body>
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Header.php';
?>

<div class = "festival-title">
    Festivals
</div>
<?php
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
        echo '<button class = "add-festival-btn" onclick="showFestForm()">Add a festival</button>';
    }
?>
<div class = "fest-scroller">
  <div id = "festival-box">
    <table class="fest-tbl">
        <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/FestivalHelpers.php';
                $festivals = FestivalHelpers::getFestivals();
                foreach($festivals as $festival) {
                    echo '
                    <tr>
                        <th class = "col-fest-poster">
                        </th>
                        <td class = "row-fest-poster">
                        <img src = "' . $festival->get("PosterSrc") . '">
                        </td>
                        <th class = "col-fest-name">
                        </th>
                        <td class = "row-fest-name">
                            ' . $festival->get("Name") . '
                        </td>
                        <th class = "col-fest-info">
                        </th>
                        <td class = "row-fest-info">
                            <div class = "fest-text">
                            ' . $festival->get("Description") . '
                            </div>
                        </td>
                        <th class = "col-fest-options">
                        </th>
                        <td class = "row-fest-options">';
                        
                        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                            echo '<button class = "edit-fest-btn" onclick="showEditFestForm('. $festival->get("Id") .')">Edit</button>
                            <button onclick="deleteFestival('. $festival->get("Id") .')" class = "delete-fest-btn">Delete</button>';
                        }

                        echo '</td>
                    </tr>';
                }
            ?>
    </table>
  </div>
</div>

<div id = "new-fest-container">
    <img class = "close-btn" id="new-fest-close-btn" src="/images/xbutton.png" onclick="hideFestForm()">
    <div id = "new-fest-box">
        <form action="#" id="new-fest-form">
            <input required type="text" id="new-fest-name" class="fest-details-field" placeholder="Festival name . . . ">
            <input required type="url" id="fest-poster-field" placeholder="Poster link . . .">
            <div class = "fest-info-scroller">
                <div class = "fest-info">
                    <textarea required id = "fest-description-text" placeholder="Description . . . " maxlength="1000"></textarea>
                </div>
            </div>
            <button href="javascript:%20validateLogIn()" id="submit-fest">Submit</button>
        </form>
    </div>
</div>

<div id = "edit-fest-container">
    <img class = "close-btn" id="edit-fest-close-btn" src="/images/xbutton.png">
    <div id = "edit-fest-box">
        <form action="#" id="edit-fest-form">
            <input required type="text" id="edit-fest-name" class="details-field" placeholder="Festival name . . . ">
            <input required type="url" id="edit-fest-poster-field" placeholder="Poster link . . .">
            <div class = "fest-info-scroller">
                <div class = "fest-info">
                    <textarea required id = "edit-fest-description-text" maxlength="1000">
                    </textarea>
                </div>
            </div>
            <button type="submit" id="submit-fest-changes">Submit</button>
        </form>
    </div>
</div>

<script src="/js/festivals.js"></script>
</body>