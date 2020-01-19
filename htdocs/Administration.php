<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/administration.css">
    <link rel="stylesheet" href="/css/duplicated.css">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Header.php';
        echo !isset($_SESSION['isAdmin']);
        echo $_SESSION['isAdmin'] == FALSE;
        if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == FALSE)
        {
            echo "You need to be an admin to view this page!";
            die();
        }
    ?>

<div class = "categories-title">
    Movie categories
</div>
<button class = "categories-btn" onclick="showCategoryForm()">Add a category</button>
<div id = "users-categories-container">
    <div id="active-users-box">
        <p>Active users</p>
        <div class = "active-users-scroller">
            <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
                $allUsers = UserHelpers::getUsers();
                $approvedUsers = array_values(array_filter($allUsers, function($v, $k) {
                    return $v->get("IsApprovedByAdmin") == 1;
                }, ARRAY_FILTER_USE_BOTH));

                foreach($approvedUsers as $user) {
                    echo '
                    <label userId=' . $user->get("UserId") . ' class="checkbox-box">
                        ' . $user->get("Username") . '
                        <input ' . ($user->get('IsActive') ? 'checked ' : ' ') . 'userId=' . $user->get("UserId") . ' type="checkbox">
                        <span userId=' . $user->get("UserId") . ' class="check-mark"></span>
                    </label>
                    ';
                }
            ?>
        </div>
    </div>
    <div class = "categories-scroller">
        <div id = "categories-box">
            <table class="movie-categories-tbl" cellspacing="0" cellpadding="0">
                 <tr>
                     <th class = "col-category">
                       Category
                     </th>
                     <th class = "col-category-options">
                         Options
                     </th>
                 </tr>
                 <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';
                    $categories = CategoryHelpers::getAllCategories();

                    foreach($categories as $category) {
                        echo '
                        <tr>
                            <td class = "row-category">
                                ' . $category->get("Name") . '
                            </td>
                            <td class = "row-category-options">
                                <button class = "edit-category-btn" onclick="showEditCategoryForm(' . $category->get("Id") .')">Edit</button>
                                <button class = "delete-category-btn" onclick="deleteCategory(' . $category->get("Id") .')">Delete</button>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </table>
        </div>
    </div>
    <div id="awaiting-users-box">
        <p>Users awaiting email approval</p>
        <div class = "awaiting-users-scroller">
        <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
            $allUsers = UserHelpers::getUsers();
            $approvedUsers = array_values(array_filter($allUsers, function($v, $k) {
                return $v->get("IsApprovedByAdmin") == 0;
            }, ARRAY_FILTER_USE_BOTH));

            foreach($approvedUsers as $user) {
                echo '
                <label userId=' . $user->get("UserId") . ' class="checkbox-box">
                    ' . $user->get("Username") . '
                    <input ' . ($user->get('IsActive') ? 'checked ' : ' ') . 'userId=' . $user->get("UserId") . ' type="checkbox">
                    <span userId=' . $user->get("UserId") . ' class="check-mark"></span>
                </label>
                ';
            }
        ?>
        </div>
    </div>
</div>

<div class = "participants-title">
    Movie participants
</div>
<button class = "participants-btn" onclick="showParticipantForm()">Add a participant</button>
<div id = "participants-container">
    <div class = "participants-scroller">
        <div id = "participants-box">
            <table class="movie-participants-tbl">
                <tr>
                    <th class = "col-participants-name">
                        Name
                    </th>
                    <th class = "col-participants-role">
                        Role
                    </th>
                    <th class = "col-participants-main">
                        Main actor
                    </th>
                    <th class = "col-participants-options">
                        Options
                    </th>
                </tr>
                <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ParticipantHelpers.php';

                    $participants = ParticipantHelpers::getParticipants();

                    foreach($participants as $participant) {
                        echo '
                        <tr>
                            <td class = row-participants-name>
                            ' . $participant->get('FirstName') . ' ' . $participant->get('LastName') . '
                            </td>
                            <td class = row-participants-role>
                                ' . $participant->get('Position') . '
                            </td>
                            <td class = row-participants-main>
                                ' . (ParticipantHelpers::isMainActorAnywhere($participant->get("Id")) ? 'Yes' : 'No') . '
                            </td>
                            <td class = "row-participants-options">
                                <button class = "edit-category-btn" onclick="showEditParticipantForm('. $participant->get("Id"). ')">Edit</button>
                                <button class = "delete-category-btn" onclick="deleteParticipant('. $participant->get("Id"). ')">Delete</button>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </table>
        </div>
    </div>
</div>

<div class = "festivals-title">
    Movies festivals
</div>
<button class = "festivals-btn" onclick="showFestivalForm()">Add a festival</button>
<div id = "festivals-container">
    <div class = "festivals-scroller">
        <div id = "festivals-box">
            <table class = "movie-festivals-tbl" cellspacing="0" cellpadding="0">
                <tr>
                    <th class = "col-festival-name">
                        Name
                    </th>
                    <th class = "col-festival-options">
                        Options
                    </th>
                </tr>
                <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/FestivalHelpers.php';
                        $festivals = FestivalHelpers::getFestivals();
                        foreach($festivals as $festival) {
                            echo '
                            <tr>
                                <td class = "row-festival-name">
                                   ' . $festival->get('Name') . '
                                </td>
                                <td class = "row-festival-options">
                                    <button class="edit-category-btn" onclick="showEditFestivalForm('.$festival->get('Id').')">See/Edit</button>
                                    <button onclick="deleteFestival('.$festival->get('Id').')"class="delete-category-btn">Delete</button>
                                </td>
                            </tr>';
                        }

                    ?>
            </table>
        </div>
    </div>
</div>

<div id = "new-category-container">
    <img class="close-btn" id="new-category-close-btn" onclick="parentNode.style.display='none'" src="/images/xbutton.png">
    <div id = "new-category-box">
        <form action="#" id="new-category-form">
            <input type="text" id="new-category-name" class="details-field" placeholder="Category name . . .">
            <button id="submit-category">Submit</button>
        </form>
    </div>
</div>
<div id = "edit-category-container">
    <img class = "close-btn" id="edit-category-close-btn" onclick="parentNode.style.display='none'" src="/images/xbutton.png" onclick="hideEditCategoryForm()">
    <div id = "edit-category-box">
        <form action="#" id="edit-category-form">
            <input type="text" id="edit-category-name" class="details-field" placeholder="Category name . . .">
            <button id="submit-category-changes">Submit</button>
        </form>
    </div>
</div>

<div id = "new-participant-container">
    <img class = "close-btn" id="new-participant-close-btn" onclick="parentNode.style.display='none'" src="/images/xbutton.png" onclick="hideParticipantForm()">
    <div id = "new-participant-box">
        <form action="#" id="new-participant-form">
            <input required type="text" id="participant-name" class="details-field" placeholder="Participant name . . .">
            <input required type="text" id="participant-role" class="details-field" placeholder="Participant role . . .">
            <button id="submit-participant">Submit</button>
        </form>
    </div>
</div>
<div id = "edit-participant-container">
    <img class = "close-btn" id="edit-participant-close-btn" onclick="parentNode.style.display='none'" src="/images/xbutton.png">
    <div id = "edit-participant-box">
        <form action="#" id="edit-participant-form">
            <input required type="text" id="edit-participant-name" class="details-field" placeholder="Participant name . . .">
            <input required type="text" id="edit-participant-role" class="details-field" placeholder="Participant role . . .">
            <button id="submit-participant-changes">Submit</button>
        </form>
    </div>
</div>

<div id = "new-festival-container">
    <img class = "close-btn" id="new-festival-close-btn" onclick="parentNode.style.display='none'" src="/images/xbutton.png">
    <div id = "new-festival-box">
        <form action="#" id="new-festival-form">
            <input required type="text" id="new-festival-name" class="details-field" placeholder="Festival name . . . ">
            <input required type="url" id="festival-poster-field" placeholder="Poster link . . .">
            <div class = "festival-info-scroller">
                <div class = "festival-info">
                <textarea required id = "festival-description-text" placeholder="Description . . . " maxlength="1000"></textarea>
                </div>
            </div>
            <button type="submit" id="submit-festival">Submit</button>
        </form>
    </div>
</div>
<div id = "edit-festival-container">
    <img class = "close-btn" id="edit-festival-close-btn" onclick="parentNode.style.display='none'" src="/images/xbutton.png">
    <div id = "edit-festival-box">
        <form action="#" id="edit-festival-form">
            <input required type="text" id="edit-festival-name" class="details-field" placeholder="Festival name . . . ">
            <input required type="url" id="edit-festival-poster-field" placeholder="Poster link . . .">
            <div class = "festival-info-scroller">
                <div class = "festival-info">
                    <textarea required id = "edit-festival-description-text" maxlength="1000">
                    </textarea>
                </div>
            </div>
            <button type="submit" id="submit-festival-changes">Submit</button>
        </form>
    </div>
</div>
<script src="/js/administration.js"></script>
</body>
</html>