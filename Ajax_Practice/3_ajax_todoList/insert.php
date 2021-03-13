<?php
$con=mysqli_connect('localhost','root','','demo');
$textbox=$_POST['textbox'];
$sql="insert into todo_list(title) values('$textbox')";
mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
echo $id;
?>