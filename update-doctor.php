<?php
$id=$_POST["id"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$phone=$_POST["phone"];
$biography=$_POST["biography"];
$country=$_POST["country"];
$pricing=$_POST["pricing"];
$imgname=$_FILES["img"]["name"];
$old=$_FILES["img"]["tmp_name"];
$r=rand();
$t=time();
if(empty($old))
{
$q="UPDATE doctors SET firstname='$fname',lastname='$lname',phone='$phone',biography='$biography',pricing='$pricing',country='$country' WHERE id=$id";
}
else{
move_uploaded_file($old,"assets/img/doctors/$r$t$imgname");
$q="UPDATE doctors SET firstname='$fname',lastname='$lname',phone='$phone',biography='$biography',pricing='$pricing',country='$country',image_path='assets/img/doctors/$r$t$imgname' WHERE id=$id";
}
include("conn.php");
$insert=$conn->query($q);
if($insert)
{
header("location: doctor-profile-settings.php");
exit();
}