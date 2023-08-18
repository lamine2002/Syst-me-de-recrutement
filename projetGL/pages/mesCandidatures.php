
<div class="row">
<?php foreach ($candidatures as $key => $value) {?>
        <div class="card col-md-3">
        <div class="card-header">
        <?= $value['titre']  ?>
        </div>
        <div class="card-body">
           TITRE: <?= $value['titre']  ?><br>
           Date Publication<?= $value['datepub']  ?><br>
            <a  href="?id=<?=$value['id']?>&page=detailOffre" class="btn btn-primary">Detail</a>
        </div>
        </div>

<?php } ?>
</div >
