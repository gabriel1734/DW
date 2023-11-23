<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=DW","***","***");
} catch (PDOException $e){
    echo $e->getMessage();
}