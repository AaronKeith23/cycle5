<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 11/1/2019
 * Time: 12:40 PM
 */
session_start();
// Finally, destroy the session.
session_destroy();
session_destroy();
//echo 'username: ' .  $_SESSION['username'];

header('Location: index.php');
header('Location: index.php');

?>