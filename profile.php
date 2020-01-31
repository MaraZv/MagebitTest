<?php
    require_once("head.php");
    require("layout/header.php");

    if (! isset($_SESSION['user_id']) && $user === null) {
        session_destroy();
        show_error('Please log in');
    }

    if (isset($_GET['update_profile'], $_FILES['image'], $_POST['birthday'], $_POST['interests'], $_POST['hash'])) {
        if(isset($_SESSION['profile_unique_hash']) && $_SESSION['profile_unique_hash'] === $_POST['hash']) {
            $error = "Profile has already been updated";
        } else {
            $files_info = $_FILES['image'];
            $tmp_name = $files_info['tmp_name'];

            $filename = microtime();
            $filename = str_replace(' ', '_', $filename);
            $filename = str_replace('.', '_', $filename);
            $filename = $filename . ".";

            $pathinfo = pathinfo($files_info['name']);
            $filename = $filename . $pathinfo['extension'];
            $target_file = "./uploads/" . $filename;
            $result = move_uploaded_file($tmp_name, $target_file);

            $birthday = $_POST['birthday'];
            $interests = $_POST['interests'];
            $user_id = $_SESSION['user_id'];

            $result = Attributes::insert($filename, $birthday, $interests, $user_id);

            if ($result) {
                if ($attributes->image !== null && file_exists("./uploads/" . $attributes->image)) {
                    unlink("./uploads/" . $attributes->image);
                }

                $attributes->image = $filename;
            }
        }
    }
?>

<div class="btnContainer">
    <v-btn rounded color="error" href="?logout=1" class="logoutbtn">Log out</v-btn>
</div>

<div class="profileInfo">
    <p>Name: <?php echo $user->name ?></p>
    <p>E-mail: <?php echo $user->email ?></p>
</div>
            
<v-row class="profileRow">
    <v-col class="profileForm">
        <h2>Update your profile</h2>
        
        <v-form method="post" action="?update_profile" enctype="multipart/form-data">
            <input type="hidden" name="hash" value="<?php echo microtime() ?>" />
            <p>Enter your birthday:<v-text-field type="date" name="birthday"></v-text-field></p>
            <p>Add image:<v-file-input name="image" accept=".jpg,.png,.jpeg,.ico,.svg" label="File input"></v-file-input></p>
            <p>Your interests: <v-text-field name="interests"></v-text-field> </p>
            <v-btn type="submit" rounded depressed color="primary">Submit</v-btn>
        </v-form>
        
    </v-col>
</v-row>

<?php
    require("layout/footer.php");
?>