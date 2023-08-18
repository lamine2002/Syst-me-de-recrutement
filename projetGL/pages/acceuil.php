<?php if ($_SESSION["user"]["libelle"] == "CANDIDAT") :  ?>
<div class="row">
    <?php foreach ($postespub as $key => $value) {?>
    <div class="card col-md-3">
        <div class="card-header">
            <?= $value['titre']  ?>
        </div>
        <div class="card-body">
            TITRE: <?= $value['titre']  ?><br>
            Date Publication<?= $value['datepub']  ?><br>
            <a href="?id=<?=$value['id']?>&page=detailOffre" class="btn btn-primary">Detail</a>
        </div>
    </div>

    <?php } ?>
</div>
<?php endif; ?>

<?php if ($_SESSION["user"]["libelle"] == "RH") :  ?>

<?php
//            echo "<pre>";
//            print_r($postulation);
//            echo "</pre>";
//            die();
?>

<div class="card">
    <div class="card-header">
        Page de validation des candidatures
    </div>
    <div class="card-body">

        <table id="datatablesSimple" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre poste</th>
                    <th scope="col">Nom candidat</th>
                    <th scope="col">Prenom candidat</th>
                    <th scope="col">CV candidat</th>
                    <th scope="col">Validations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($postulation as $key => $value) {?>
                <tr>
                    <th scope="row"> <?php echo $value[0]  ?></th>
                    <td> <?= $value['titre']  ?></td>

                    <td><?= $value['nom']  ?></td>
                    <td><?= $value['prenom']  ?></td>
                    <td><a href="./uploads/cv/<?php echo $value['cv']?>" class="btn btn-primary mr-2"
                            target="_blank">Télécharger le CV</a></td>


                    <td>
                        <a class="btn btn-success" href="?reponseRH=3&idcan=<?=$value[0]?>"
                            <?php  echo $value['etat']==3? 'hidden' :''  ?>
                            onclick="return confirm('Voulez vous accepter la candidature?');"><i
                                class="bi bi-info-circle"></i></a>
                        <a class="btn btn-danger" href="?reponseRH=2&idcan=<?=$value[0]?>"
                            <?php  echo $value['etat']==2? 'hidden' :''  ?>
                            onclick="return confirm('Voulez vous refuser la candidature?');"><i
                                class="bi bi-exclamation-octagon"></i></a>
                        <a class="btn btn-info" href="?reponseRH=1&idcan=<?=$value[0]?>"
                            <?php  echo $value['etat']==1 || $value['etat']==1? 'hidden' :''  ?>
                            onclick="return confirm('Voulez vous mettre en attente la candidature??');"><i
                                class="bi bi-info-circle"></i></a>

                    </td>
                </tr>

                <?php } ?>



            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>