<?php
$cat = Url::getParam('category');

if(empty($cat)) {
	require_once("error.php");
} else {

	$objCatalogue = new Catalogue();
	$category = $objCatalogue->getCategory($cat);
	
	if(empty($category)) {
		require_once("error.php");
	} else {
	
		$rows = $objCatalogue->getProducts($cat);
		
		
		require_once("_header.php");
?>

    <!-- Display name of specific category -->
    <h1>Catalogue :: <?php echo $category['name']; ?></h1>
 




<?php		
		require_once("_footer.php");
	}
}

?>