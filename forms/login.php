<?php
include_once("../Utils/SessionManagementUtils.php");
$thisPage = "loginForm";
include_once("../lib/pageHeader.php");
?>
<div class = 'formBackground'>
<form action='loginHandler.php' method='post'>
        <div>
            <?php if(sessionContainsSubIndex('errorMessages', 'invalidLogin')){
                echo $_SESSION['errorMessages']['invalidLogin'];
            }else {
                echo getIfContains('MESSAGE', null, 'Login To Be Awesome');
            }?>
        </div>

        <div style="display:inline-flex">Name:<div class="formInput"><input type='text' name='user'
                    <?php echo sessionContains("loginUser") ? "value= '". $_SESSION["loginUser"] . "'" : "placeholder='username'" ; ?> ></div>
            <div>
                <?php echo getIfContains('errorMessages', 'user','Required');?>
            </div>
        </div>
        <div> </div>
    <div style="display:inline-flex">Password:<div class="formInput"><input type='password' name='password' placeholder='Password'></div>
            <div>
                <?php echo getIfContains('errorMessages','password', 'Required')?>
            </div>
        </div>

        <div><input type='submit' value='Submit'></div>

     </form>
    <a href='../forms/createProfile.php'><button class='loginButton' type='button'>Create Profile</button></a>

</div>
</body>
    <footer class='footer widthDiv'>
        <div class='inlineContainer'></div>
        <div class='centerDiv'>
                You are filling out a login form. Isn't this Exciting?
        </div>
        <div class='inlineContainer'></div></footer>
</html>
<?php
unset($_SESSION["errorMessages"]);
unset($_SESSION["MESSAGE"]);
unset($_SESSION["loginUser"]) ;
