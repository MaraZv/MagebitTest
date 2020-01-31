<?php 
    session_start();
  
    function autoloadModel($className) {
        $filename = "models/" . $className . ".php";

        if (is_readable($filename)) {
        require $filename;
        }
    }

    function autoloadUtilities($className) {
        $filename = "utilities/" . $className . ".php";

        if (is_readable($filename)) {
            require $filename;
        }
    }
  
    spl_autoload_register("autoloadModel");
    spl_autoload_register("autoloadUtilities");

    $db = new DB();
    $user = null;
    $attributes = new Attributes();

    if (isset($_SESSION['user_id'])) {
        $user = User::get($_SESSION['user_id']);
    }

    function validate_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function show_error($text) {
        header('Location: index.php?error=' . $text);

        exit;
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: index.php');
      }
