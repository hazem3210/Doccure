<?php
$id=$_GET["id"];
$q="UPDATE appointments SET status=1 WHERE id=$id";
include("conn.php");
$finish=$conn->query($q);
if($finish)
{
    header("location: doctor-dashboard.php");
    exit();
}