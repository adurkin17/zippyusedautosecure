<?php include('header.php'); ?>

<?php if (!$firstname) { ?> 

<form action="." method="GET" class="register_form" >
    <input type="hidden" name="action" value="register" >
    <label for="firstName"> Please enter your first name: </label>
    <input type="text" id="firstName" name="firstName" maxlength="50" required>
    <input type="submit" value="Register" class="button blue">
</form> 


<?php } else { ?>
    <br> 
    <h1 class="thank_you" > Thank you for registering, <?php $firstname ?> </h1> 
    <br>
    <p><a href="."> Click Here </a> to view a full list of vehicles! </p>
    <br>
<?php } ?> 
<?php include('footer.php'); ?>
