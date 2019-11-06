<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 10/21/2019
 * Time: 5:13 PM
 */
$pagetitle = "Display Available Students";
include_once "header.php";

try{
    //query the data
    $sql = "SELECT * FROM gamingaccount";
    $result = $pdo->query($sql);
    ?>
    <?php
    echo "<table>
            <h2 class='center'>Preorders</h2>
            <tr><th>Username</th><th>Game</th><th>email</th></tr>";
    //loop through the results and display to the screen
    foreach ($result as $row){
        echo "<tr><td>{$row['username']}</td><td>" .$row['game']."</td><td>{$row['email']}</td><td>"; "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e)
{
    die( $e->getMessage() );
}
require_once "footer.php";
