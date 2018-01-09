<?php

function get_lists($userID)
{
    global $db;
    $query = "SELECT * FROM tblwishlist WHERE userID='$userID' AND status='open'";
    $result = $db -> query($query);
    return $result;
}

?>