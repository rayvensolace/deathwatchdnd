<?php
$thisPage = "loginForm";
include_once("../lib/pageHeader.php");


$nerd = null;
if(getIfContains("NERD") != null) {
    $nerd = unserialize(getIfContains("NERD"));
}
if($nerd != null && $nerd->getName() == 'Guest'){
    $nerd = null;
}
$username = $nerd== null ? getIfContains("loginuser") : $nerd->getName();
$useremail = $nerd== null ? getIfContains("userEmail") : $nerd->getEmail();
$getDemo = $nerd == null ? null : $nerd->getDemo();


  echo "
    <div class = 'formBackground'><h1 class='formHeader'>Profile</h1>
    <form action='createProfileHandler.php' method='post'>
    
    <div>Name can contain Upper and Lower case letters spaces and dashes, must be longer than 4 characters</div>
    <div>User Name"; //User Name Form
  echo $username != null ? "": "(aka. Nerd Alias)";
  echo ":<input type='text' name='user' ";
  echo $username != null ? "value= '" . $username . "'" : "placeholder='username'" ;
  echo ">". getIfContains("errorMessages","user", ""). "</div>

     
    <div>E-mail Address";//email address form
  echo $username != null ? "" : "(where do I send the owl when you forget your secret word)";
  echo ":<input type='text' name='email' ";
  echo $useremail != null ? "value= '" . $useremail . "'" : "placeholder='user email'" ;
  echo ">". getIfContains("errorMessages","email", ""). "</div>
    
    <div>Password must contain Upper and Lower case letters and at lest one number</div>
    <div>Password";//Dual password form
  echo $username != null ? "":"(Speak friend and enter)";
  echo ":<input type='password' name='passwordOriginal' placeholder='Password'>". getIfContains("errorMessages","password", ""). "</div>
    <div>Password";
  echo $username != null ? "": "(Can you type that again?)";
  echo ":<input type='password' name='passwordSecondary' placeholder='Password'></div>";

  //Demo Material
  echo $getDemo == null ? "": "<div>Show demo material<input type='checkbox' name='getDemo' ";
  echo ($getDemo == null || $getDemo == 0) ? "":"checked";
  echo $getDemo == null  ? "": "></div>";


  echo "<div><input type='submit' value='Submit'></div>
    </form>
    </div>
  </body>
    <footer class='footer widthDiv'>
        <div class='inlineContainer'></div>
        <div class='centerDiv'>
                You are filling out a form
        </div>
        <div class='inlineContainer'></div></footer>
</html> ";

unset($_SESSION["errorMessages"]);
unset($_SESSION["MESSAGE"]);
unset($_SESSION["loginUser"]) ;
unset($_SESSION["userEmail"]) ;