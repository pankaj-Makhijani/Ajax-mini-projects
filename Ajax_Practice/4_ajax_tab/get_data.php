<?php 
include('db.php');
$id=$_POST['id'];
$sql="select id,title,data from page where id='$id'";
$stmt=$con->prepare($sql);
$stmt->execute();
$arr=$stmt->fetchall(PDO::FETCH_ASSOC);
echo $arr['0']['data'];
?>