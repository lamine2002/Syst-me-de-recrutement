<?php

$server='localhost';
$user='root';
$password='';
$dbname='workspace1';

try{

    $connexion= new PDO("mysql:host=$server;dbname=$dbname",$user,$password);

}catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}




?>