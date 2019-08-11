<?php

    require_once('./autoloader.php'); // include autoloader function
    autoload();

    
    if ( isset($_POST['username']) && isset($_POST['password']) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $request  = new webserverrequests();

        $arrayResult = $request->login($username, $password);

        $apiOutcome = $arrayResult['result'];
        if ($apiOutcome) {
            header("Location: http://".$GLOBALS['webserver']."/src/loginOk.php");
            die();
        }
    }


?><!DOCTYPE HTML>

<html>
    <head>
        <meta charset=”UTF-8″>
        <title>Login</title>
        <meta name="description" content="This is the login page for Hello Print" />
        <meta name="keywords" content="hello, print, test" />
        <meta name="author" content="Miguel Ruah" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/styles.css" />
        <script src="../js/script.js" type="text/javascript"></script>
    </head>

    <body>
        <img src="..\img\helloprint_logo_0x0.png" style="width:12%"></img>
        </br></br>

        <h1>Welcome to the login page</h1>
        </br></br>

        <form id="loginForm" name="loginForm" action="/src/index.php" onsubmit="return validate('all')"  method="post" accept-charset="UTF-8">
            <div class="loginContainer">
                <div class="loginRow">
                    <div class="loginLabel">
                        <label for="username">Username</label>
                    </div>
                    <div class="loginInput">
                        <input type="username" id="username" name="username" onblur="validate('username');" class="loginInputField" autofocus />
                    </div>
                </div>
                <div class="loginRow" id="usernameError"></div>
                <div class="loginRow">
                    <div class="loginLabel">
                        <label for="password">Password</label>
                    </div>
                    <div class="loginInput">
                        <input type="password" id="password" name="password" onblur="validate('password');" class="loginInputField"/>
                    </div>
                </div>
                <div class="loginRow" id="passwordError"></div>
                <div class="loginRow">
                    <input class="loginButton" type="submit" value="Login" />
                    <a href="http://<?php print $GLOBALS['webserver']; ?>/src/forgot.php" class="linkButtonContainer">
                        <input class="linkButton" type="button" value="Forgot my Password" />
                    </a>
                </div>
                <div id="loginError"><?php if( isset($apiOutcome) && !$apiOutcome ) {print 'Login unsuccessful - username or password may be incorrect';} ?></div>
            </div>
        </form>
    </body>
</html>
