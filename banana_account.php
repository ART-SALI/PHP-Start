<?php

$myName = "Banana";
$myPassword = "Banana";


if($myName == $_REQUEST['banana_user_name']
    && $myPassword == $_REQUEST['password']){

    session_start();
    setcookie("banana_user_name", $_REQUEST['banana_user_name'], time() + 60*60*8);
    echo "Hello " . $_COOKIE['banana_user_name'] . "<br>";
    $_SESSION['banana_user_name'] = $_COOKIE['banana_user_name'];
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "You are not authorized banana<br>";
    echo "<a href='home.php'>Go Back</a>";
}


echo "<br>";
echo "<br>";
?>

