
<!-- Modal -->
<div class="modal fade" id="ajoutOffre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulaire Ajout Offre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
            <form method="POST">
                <label for="">Titre</label>
                <input type="text" class="form-control" name="titre" >
                <label for="">Description</label>
                <textarea name="description" class="form-control"  id="" cols="30" rows="5"></textarea>
                <label for="">Date Cloture</label>
                <input type="date" class="form-control" name="dateCloture">
                <label for="">Type</label>
                <select name="type" id="" class="form-control">
                   <option value="Stage">Stage</option>
                   <option value="Emploi">Emploi</option>
                </select>
                <label for="">Publication</label>
                <input type="checkbox"   name="publier">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  <button  type="submit" class="btn btn-primary"  name="ajoutOffre">Ajouter</button>
                </div>
            </form>
      </div>
   
    </div>
  </div>
</div>



<div class="card">
  <div class="card-header">
    Page Offre 
  </div>
  <div class="card-body">
        <button class="btn btn-primary mt-5 float-end" data-bs-toggle="modal" data-bs-target="#ajoutOffre">Ajouter</button>
        <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                   
                    <th scope="col">date Publication</th>
                    <th scope="col">date Cloture</th>
                    <th scope="col">Type</th>
                    <th scope="col">Publier</th>
                    <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($postes as $key => $value) {?>
                    
                          
                    <tr>
                      <th scope="row"> <?php echo $value['id']  ?></th>
                      <td> <?= $value['titre']  ?></td>
                
                      <td><?= $value['datepub']  ?></td>
                      <td><?= $value['dateCloture']  ?></td>
                      <td><?= $value['type']  ?></td>
                      
                      <td>
                        <a href="?id=<?=$value['id']?>&etat=1" class="btn btn-success" <?php  echo $value['publier']==0? 'hidden' :''  ?> ><i class="bi bi-star me-1"></i> Publier</a>
                        <a href="?id=<?=$value['id']?>&etat=0" class="btn btn-danger" <?php  echo $value['publier']==1? 'hidden' :''  ?>  ><i class="bi bi-star me-1"></i> Descativer</a>
                      </td>
                      <td>
                          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-collection"></i></button>
                          <!-- Modal pour la description du publication -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <?php echo $value['description']?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- FIN -->
                          <a href="?id=<?=$value['id']?>&option=supprimer" type="button" class="btn btn-danger" onclick="return confirm('Voulez vous supprimer cette Publication');"><i class="bi bi-exclamation-octagon"></i></a>
                          <a href="?id=<?=$value['id']?>&option=modifier&page=modifierPoste"  class="btn btn-info" ><i class="bi bi-info-circle"></i></a>
                         
                      </td>
                    </tr>

                <?php } ?>

                   
                   
                </tbody>
        </table>
  </div>
</div>
