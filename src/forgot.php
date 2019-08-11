<?php
    require_once('./autoloader.php'); // include autoloader function
    autoload();

    
    if ( isset($_POST['username']) ) {
        $username    = $_POST['username'];

        $request  = new webserverrequests();

        $arrayResult = $request->forgot($username);
        
        // for security reasons, the user should not be informed if the username was found in our database
        // but the guidelines require the outcome to be printed on screen
        $outcome = $arrayResult['result'];
    }
?><!DOCTYPE HTML>

<html>
    <head>
        <meta charset=”UTF-8″>
        <title>Forgot my Password</title>
        <meta name="description" content="This is the forgot password page for Hello Print" />
        <meta name="keywords" content="hello, print, test" />
        <meta name="author" content="Miguel Ruah" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/styles.css" />
        <script src="../js/script.js" type="text/javascript"></script>
    </head>

    <body>
        <img src="..\img\helloprint_logo_0x0.png" style="width:12%"></img>
        </br></br>

        <h1>Forgot your password ?</h1>
        <h3>Don't worry, we're here to help.</h3>
        </br>

<?php
    if ( ! isset($_POST['username']) ) {
        include("forgotForm.php"); // a simple form to type the user's username
    } else if (isset($outcome) && $outcome) {
        print "<p>Yay !! We reset your password and sent you an email.</p>";
        print "<p>If you don't see our email, please check your SPAM box.</p>";
        print "<p>Thank you,</p>";
        print "<p>the <img src=\"..\img\helloprint_logo_0x0.png\" style=\"height:20px;\"></img> team</p>";
        print "<a href=\"http://".$GLOBALS['webserver']."/src/index.php\" class=\"linkButtonContainer\">\n";
        print "    <input class=\"linkButton\" type=\"button\" value=\"Back to Login page\" />\n";
        print "</a>\n";
    } else {
        print "<p>Hmm... We couldn't find this username or a system error occurred.</p>";
        print "<p>Don't worry, we log these things and a solution is on the way.</p>";
        print "<p>Please try again later.</p>";
        print "<p>Thank you,</p>";
        print "<p>the <img src=\"..\img\helloprint_logo_0x0.png\" style=\"height:20px;\"></img> team</p>";
        print "<a href=\"http://".$GLOBALS['webserver']."/src/index.php\" class=\"linkButtonContainer\">\n";
        print "    <input class=\"linkButton\" type=\"button\" value=\"Back to Login page\" />\n";
        print "</a>\n";
    }
?>    
    </body>
</html>
