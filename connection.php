<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 11/1/2019
 * Time: 12:40 PM
 */

//establish Connection
try{
    $connString = "mysql:host=localhost;dbname=csci22501fa18";
    $user = "csci22501fa18";
    $pass = "csci22501fa18!";
    $pdo = new PDO($connString,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    die( $e->getMessage() );
}
