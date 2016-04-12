<?php
$objCatalogue = new Catalogue();
$cats = $objCatalogue->getCategories();
$insts = $objCatalogue->getInstitutes();

$objBusiness = new Business();
$business = $objBusiness->getBusiness();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>coursebasket</title>
	<meta name="description" content="Online Solution to India's Education Problem @ coursebasket" />
	<meta name="description" content="Choose top universities, colleges and institutes for your degree,
	   pg diploma, certificates, entrance coaching and school education courses online @ EduKart."/>
    <meta name="keywords" content="degree, diploma, certificate course, entrance coaching, school 
       education, k12, universities, colleges, institutes, pg diploma, online education in india, 
       top colleges in india, top universities in india, online degree courses in india, correspondence courses, 
       regular courses"/>
	<meta http-equiv="imagetoolbar" content="no" />
	<link href="/css/core.css" rel="stylesheet" type="text/css" />
	
</head>



<body>
	
<div id="header">
	<div id="header_in">
		<h5><a href="/"><?php echo $business['name']; ?></a></h5>
	</div>
</div> <!--End header -->


<div id="outer">
	<div id="wrapper">
		
		<div id="left">
		   <?php require_once ('basket_left.php'); ?>
		   
		   <!-- Check if Categories are not empty using $cats variable which is obtained by
		   		$cats = $objCatalogue->getCategories(); --> 
           <?php if (!empty($cats)) { ?>
				<h4><strong>COURSE CATEGORY</strong></h4>
				<ul id="navigation">
					<?php 
						foreach($cats as $cat) {
							echo "<li><a href=\"/?page=catalogue&amp;category=".$cat['id']."\"";
							echo Helper::getActive(array('category' => $cat['id']));
							echo ">";
							echo Helper::encodeHtml($cat['name']);
							echo "</a></li>";
						}
					 ?>
				</ul>
			<?php } ?>	
			
			
			<?php if (!empty($insts)) { ?>
				<h4><strong>INSTITUTE</strong></h4>
				<ul id="navigation">
					<?php 
						foreach($insts as $inst) {
							echo "<li><a href=\"/?page=catalogue&amp;institute=".$inst['id']."\"";
							echo Helper::getActive(array('institute' => $inst['id']));
							echo ">";
							echo Helper::encodeHtml($inst['name']);
							echo "</a></li>";
						}
					 ?>
				</ul>
			<?php } ?>		
		</div><!-- End left -->
		
		<div id="right">