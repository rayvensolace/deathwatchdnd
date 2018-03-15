<?php
$thisPage = "loginForm";
include_once("../lib/pageHeader.php");
     echo   "<form action='loginHandler.php' method='post'><div>Name:<input type='text' name='user' placeholder='username'></div>
        <div>Password:<input type='password' name='password' placeholder='Password'></div>
        <div><input type='submit' value='Submit'></div>
     </form>
</body>
    <footer class='footer widthDiv'>
        <div class='inlineContainer'></div>
        <div class='centerDiv'>
                You are filling out a login form
        </div>
        <div class='inlineContainer'></div></footer>
</html>";
     ?>