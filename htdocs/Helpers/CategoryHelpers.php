<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Category.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

 class CategoryHelpers {

    public static function getMovieCategories($movieId) {
        $movieCategoriesRes = DBOperations::prepareAndExecute(
			"SELECT categories.CategoryId, categories.Name, categories.Description, categories.IsActive
			from movies
			INNER JOIN movies_categories ON movies.MovieId = movies_categories.MovieId
			INNER JOIN categories ON categories.CategoryId = movies_categories.CategoryId
			WHERE movies.MovieId = {$movieId}");

		$movieCategories = [];
		if ($movieCategoriesRes->num_rows > 0) {
			while($row = $movieCategoriesRes->fetch_assoc()) {
				$category = new Category();
				$category->set("Id", $row['CategoryId']);
				$category->set("Name", $row['Name']);
				$category->set("Description", $row['Description']);
				$category->set("isActive", $row['IsActive']);

				$movieCategories[] = $category;
			}
		}
        
        return $movieCategories;
    }
    
    public static function applyCategoriesToMovie($movieId, $categories) {
        //delete categories from movie
        DBOperations::prepareAndExecute(
        "DELETE FROM `movies_categories` WHERE MovieId = {$movieId}");
			
		//add categories to movie
        foreach($categories as $category) {
			DBOperations::prepareAndExecute("
			INSERT INTO `movies_categories`(`MovieId`, `CategoryId`) 
			VALUES ({$movieId},". ($category->get("Id")) .")");
		}
	}
	
	public static function getAllCategories() {
		$categoriesRes = DBOperations::prepareAndExecute(
			"SELECT * FROM `categories`");
		
		$categories = [];
		if ($categoriesRes->num_rows > 0) {
			while($row = $categoriesRes->fetch_assoc()) {
				$categories[$row['Name']] = new Category();
				$categories[$row['Name']]->set("Id", $row['CategoryId']);
				$categories[$row['Name']]->set("Name", $row['Name']);
				$categories[$row['Name']]->set("Description", $row['Description']);
				$categories[$row['Name']]->set("isActive", $row['IsActive']);
			}
		}

		return $categories;
    }
 }
?>