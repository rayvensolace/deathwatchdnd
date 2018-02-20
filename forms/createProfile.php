<?php
$thisPage = "loginForm";
include_once("../lib/pageHeader.php");
  echo "
    <form action='createProfileHandler.php' method='post'>
    <div>User Name(aka. Nerd Alias):<input type='text' name='user' placeholder='username'></div>
    <div>E-mail Address(where do I send the owl when you forget your secret word):<input type='text' name='email' placeholder='email'></div>
    <div>Password(Speak friend and enter):<input type='password' name='password' placeholder='Password'></div>
    <div>Password(Can you type that again?):<input type='password' name='password' placeholder='Password'></div>
    <div><input type='submit' value='Submit'></div>
    </form>
  </body>
    <footer class='footer widthDiv'>
        <div class='inlineContainer'></div>
        <div class='centerDiv'>
                You are filling out a form
        </div>
        <div class='inlineContainer'></div></footer>
</html> ";