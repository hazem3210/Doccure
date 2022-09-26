<?php
$id=$_POST["id"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$date=$_POST["date"];
$blood=$_POST["blood"];
$mobile=$_POST["mobile"];
$city=$_POST["city"];
$address=$_POST["address"];
$zip=$_POST["zip"];
$country=$_POST["country"];
$state=$_POST["state"];
$imgname=$_FILES["img"]["name"];
$old=$_FILES["img"]["tmp_name"];
$r=rand();
$t=time();

if(empty($old))
{
$q="UPDATE patients SET firstname='$fname',lastname='$lname',date_of_birth='$date',blood_group='$blood',mobile='$mobile',address='$address',city='$city',zip='$zip',country='$country',state='$state' WHERE id=$id";
}
else{
move_uploaded_file($old,"assets/img/patients/$r$t$imgname");
$q="UPDATE patients SET firstname='$fname',lastname='$lname',date_of_birth='$date',blood_group='$blood',mobile='$mobile',address='$address',city='$city',zip='$zip',country='$country',state='$state',image_path='assets/img/patients/$r$t$imgname' WHERE id=$id";
}
include("conn.php");
$insert=$conn->query($q);
if($insert)
{
header("location: profile-settings.php");
exit();
}