
<div class="card">
        <div class="card-header">
        <?= $value['titre']  ?>
        </div>
        <div class="card-body">
            <?= $value['titre']  ?>
            <?= $value['datepub']  ?>
                <button class="btn btn-info" <?= (!empty($verif) && $verif["etat"] == 1) ?"":"hidden"  ?>>En Attente</button>
                <button class="btn btn-danger" <?= (!empty($verif) && $verif["etat"] == 2) ?"":"hidden"  ?>>Refuser</button>
                <button class="btn btn-success" <?= (!empty($verif) && $verif["etat"] == 3) ?"":"hidden"  ?>>Accepter</button>
            <a class="btn btn-primary" href="?idPoste=<?=$value['id']?>&idCandidat=<?=$_SESSION['user'][0]?>&page=acceuil" <?= (isset($verif) && empty($verif)) ?"":"hidden"  ?>>Postuler</a>
        </div>
</div>
