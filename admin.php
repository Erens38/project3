

<?php


session_start();

// check to see if user is logging out
if(isset($_GET['action'])) {
    if($_GET['action']=="logout") {
        unset($_SESSION['admin']);
    }
}


//if login form has been submitted, check if username and password match
if(isset($_POST['login']))  {
    $login_sql="SELECT * FROM user WHERE username='".$_POST['username']."' AND password='".sha1($_POST['password'])."'";
   if($login_query=mysqli_query($dbconnect, $login_sql)) {
     $login_rs=mysqli_fetch_assoc($login_query);
    //  $_SESSION['admin']=$login_rs['username'];
     if($login_rs != null) {
                    $_SESSION['admin']=$login_rs['username'];
                    include("cpanel.php");
        
                } 
                else {

                    header("Location:index.php?page=admin&error=login");
                    // include("login.php");
        
                }
   } else {
        header("Location:index.php?page=admin&error=login");

   }


}




if(isset($_SESSION['admin'])) {
    include("cpanel.php");
} else {
    include("login.php");
}
   

?>
