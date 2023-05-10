
<?php
$cat_sql="SELECT * FROM Category";
			$cat_query=mysqli_query($dbconnect, $cat_sql);
			$cat_rs=mysqli_fetch_assoc($cat_query);
		?>
        <p><?php
			do { ?>
			<a href="index.php?page=Category&CategoryID=<?php echo $cat_rs['CategoryID']; ?>"><?php echo $cat_rs['name']; ?></a>
				
				<?php
			} while ($cat_rs=mysqli_fetch_assoc($cat_query));