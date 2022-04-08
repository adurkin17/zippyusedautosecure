<?php 
    include('header.php');
    ?>
<form action="." method="GET" class="register_form" >
    <input type="hidden" name="action" value="register" >
</form>
<form action="." method = "POST" class="register_form">
    <label for="username"> Username: </label>
    <input type="text" id="username" name="username" maxlength="255" required>
    <label for="password"> Password: </label>
    <input type="text" id="password" name="password" maxlength="255" required>
    <label for="confirmPassword"> Confirm Password: </label>
    <input type="text" id="confirmPassword" name="confirmPassword">
    <input type="submit" value="Register" class="button blue">
</form> 