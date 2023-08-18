<?php
require_once('db.php');

function nombre_de_poste(){
    global $connexion;
    $sql="SELECT COUNT(*) AS nb_poste FROM poste";
    $state = $connexion->prepare($sql);
    $state->execute();
    return $state->fetch();
}


function getProfils(){
    global $connexion;
    $sql="SELECT * FROM profil";
    return $connexion->query($sql)->fetchAll();
}


function addProfil($libelle){
    global $connexion;
    $sql="INSERT INTO profil(libelle)
    values(:libelle)";
    $state=$connexion->prepare($sql);
    $state->bindValue("libelle",$libelle,PDO::PARAM_STR);
    return $state->execute();

}