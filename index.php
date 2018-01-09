<?php
    require('views/shared/header.php');

    //VALIDATION VARIABLES
    $loginEmailError = "";
    $loginPassError = "";
    $emailError = false;
    $passError = false;

    if(isset($_POST['signIn'])){

        //GRAB USER INPUT
        $emailLogin = $_POST['email'];
        $passwordLogin = $_POST['password'];

        //CHECKS DATABASE FOR EMAIL
        $emailCheck = check_email(test_input($emailLogin));
        $emailResult = $emailCheck->fetch();

        if($emailResult) {
            //EMAIL IS IN DATABASE
            //CHECK PASSWORD
            if($passwordLogin !== $emailResult[1]){
                $loginPassError = "doesn't match the e-mail";
            }else{
                //BOTH EMAIL AND PASSWORD ARE VALID
                //LOGS USER IN
                $user = login_user($emailLogin, $passwordLogin);
                $result = $user->fetch();

                if($result){
                    
                    //USER LOGGED IN SUCCESSFULLY
                    //FETCHING USER DATA / INFO
                    $userID = $result[0];
                    $userFirstName = $result[2];
                    $userLasttName = $result[3];

                    //STARTS USER SESSION
                    $_SESSION['sessionUserID'] = $userID;
                    $_SESSION['sessionUserFirstName'] = $userFirstName;

                    header('location: dashboard.php');
                }
            }
        }else
        {
            //EMAIL ISNT IN DATABASE
            $loginEmailError = "...doesn't exsist, sorry";
        }
    }
?>
<div id="home-container">
    <div id="home-content-top">
    </div>
    <div id="home-content-bottom">
        <div class="button-container" id="signup-button">
            <a href="#" class="contact-link">Sign In</a>
            <div class="button-animation"></div>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="false">
            <label for="email" class="input-label">Email:&nbsp;</label><span class="input-error"><?php echo $loginEmailError ?></span>
            <input type="text" name="email" class="form-input error-input-text" autocomplete="false">
            <label for="email" class="input-label">Password:&nbsp;</label><span class="input-error"><?php echo $loginPassError ?></span>
            <input type="password" name="password" class="form-input" autocomplete="false">
            <button type="submit" name="signIn" class="button-container form-button">Submit</button>
        </form>
        <div class="container-center-text">
            <a href="signup.php" class="link-text">Don't have an account...</a>
        </div>
    </div>
</div>
<?php
    require('views/shared/footer.php');
?>