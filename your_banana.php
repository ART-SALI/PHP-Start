<?php

echo "Your banana " . $_GET['banana'];

echo "<br>";
echo "<br>";

echo "Your banana is hungry";

echo "<br>";
echo "<br>";
?>

<form method='post' action='./happy_banana.php'>
    <label>Feed your banana</label>
    <input type="submit">
</form>

<form method='get' action='./home.php'>
    <label>Back to home page</label>
    <input type="submit">
</form>


