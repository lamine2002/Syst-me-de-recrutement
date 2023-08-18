<?php
require_once('db.php');



function getUsers(){
    global $connexion;
    $sql="SELECT * FROM user as u,profil as p where u.idProfil=p.id";
    return $connexion->query($sql)->fetchAll();
}
function nombre_de_candidat(){
    global $connexion;
    $sql="SELECT COUNT(*) AS nb_candidats
    FROM user
    WHERE idProfil = 4";
    return $connexion->query($sql)->fetch();
}
function nombre_de_rh(){
    global $connexion;
    $sql="SELECT COUNT(*) AS nb_rh
    FROM user
    WHERE idProfil = 3";
    $state = $connexion->prepare($sql);
    $state->execute();
    return $state->fetch();
}

function addUser($nom,$prenom,$mdp,$email,$idProfil,$tel,$login){
    global $connexion;
   


    $sql="INSERT INTO user(nom,prenom,email,mdp,telephone,idProfil,login)
    values(:nom,:prenom,:email,:mdp,:tel,:idp,:login)";

    $state=$connexion->prepare($sql);
    $state->bindValue("nom",$nom,PDO::PARAM_STR);
    $state->bindValue("prenom",$prenom,PDO::PARAM_STR);
    $state->bindValue("email",$email,PDO::PARAM_STR);
    $state->bindValue("mdp",$mdp,PDO::PARAM_STR);
    $state->bindValue("tel",$tel,PDO::PARAM_STR);
    $state->bindValue("idp",$idProfil,PDO::PARAM_INT);
    $state->bindValue("login",$login,PDO::PARAM_STR);


    return $state->execute();

}

function inscription($nom,$prenom,$mdp,$email,$idProfil,$tel,$login,$pp,$cv,$description){
    global $connexion;



    $sql="INSERT INTO user(nom,prenom,email,mdp,telephone,idProfil,login,pp,cv,description)
    values(:nom,:prenom,:email,:mdp,:tel,:idp,:login,:pp,:cv,:description)";

    $state=$connexion->prepare($sql);
    $state->bindValue("nom",$nom,PDO::PARAM_STR);
    $state->bindValue("prenom",$prenom,PDO::PARAM_STR);
    $state->bindValue("email",$email,PDO::PARAM_STR);
    $state->bindValue("mdp",$mdp,PDO::PARAM_STR);
    $state->bindValue("tel",$tel,PDO::PARAM_STR);
    $state->bindValue("idp",$idProfil,PDO::PARAM_INT);
    $state->bindValue("login",$login,PDO::PARAM_STR);
    $state->bindValue("pp",$pp,PDO::PARAM_STR);
    $state->bindValue("cv",$cv,PDO::PARAM_STR);
    $state->bindValue("description",$description,PDO::PARAM_STR);


    return $state->execute();

}

function verifConnect($login,$password){
    global $connexion;
    $sql="SELECT * from user as u,profil as p where login=:login AND mdp=:mdp AND p.id=u.idProfil ";

    $state=$connexion->prepare($sql);
    $state->bindValue("login",$login,PDO::PARAM_STR);
    $state->bindValue("mdp",$password,PDO::PARAM_STR);
    $state->execute();
    return  $state->fetch();
}
 function UpdatePassword($oldPassword, $newPassword, $idUser){
    global  $connexion;
    $sql = "UPDATE user SET mdp=:newPassword where id=:idUser AND mdp=:oldPassword";
    $state = $connexion->prepare($sql);
    $state->bindValue("newPassword",$newPassword,PDO::PARAM_STR);
    $state->bindValue("oldPassword",$oldPassword,PDO::PARAM_STR);
    $state->bindValue("idUser",$idUser,PDO::PARAM_INT);
    return $state->execute();
 }

 function UpdateCV($newCV, $idUser){
    global  $connexion;
    $sql = "UPDATE user SET cv=:newCV where id=:idUser ";
    $state = $connexion->prepare($sql);
    $state->bindValue("newCV",$newCV,PDO::PARAM_STR);
    $state->bindValue("idUser",$idUser,PDO::PARAM_INT);
    return $state->execute();
 }

function updateReponse($idReponse,$idcan){
    global  $connexion;
    $sql = "UPDATE candidature SET etat=:idReponse where id=:idcan";
    $state = $connexion->prepare($sql);
    $state->bindValue("idcan",$idcan,PDO::PARAM_INT);
    $state->bindValue("idReponse",$idReponse,PDO::PARAM_INT);

    return $state->execute();
}

?>


