<?php 
include('db.php');
$id=$_POST['id'];
$sql="delete from user where id='".$id."'";
$stmt=$con->prepare($sql);
$stmt->execute();
?>