
<!-- Modal -->
<div class="modal fade" id="ajoutOffre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire Ajout Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
            <form method="POST">
                <label for="">Libelle</label>
                <input type="text" class="form-control" name="libelle" >
               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  <button  type="submit" class="btn btn-primary"  name="ajoutProfil">Ajouter</button>
                </div>
            </form>
      </div>
   
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Page Profil
  </div>
  <div class="card-body">
        <button class="btn btn-primary mt-5 float-end" data-bs-toggle="modal" data-bs-target="#ajoutOffre">Ajouter</button>
        <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libelle</th>
                   
                    <th scope="col">Action(s)</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($profils as $key => $value) {?>
                    <tr>
                      <th scope="row"> <?php echo $value['id']  ?></th>
                      <td> <?= $value['libelle']  ?></td>
                
                      <td>
                            <button class="btn btn-primary">Modifier</button>
                            <button class="btn btn-danger">Supprimer</button>
                         
                      </td>
                    </tr>

                <?php } ?>

                   
                   
                </tbody>
        </table>
  </div>
</div>