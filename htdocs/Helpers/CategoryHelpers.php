<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Category.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/DBOperations.php';

 class CategoryHelpers {


	public static function addCategory($name, $description, $isActive) {
		DBOperations::prepareAndExecute(
			"INSERT INTO `categories`(`Name`, `IsActive`, `Description`) VALUES ('{$name}',{$isActive},'{$description}')");
	}

	public static function editCategory($categoryId, $name, $description, $isActive) {
		DBOperations::prepareAndExecute(
			"UPDATE `categories` SET `Name`='{$name}',`IsActive`={$isActive},`Description`='{$description}'
			WHERE CategoryId={$categoryId}");
		}

	public static function deleteCategory($categoryId) {
		DBOperations::prepareAndExecute(
		"DELETE FROM `categories` WHERE CategoryId={$categoryId}");
	}

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
	public static function getCategory($categoryId) {
		$categoryRes = DBOperations::prepareAndExecute(
		"SELECT * FROM `categories` WHERE CategoryId={$categoryId}");
		
		$category = NULL;
		if ($categoryRes->num_rows > 0) {
				$row = $categoryRes->fetch_assoc();
				$category = new Category();
				$category->set("Id", $row['CategoryId']);
				$category->set("Name", $row['Name']);
				$category->set("Description", $row['Description']);
				$category->set("IsActive", $row['IsActive']);

		}

		return $category;
	}

	public static function getAllCategories() {
		$categoriesRes = DBOperations::prepareAndExecute(
			"SELECT * FROM `categories`");
		
		$categories = [];
		if ($categoriesRes->num_rows > 0) {
			while($row = $categoriesRes->fetch_assoc()) {
				$category = new Category();
				$category->set("Id", $row['CategoryId']);
				$category->set("Name", $row['Name']);
				$category->set("Description", $row['Description']);
				$category->set("IsActive", $row['IsActive']);

				$categories[] = $category;
			}
		}

		return $categories;
    }
 }
?>