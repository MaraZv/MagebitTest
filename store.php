<?php
    require("head.php");
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    if(isset($name)) {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        show_error("Please enter your full name");
        }
    }
        
    if (! validate_email($email)) {
        show_error('Please enter a valid e-mail address');
    }

    if (strlen($password)<5) {
        show_error('Password must be at least 5 characters long');
    }

    $success = User::insert($email, md5($password), $name);
    
    if ($success) {
        $_SESSION['user_id'] = $email;
        header('location: success.php?success=1');
    } else {
        show_error('Sorry! We are having issues with database connection.');
    }
?>