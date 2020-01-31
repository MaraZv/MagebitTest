<?php
    require_once("head.php");
    require("layout/header.php");
?>
      
<div class="registerBack">
    <v-row>
        <div class="border"></div>
        <v-col cols="5" id="signUpTxt">
            <div>
                <div class="formTitle">Don't have an account?</div>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed purus finibus,
                    tempus
                    massa aliquam, aliquam purus.</p>
                <v-btn rounded depressed x-large color="primary" type="submit" onclick="slideLeft()">
                    Sign up</v-btn>
            </div>
        </v-col>

        <v-col cols="5">
            <div id="logInTxt">
                <div class="formTitle">Have an account?</div>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <v-btn rounded x-large depressed color="primary" type="submit" class="slideRight"
                    onclick="slideRight()">
                    Login</v-btn>
            </div>
        </v-col>

        <v-col cols="5" id="animation" class="registerFront">
            <div id="loginForm">
                <div class="formTitle">Login</div>
                <img class="logo" src="/images/logo.png" alt="logo">
                <hr>
                <v-form action="login.php" method="post">
                    <v-text-field name="email" label="E-mail*" required>
                    </v-text-field>
                    <v-text-field type="password" name="password" label="Password*" required>
                    </v-text-field>
                    <v-btn rounded depressed x-large color="error" type="submit">Login
                    </v-btn>
                    <span class="forgotLink">Forgot?</span>
                </v-form>
            </div>
        </v-col>

        <v-col cols="7" id="animation2" class="registerFront2">
            <div id="signupForm">
                <div class="formTitle">Sign up</div>
                <img class="logo" src="/images/logo.png" alt="logo">
                <hr>
                <v-form action="store.php" method="post">
                    <v-text-field name="name" label="Full name*" required></v-text-field>
                    <v-text-field name="email" label="E-mail*" required>
                    </v-text-field>
                    <v-text-field name="password" type="password" label="Password*" required>
                    </v-text-field>
                    <v-btn rounded depressed x-large color="error" type="submit">Sign up
                    </v-btn>
                </v-form>
            </div>
        </v-col>

    </v-row>
</div>

<?php if(isset($_GET['error'])) { ?>
    <div class="alert">
        <?php
            echo $_GET['error'];
        ?>
    </div>
<?php } ?>
            
<?php
    require("layout/footer.php");
?>