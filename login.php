<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 11/1/2019
 * Time: 12:40 PM
 */
$pagetitle = "Login";
include_once "header.php";

//initiate variables
$showform = 1;
$errormsg = 0;
$errorusername = "";
$errorpassword = "";
if($_SERVER['REQUEST_METHOD'] == "POST") {
    //trim usernames and password to get rid of whitespace and make usernames lowercase
    $formdata['username'] = trim(strtolower($_POST['username']));
    $formdata['password'] = $_POST['password'];
    //check for empty fields
    if (empty($formdata['username'])) {
        $errorusername = "You Must Enter a Username";
        $errormsg = 1;
    }
    if (empty($formdata['password'])) {
        $errorpassword = "You Must Enter a Password";
        $errormsg = 1;
    }
    else{
        //confirm the account is correct
        try
        {
            $sqlusers = "SELECT * FROM gamingaccount WHERE username = :username";
            $stmtusers = $pdo->prepare($sqlusers);
            $stmtusers->bindValue(':username', $formdata['username']);
            $stmtusers->execute();
            $row = $stmtusers->fetch();
            $countusers = $stmtusers->rowCount();

            if ($countusers < 1) {
                echo  "<p class='important'>Cannot find this username.</p>";
            }
            else {
                if (password_verify($formdata['password'], $row['password'])) {
                    echo 'Successfully Login...';
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $showform = 0;
                } else {
                    echo "<p class='error'>The username and password combination you entered is not correct.  Please try again.</p>";
                }
            }
        }
        catch (PDOException $e)
        {
            echo "<div class='error'><p></p>ERROR selecting members!" .$e->getMessage() . "</p></div>";
            exit();
        }
    }
}
if($showform == 1){
    ?>
    <form name="login" id="login" method="POST" action="login.php">
    <table class="center">
        <tr><th><label for="username">Username:</label><span class="important">*</span></th>
            <td><input name="username" id="username" type="text" placeholder="Username"
                       value="<?php if(isset($formdata['username'])) {echo $formdata['username'];
                       }?>" /><span class="important"><?php if(isset($errorusername)){echo $errorusername;}?></span></td>
        </tr>
        <tr><th><label for="password">Password:</label><span class="important">*</span></th>
            <td><input name="password" id="password" type="password" placeholder="Password" /><span class="important"><?php if(isset($errorpassword)){echo $errorpassword;}?></span></td>
        </tr>
        <tr><th><label for="submit">Submit: </label></th>
            <td><input type="submit" name="submit" id="submit" value="submit"/></td>
        </tr>
    </table>
    <p class="important">* Indicates required field</p>
    <?php
}
require_once "footer.php";
?>