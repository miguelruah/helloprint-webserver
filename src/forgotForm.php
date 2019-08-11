        <form id="loginForm" name="loginForm" action="/src/forgot.php" onsubmit="return validate('username')"  method="post" accept-charset="UTF-8">
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
                    <input class="loginButton" type="submit" value="Submit" />
                </div>
            </div>
        </form>
