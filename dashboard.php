<?php
    require('views/shared/header.php');
    
    if(isset($_SESSION['sessionUserID'])){
        //GETS USER INFO
        $userID = $_SESSION['sessionUserID'];
        $userFirstName = $_SESSION['sessionUserFirstName'];

        //GETS ALL LISTS USING USER ID
        $lists = get_lists($userID);
        $listCount = $lists->rowCount();
    }

    if(isset($_POST['logout'])){
        //DESTROYS USER SESSION
        session_destroy();
        header('location: index.php');
    }
?>

<div class="header-shared"></div>
<div class="content-container">
    <?php if($listCount > 0) { ?>
        <?php foreach($lists as $list) : ?>
        <a href="list.php?varname=<?php echo $list['wishlistID'] ?>">
            <div class="thumb-list-container">
                <div class="thumb-list-container-top"></div>
                <div class="thumb-list-container-bot">
                    <p class="thumb-list-title"><?php echo $list['title'] ?></p>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    <?php } ?>
    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <button type="submit" name="logout" class="button-container form-button">Logout</button>
        </form>
    </div>
</div>

<?php
    require('views/shared/footer.php');
?>