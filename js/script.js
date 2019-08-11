function validate(inputField) {
    if(inputField == 'username') {
        var x=document.forms["loginForm"]["username"].value;
        if (x==null || x=="") {
            document.getElementById("usernameError").innerHTML = "Please type a valid username";
            document.getElementById("username").focus();
            return false;
        } else {
            document.getElementById("usernameError").innerHTML = "";
            return true;
        }
    } else if(inputField == 'password') {
        var x=document.forms["loginForm"]["password"].value;
        if (x==null || x=="") {
            document.getElementById("passwordError").innerHTML = "Please type a valid password";
            document.getElementById("password").focus();
            return false;
        } else {
            document.getElementById("passwordError").innerHTML = "";
            return true;
        }
    } else if(inputField == 'all') {
        return validate('username') && validate('password');
    }
}