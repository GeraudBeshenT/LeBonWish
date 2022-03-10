<?php
if (isset($_POST['submit']))
{
    session_start();
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['genre'] = $_POST['genre'];
    header('Location: index.php');
}
session_start();
if ($_SERVER['QUERY_STRING'] == 'noname')
{
    unset($_SESSION['name']);
}
else
{
$name = $_SESSION['name'];
$genre = $_SESSION['genre'];
}
?>