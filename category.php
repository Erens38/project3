<?php
	// If categoryID is not set, redirect back to index page
	if(!isset($_GET['CategoryID'])) {
		header("Location:index.php");
	}
	// Select all stock items belonging to the selected categoryID
	$stock_sql= "SELECT stock.stockID, stock.name, stock.price, category.name AS catname FROM stock JOIN category ON stock.categoryID=category.categoryID WHERE stock.categoryID=".$_GET['categoryID'];
	if($stock_query=mysqli_query($dbconnect, $stock_sql)) {
		$stock_rs=mysqli_fetch_assoc($stock_query);
	}
	if(mysqli_num_rows($stock_query)==0) {
        echo "Sorry, we havo no items currently in stock";

    } else {

    ?>
    <h1><?php echo $stock_rs['catname']; ?></h1>

    <?php


    }
	?>