<?php

session_start();

$_SESSION['time'] = date("H:i:s");
echo "Time is " . $_SESSION['time'] . "<br>";

$_SESSION['counter'] = $_SESSION['counter'] ?? 0;

sleep(1);

$_SESSION['counter']++;

sleep(1);

$_SESSION['time'] = date("H:i:s");

echo 'Page count '. $_SESSION['counter'] . "<br>";
echo "Time is " . $_SESSION['time'];