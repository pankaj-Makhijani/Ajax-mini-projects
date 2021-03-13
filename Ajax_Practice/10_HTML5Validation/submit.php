<?php
sleep(3);
include('db.php');
$name=$_POST['name'];
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];

$sql="insert into data(name,username,mobile,pwd) values('$name','$username','$mobile','$password')";
$stmt=$con->prepare($sql);
$stmt->execute();
?>