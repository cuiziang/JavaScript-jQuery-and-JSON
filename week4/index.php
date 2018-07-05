<?php // Do not put any HTML above this line
session_start();

require_once "pdo.php";
require_once "util.php";

$stmt = $pdo->query("SELECT profile_id, first_name,last_name , headline from users join Profile on users.user_id = Profile.user_id");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <?php require_once "head.php"; ?>
    <title>Chuck Severance's Resume Registry ae3f4c64</title>
</head>
<body>
<div class="container">
    <h2>Chuck Severance's Resume Registry</h2>
    <?php
    if (isset($_SESSION['name'])) {
        echo '<p><a href="logout.php">Logout</a></p>';
    }
    ?>
    <?php
    flashMessage();
    ?>

    <ul>

        <?php
        if (!isset($_SESSION['name'])) {
            echo "<p><a href='login.php'>Please log in</a></p>";
        }
        if (true) {
            if (true) {
                echo "<table border='1'>";
                echo " <thead><tr>";
                echo "<th>Name</th>";
                echo " <th>Headline</th>";
                if (isset($_SESSION['name'])) {
                    echo("<th>Action</th>");
                }
                echo " </tr></thead>";
                foreach ($rows as $row) {
                    echo "<tr><td>";
                    echo("<a href='view.php?profile_id=" . $row['profile_id'] . "'>" . $row['first_name'] . $row['last_name']  . "</a>");
                    echo("</td><td>");
                    echo($row['headline']);
                    echo("</td>");
                    if (isset($_SESSION['name'])) {
                        echo("<td>");
                        echo('<a href="edit.php?profile_id=' . $row['profile_id'] . '">Edit</a> / <a href="delete.php?profile_id=' . $row['profile_id'] . '">Delete</a>');
                    }
                    echo("</td></tr>\n");
                }
                echo "</table>";
            } else {
                echo 'No rows found';
            }
        }
        echo '</li></ul>';
        ?>
        <p><a href="add.php">Add New Entry</a></p>
        <p>
            <b>Note:</b> Your implementation should retain data across multiple
            logout/login sessions. This sample implementation clears all its
            data periodically - which you should not do in your implementation.
        </p>
</div>
</body>
</html>