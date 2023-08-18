<?php
require_once('db.php');



function getPostes(){
    global $connexion;
    $sql="SELECT * FROM poste";
    return $connexion->query($sql)->fetchAll();
}

function addOffre($title,$description,$dateCloture,$type,$publier){
    global $connexion;
    $datepub="".date("d-m-Y H:i");
    $publier=($publier=='on'? 1 : 0);



    $sql="INSERT INTO poste(titre,description,datepub,dateCloture,type,publier)
    values(:titre,:desc,:datepub,:dateCloture,:type,:publier)";

    $state=$connexion->prepare($sql);
    $state->bindValue("titre",$title,PDO::PARAM_STR);
    $state->bindValue("desc",$description,PDO::PARAM_STR);
    $state->bindValue("datepub",$datepub,PDO::PARAM_STR);
    $state->bindValue("dateCloture",$dateCloture,PDO::PARAM_STR);
    $state->bindValue("type",$type,PDO::PARAM_STR);
    $state->bindValue("publier",$publier,PDO::PARAM_INT);

    return $state->execute();

}

function UpdateOffre($idOffre,$etat){
    global $connexion;
    if($etat==0){
        $etat=1;
    }else{
        $etat=0;
    }
    $sql="UPDATE poste set publier=$etat where id=$idOffre";

    return $connexion->exec($sql);
}

function modifierOffre($title,$description,$dateCloture,$type,$publier,$id){
    global $connexion;
    $publier=($publier=='on'? 1 : 0);

    $sql="UPDATE  poste SET titre=:titre,description=:desc,dateCloture=:dateCloture,type=:type,publier=:publier where id=:id";

    $state=$connexion->prepare($sql);
    $state->bindValue("titre",$title,PDO::PARAM_STR);
    $state->bindValue("desc",$description,PDO::PARAM_STR);
    $state->bindValue("dateCloture",$dateCloture,PDO::PARAM_STR);
    $state->bindValue("type",$type,PDO::PARAM_STR);
    $state->bindValue("publier",$publier,PDO::PARAM_INT);
    $state->bindValue("id",$id,PDO::PARAM_INT);

    return $state->execute();

}

function getOffrePub(){
    global $connexion;
    $sql="SELECT * FROM poste WHERE publier=1";
    return  $connexion->query($sql)->fetchAll();
}

function getOffreByid($id){
    global $connexion;
    $sql="SELECT * FROM poste WHERE id=$id";
    return  $connexion->query($sql)->fetch();
}

function addCandidature($idPoste, $idCandidat){
    global $connexion;
    $etat = 1;
    $sql = "INSERT INTO candidature(idCandidat, idPoste, etat)
    values(:idCandidat, :idPoste, :etat)";
    $state = $connexion->prepare($sql);
    $state->bindValue("idCandidat", $idCandidat, PDO::PARAM_INT);
    $state->bindValue("idPoste", $idPoste, PDO::PARAM_INT);
    $state->bindValue("etat", $etat, PDO::PARAM_INT);

    return $state->execute();
}

function getCandidatures(){

        global $connexion;

        $sql = "SELECT * from candidature as c, poste as p, user as u where c.idCandidat=u.id AND c.idPoste=p.id";
        return $connexion->query($sql)->fetchAll();

}

function getOffrePostuler($idCandidat){
    global $connexion;
    $sql="SELECT * FROM candidature,poste WHERE candidature.idPoste = poste.id AND candidature.idCandidat = $idCandidat";
    return  $connexion->query($sql)->fetchAll();
}

function verifPoste($idPoste, $idCandidat){
    global $connexion;
    $sql="SELECT etat FROM candidature WHERE idPoste = $idPoste AND idCandidat = $idCandidat";
    return  $connexion->query($sql)->fetch();
}
function deletePoste($idPos){
    global $connexion;
    $sql = "DELETE FROM poste where id=:idPos";
    $state = $connexion->prepare($sql);
    $state->bindValue("idPos", $idPos, PDO::PARAM_INT);
    return $state->execute();
}
function poste_a_modifier($id){
    global $connexion;
    $sql="SELECT * FROM poste WHERE id=$id";
    return  $connexion->query($sql)->fetch();
}
?>