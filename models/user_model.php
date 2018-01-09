<?php

    //TESTS USER INPUT FOR INPROPER CHARACTERS
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //CREATES A NEW USER
    function create_user($email, $password, $firstName, $lastName, $houseNumber, $street, $city, $country, $postalCode) {
        
        global $db;
        $query = "INSERT INTO tbluser (email, password, firstname, lastname, housenumber, street, city, country, postalcode)" . 
        "VALUES ('$email', '$password', '$firstName', '$lastName', '$houseNumber', '$street', '$city', '$country', '$postalCode')";
        $result = $db->query($query);
        return $result;
    }

    //CHECKS USER EMAIL DURING LOGIN
    function check_email($email) {
        global $db;
        $query = "SELECT email, password FROM tbluser WHERE email='$email'";
        $result = $db->query($query);
        return $result;
    }

    //LOGS USER IN
    function login_user($email, $password) {
        
        global $db;
        $query = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
        $result = $db->query($query);
        return $result;
    }
?>