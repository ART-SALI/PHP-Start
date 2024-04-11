<?php

session_start();
echo "You have been logged out. Goodbye " . $_SESSION['banana_user_name'] . "<br>";
session_destroy();
echo "<a href='home.php'>Click here to go to homepage</a>";

?>
