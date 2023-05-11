<?php
//This file is the base for all pages in the site. When creating a new page, we just open this one, then save a copy as the new page.
	include("dbconnect.php");
	session_start();
	if(!isset($_SESSION['admin'])) {
		header("Location:index.php");
	}
	if(isset($_GET['CategoryID'])) {
		$_SESSION['editcategory']['CategoryID']=$_GET['CategoryID'];
	}
	if(!isset($_SESSION['editcategory']['name'])) {
		$editcat_sql="SELECT * FROM category WHERE CategoryID=".$_GET['CategoryID'];
		$editcat_query=mysqli_query($dbconnect, $editcat_sql);
		$editcat_rs=mysqli_fetch_assoc($editcat_query);
		$_SESSION['editcategory']['name']=$editcat_rs['name'];
	}
?>
	<h1>Edit category</h1>
    <form action="index.php?page=editcategoryconfirm" method="post">
		<input name="name" value="<?php echo $_SESSION['editcategory']['name']; ?>" />
		<input type="submit" name="update" value="Update" />
	</form>