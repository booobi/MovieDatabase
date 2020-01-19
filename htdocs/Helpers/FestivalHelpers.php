<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Festival.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';
class FestivalHelpers {

    public static function editFestival($festivalId, $name, $description, $posterSrc) {
        DBOperations::prepareAndExecute(
        "UPDATE `moviefestivals` SET `Name`='{$name}',`Description`='{$description}', `PosterSrc`='{$posterSrc}' WHERE MovieFestivalId={$festivalId}"
        );
    }
    
    public static function addFestival($name, $description, $posterSrc) {
        DBOperations::prepareAndExecute(
        "INSERT INTO `moviefestivals`(`Name`, `Description`, `PosterSrc`) VALUES ('{$name}','{$description}', '{$posterSrc}')"
        );
    }

    public static function deleteFestival($festivalId) {
        DBOperations::prepareAndExecute(
        "DELETE FROM `moviefestivals` WHERE MovieFestivalId={$festivalId}"
        );
    }

    public static function getFestival($festivalId) {
        $result = DBOperations::prepareAndExecute(
            "SELECT MovieFestivalId, Name, Description, PosterSrc
            FROM moviefestivals WHERE MovieFestivalId={$festivalId}");

        $festival = NULL;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $festival = new Festival();
            $festival->set("Id", $row['MovieFestivalId']);
            $festival->set("Name", $row['Name']);
            $festival->set("Description",$row['Description']);
            $festival->set("PosterSrc",$row['PosterSrc']);
        }

        return $festival;
    }

    public static function getFestivals() {
        $result = DBOperations::prepareAndExecute(
            "SELECT MovieFestivalId, Name, Description, PosterSrc
            FROM moviefestivals");


        $festivals = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $festival = new Festival();
                $festival->set("Id", $row['MovieFestivalId']);
                $festival->set("Name", $row['Name']);
                $festival->set("Description",$row['Description']);
                $festival->set("PosterSrc",$row['PosterSrc']);
                $festivals[] = $festival;
            }
        }

        return $festivals;
    }
}
?>