<?php
    require("head.php");
     
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if (! validate_email($email)) {
        show_error('E-mail is incorrect');
    }

    $user = User::get($email);

    if ($user === null) {
        show_error('This e-mail is not registered');
    }

    if (! $user->validPassword($password)) {
        show_error('Password is incorrect');
    }

    $_SESSION['user_id'] = $email;
    
    header('location: profile.php');

?>