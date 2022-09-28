<?php
session_start();
ob_start();
if(!isset($_SESSION["user"]))
{
    header("location: index.php");
    exit();
}
?>