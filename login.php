<h1>Please enter your username and password.</h1>
<form name="login" method="post" action="index.php?page=admin">
    <p>Username <input name="username" type="text" maxlength=30 /></p>
    <p>Password <input name="password" type="text" maxlength=30 /></p>
    <?php
	if(isset($_GET['error'])) {
		echo "Incorrect username or password";
	}
	
	?>


    <p><input type="submit" name="login" value="Submit" /></p>
</form>
