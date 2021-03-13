<?php 
try{
    $con=new PDO("mysql:host=localhost;dbname=demo","root","");
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>