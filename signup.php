<?php
    require('views/shared/header.php');

    //VALIDATION VARIABLES
    $inputValidation = true;
    $emailError = "";
    $passwordError = "";
    $firstNameError = "";
    $lastNameError = "";
    $houseNumberError = "";
    $streetError = "";
    $cityError = "";
    $countryError = "";
    $postalCodeError = "";
    
    if(isset($_POST['signUp']))
    {
        //CHECKS IF ANY INPUT FIELDS ARE EMPTY
        if(empty($_POST['firstName'])) {
            $firstNameError = "was empty";
            $inputValidation = false;
        }
        if(empty($_POST['lastName'])) {
            $lastNameError = "was empty";
            $inputValidation = false;
        }
        if(empty($_POST['houseNumber'])) {
            $houseNumberError = "was empty";
            $inputValidation = false;
        }
        if(empty($_POST['street'])) {
            $streetError = "was empty";
            $inputValidation = false;
        }
        if(empty($_POST['city'])) {
            $cityError = "was empty";
            $inputValidation = false;
        }
        if(empty($_POST['country'])) {
            $countryError = "was empty";
            $inputValidation = false;
        }
        if(empty($_POST['postalCode'])) {
            $postalCodeError = "was empty";
            $inputValidation = false;
        }

        //CHECKS FOR EXSSISTING EMAIL
        $emailLogin = $_POST['email'];
        $emailCheck = check_email(test_input($emailLogin));
        $emailResult = $emailCheck->fetch();

        if($emailResult){
            $emailError = "already exsists";
            $inputValidation = false;
        }

        //IF ALL DATA IS VALID, CREATES USER
        if($inputValidation === true) {
            //GRABS DATA FROM POST
            $newEmail = test_input($_POST['email']);
            $newPassword = test_input($_POST['password']);
            $newFirstName = test_input($_POST['firstName']);
            $newLastName = test_input($_POST['lastName']);
            $newHouseNumber = test_input($_POST['houseNumber']);
            $newStreet = test_input($_POST['street']);
            $newCity = test_input($_POST['city']);
            $newCountry = test_input($_POST['country']);
            $newPostalCode = test_input($_POST['postalCode']);
            
            //CREATES USER
            create_user($newEmail, $newPassword, $newFirstName, $newLastName, $newHouseNumber, $newStreet, $newCity, $newCountry, $newPostalCode);

            //RESETS INFORMATION TO BE VALID
            $emailError = "";
            $passwordError = "";
            $firstNameError = "";
            $lastNameError = "";
            $houseNumberError = "";
            $streetError = "";
            $cityError = "";
            $countryError = "";
            $postalCodeError = "";
        }
    }
?>

<div class="header-shared"></div>
<div class="content-container">
    <div class="container-center-text">
        <p class="text-header text-desc">Sign-Up</p>
        <p class="link-text">Give us some info...</p>
    </div>
    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="false">
            <label for="email" class="input-label">Email:&nbsp;</label><span class="input-error"><?php echo $emailError ?></span>
            <input type="text" name="email" class="form-input" autocomplete="false">
            <label for="email" class="input-label">Password:&nbsp;</label><span class="input-error"><?php echo $passwordError ?></span>
            <input type="password" name="password" class="form-input" autocomplete="false">
            <label for="email" class="input-label">First Name:&nbsp;</label><span class="input-error"><?php echo $firstNameError ?></span>
            <input type="text" name="firstName" class="form-input">
            <label for="email" class="input-label">Last Name:&nbsp;</label><span class="input-error"><?php echo $lastNameError ?></span>
            <input type="text" name="lastName" class="form-input">
            <label for="email" class="input-label">House Number:&nbsp;</label><span class="input-error"><?php echo $houseNumberError ?></span>
            <input type="text" name="houseNumber" class="form-input">
            <label for="email" class="input-label">Street:&nbsp;</label><span class="input-error"><?php echo $streetError ?></span>
            <input type="text" name="street" class="form-input">
            <label for="email" class="input-label">City:&nbsp;</label><span class="input-error"><?php echo $cityError ?></span>
            <input type="text" name="city" class="form-input">
            <label for="email" class="input-label">Country:&nbsp;</label><span class="input-error"><?php echo $countryError ?></span>
            <input type="text" name="country" class="form-input">
            <label for="email" class="input-label">Postal Code:&nbsp;</label><span class="input-error"><?php echo $postalCodeError ?></span>
            <input type="text" name="postalCode" class="form-input">
            <button type="submit" name="signUp" class="button-container form-button">Submit</button>
        </form>
    </div>
</div>

<?php
    require('views/shared/footer.php');
?>