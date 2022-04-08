<?php include('header.php'); 

$firstname = $_SESSION['userid'];
unset($_SESSION['userid']);

session_destroy();

$name = session_start();
$expire = strtotime('-1 year');
$parms = session_get_cookie_params();
$domain = $parms['domain'];
$path = $parms['path'];
$secure = $parms['secure'];
$httponly = $parms['httponly'];

setcookie($name,'',$expire,$path,$domain,$secure,$httponly);
?>

<br>
<h1 class = "thank_you"> Thank you for signing out, <?php $firstname ?> </h1> 
<br>
<p> <a href = "."> Click here </a> to view a list of vehicles! </p>
<br>

<?php include('footer.php'); ?>

