<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="styles/login-signup_form.css">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>
    <body>
        <!--Logo when clicked leads back to home page-->
        <a class="logo" href="home.html">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Dispenzer
        </a>
        <section class="login-form">
            <h1>Login</h1>
            <div id="successmmsg">
            <h3 id="message"><?php session_start();
             echo $_SESSION['sccmmsg'];
            $_SESSION['sccmmsg']=""?></h3>
            </div>
            <form action="login.php" method="post">
                <div class="user-box">
                    <input type="text" name="username" id="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" required>    
                    <label for="password">Password</label>
                </div>
                
                
                
                <button type="submit" name="submit">Login</button>
            </form><br>
            <a class="login-signup" href="signup.html">Don't have an account? Sign up</a>
        </section>
        
        
    </body>
</html>
<script>
    setTimeout(function(){
var msg=document.getElementById("message");
msg.parentNode.removeChild(msg);
}, 1000);
    </script>