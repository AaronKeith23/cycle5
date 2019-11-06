<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 11/1/2019
 * Time: 12:40 PM
 */
$currentfile = "";

?>
<div class="topnav">
<ul>
    <?php
    echo ($currentfile == "index.php") ? "<li>Home</li>" : "<li><a href='index.php'>Home</a></li>";
    if(!isset($_SESSION['username'])){echo "<li><a href='cod.php'>Modern Warfare 16</a></li>";}
    if(!isset($_SESSION['username'])){echo "<li><a href='madden.php'>Madden 22</a></li>";}
    if(!isset($_SESSION['username'])){echo "<li><a href='nba.php'>NBA 2K22</a></li>";}
    echo ($currentfile == "registration.php") ? "<li>Place Order</li>" : "<li><a href='registration.php'>Place Order</a></li>";
    if(!isset($_SESSION['username'])){echo "<li><a href='orders.php'>Pre-Orders</a></li>";}
    ?>
</ul>
</div>
