<?php
    include 'includes/config.php';
    include 'includes/classes/Account.php';
    include 'includes/classes/Constants.php';

    $account = new Account($con);

    include 'includes/handlers/register-handler.php';
    include 'includes/handlers/login-handler.php';

    function getInputValue($name)
    {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Slotify 5!</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <?php
        if(isset($_POST['registerButton'])) {
            echo '<script>
            $(document).ready(function() {
                $("#loginForm").hide();
                $("#registerForm").show();
            });
            </script>';
        }else {
            echo '<script>
            $(document).ready(function() {
                $("#loginForm").show();
                $("#registerForm").hide();
            });
            </script>';
        }
    ?>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form action="register.php" method="POST" id="loginForm">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed) ?>
                        <label for="loginUsername">Username</label>
                        <input type="text" id="loginUsername" name="loginUsername" type="text" placeholder="Username" value="<?php getInputValue('loginUsername')?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
                    </p>
                    <button type="submit" name="loginButton">LOG IN</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form action="register.php" method="POST" id="registerForm">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters) ?>
                        <?php echo $account->getError(Constants::$usernameTaken) ?>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" type="text" value="<?php getInputValue('username')?>" placeholder="Username" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters) ?>
                        <label for="firstName">First name</label>
                        <input type="text" id="firstName" name="firstName" type="text" value="<?php getInputValue('firstName')?>" placeholder="First Name" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters) ?>
                        <label for="lastName">Last name</label>
                        <input type="text" id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName')?>" placeholder="Last Name" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
                        <?php echo $account->getError(Constants::$emailInvalid) ?>
                        <?php echo $account->getError(Constants::$emailTaken) ?>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" type="text" value="<?php getInputValue('email')?>" placeholder="Email" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
                        <?php echo $account->getError(Constants::$emailInvalid) ?>
                        <label for="email2">Confirm email</label>
                        <input type="email" id="email2" name="email2" type="text" value="<?php getInputValue('email2')?>" placeholder="Confirm Email" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric) ?>
                        <?php echo $account->getError(Constants::$passwordCharacters) ?>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" type="password" placeholder="Your password" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric) ?>
                        <?php echo $account->getError(Constants::$passwordCharacters) ?>
                        <label for="password2">Confirm password</label>
                        <input type="password" id="password2" name="password2" type="password" placeholder="Your password" required>
                    </p>
                    <button type="submit" name="registerButton">SIGN UP</button>
                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log in here.</span>
                    </div>
                </form>
            </div>
            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>