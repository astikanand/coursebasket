<?php
$cat = Url::getParam('category');

if(empty($cat)) {

	require_once("error.php");

} else { //first else start

		$objCatalogue = new Catalogue();
		$category = $objCatalogue->getCategory($cat);

		if(empty($category)) {

			  require_once("error.php");

		} else { //second else start

		       $rows = $objCatalogue->getProducts($cat);


			   // instantiate paging class
			   $objPaging = new Paging($rows, 3);
			   $rows = $objPaging->getRecords();


		       require_once("_header.php");
               ?>

			    <!-- Display name of specific category -->
			    <h1>Catalogue :: <?php echo $category['name']; ?></h1>

				<?php
				if(!empty($rows)) {
					foreach($rows as $row) { ?>

						<div class="catalogue_wrapper">
							<div class="catalogue_wrapper_left">
							    <?php
								$image = !empty($row['image']) ?
								$objCatalogue->_path.$row['image'] :
								$objCatalogue->_path.'unavailable.png';

								$width = Helper::getImgSize($image, 0);
								$width = $width > 120 ? 120 : $width;

							    ?>
							    <!-- To show the image of the product -->
								<a href="/?page=catalogue-item&amp;category=<?php echo $category['id']; ?>
								&amp;id=<?php echo $row['id']; ?>"> <img src="<?php echo $image; ?>"
								alt="<?php echo Helper::encodeHtml($row['name'], 1); ?>"
								width="<?php echo $width; ?>" />
								</a>
							</div><!-- End catalogue_wrapper_left -->


							<div class="catalogue_wrapper_right">
								<h4>
								<a href="/?page=catalogue-item&amp;category=<?php echo $category['id']; ?>&amp;
								id=<?php echo $row['id']; ?>"><?php echo Helper::encodeHtml($row['name'], 1); ?>
								</a>
								</h4>

								<h4><!-- Price of product number_format($row['price'], 2)upto two decimal points -->
								Price: <?php echo Catalogue::$_currency; echo number_format($row['price'], 2);?>
								</h4>

								<!-- To show the description about the product and shortening using shortenStringf -->
								<p><?php echo Helper::shortenString(Helper::encodeHtml($row['description'])); ?></p>
								<p><?php echo Basket::activeButton($row['id']); ?></p>
							</div> <!-- End catalogue_wrapper_right -->

						</div><!-- End catalogue_wrapper -->


		            <?php
					}  // for loop end
			    echo $objPaging->getPaging();

				}else { // third else start   ?>

			            <p>There are no products in this category.</p>

			            <?php
						 }	
						require_once("_footer.php");



			 }

}

?>
