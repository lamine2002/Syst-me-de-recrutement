
<!-- Modal -->
<div class="modal fade" id="ajoutOffre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire Ajout Utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
            <form method="POST">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" >
                <label for="">Prenom</label>
                <input type="text" class="form-control" name="prenom" >
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
                <label for="">login</label>
                <input type="text" class="form-control" name="login" >
                <label for="">Mot de passe</label>
                <input type="password"   name="mdp" class="form-control">
                <label for="">Telephone</label>
                <input type="number"   name="tel" class="form-control">
                <label for="">Profil</label>
                <select name="profil" id="" class="form-control">
                    <?php foreach ($profils as $key => $v) {?>
                  
                        <option value="<?= $v["id"] ?>"> <?= $v["libelle"] ?> </option>
                  
                   <?php }?>
                </select>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  <button  type="submit" class="btn btn-primary"  name="ajoutUtilisateur">Ajouter</button>
                </div>
            </form>
      </div>
   
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Page Utilisateur 
  </div>
  <div class="card-body">
        <button class="btn btn-primary mt-5 float-end" data-bs-toggle="modal" data-bs-target="#ajoutOffre">Ajouter</button>
        <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
    
                    <th scope="col">Prenom</th>
                    <th scope="col">login</th>
                    <th scope="col">email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $key => $value) {?>
                    <tr>
                      <th scope="row"> <?php echo $value[0]  ?></th>
                      <td> <?= $value['nom']  ?></td>
                
                      <td><?= $value['prenom']  ?></td>
                      <td><?= $value['login']  ?></td>
                      <td><?= $value['email']  ?></td>
                      <td><?= $value['telephone']  ?></td>
                      <td><?= $value['libelle']  ?></td>
                     
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