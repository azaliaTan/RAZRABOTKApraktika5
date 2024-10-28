<?php 

try{
    $link=new PDO("mysql:host=localhost;charset=utf8;dbname=manual",'root','root');
}catch(PDOException $e){
    echo '$e';
}


?>