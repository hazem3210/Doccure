<?php
$id=$_GET["id"];
$q="UPDATE appointments SET status=2 WHERE id=$id";
include("conn.php");
$finish=$conn->query($q);
if($finish)
{
    header("location: patient-dashboard.php");
    exit();
}