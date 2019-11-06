<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 11/1/2019
 * Time: 12:40 PM
 */
session_start();

require_once "connection.php";
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Aaron's Gaming Website</title>
    <link rel="stylesheet" href="stylesheet.css" />
</head>
<body>
<header>
    <h1 class="center"><?php echo $pagetitle; ?></h1>
    <nav><?php require_once "navigation.php"; ?></nav>
</header>
<main>
