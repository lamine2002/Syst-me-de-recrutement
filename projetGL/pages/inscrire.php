<div class="card col-md-10">
    <h4 class="card-header">
        Formulaire d'inscription
    </h4>
  <div class="card-body ">
    <form method="post"  class="row g-3 needs-validation " enctype="multipart/form-data" novalidate>
        <span class="error" aria-live="polite"></span>
        <div class="form-group col-md-6">
            <label for="profile_photo"   class="form-label" >Photo de profil:</label>
            <input type="file" class="form-control" id="validationCustom03"  required name="pp">
            <div class="invalid-feedback">
                Ajouter un photo de profil.
            </div>
        </div>
        <div class="col-md-10 d-flex justify-content-between">
            <div class="col-md-5">
                <label for="validationCustom01" class="form-label" >Prénom:</label>
                <input type="text" class="form-control" id="validationCustom01"  required name="prenom">
                <div class="invalid-feedback">
                Veuillez fournir un prenom valide.
                </div>
            </div>
            <div class="col-md-5">
                <label for="last_name" class="form-label" >Nom:</label>
                <input type="text" class="form-control" id="validationCustom02"  required name="nom">
                <div class="invalid-feedback">
                Veuillez fournir un nom valide.
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <label for="email" class="form-label" >Email:</label>
            <input type="email" class="form-control" id="validationCustom04"  required name="email">
            <div class="invalid-feedback">
                Veuillez fournir un email valide.
            </div>
        </div>
        <div class="col-md-5">
            <label for="login" class="form-label" >Login:</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name="login">
                <div class="invalid-feedback">
                    Veuillez fournir un login valide.
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <label for="password" class="form-label" >Mot de passe:</label>
            <input type="password" class="form-control" id="validationCustom05"  required name="mdp">
            <div class="invalid-feedback">
                Veuillez fournir un mot de passe valide.
            </div>
        </div>
        <div class="col-md-5">
            <label for="phone" class="form-label" >Téléphone:</label>
            <input type="number" class="form-control" id="validationCustom06"  required name="telephone">
            <div class="invalid-feedback">
                Veuillez fournir un numero de telephone valide.
            </div>
        </div>
        <div class="col-md-6">
            <label for="cv" class="form-label" >Ajouter votre CV:</label>
            <input type="file" class="form-control" id="validationCustom07"  required name="cv">
            <div class="invalid-feedback">
                Veuillez ajouter un cv valide.
            </div>
        </div>
        <div class="col-md-4">
            <label for="profile" class="form-label" >Profil:</label>
            <select class="form-control" id="validationCustom08"  required name="profil">
                <?php foreach ($profils as $key => $v) {?>
                    <?php if($v["libelle"] == "CANDIDAT") : ?>
                    <option value="<?= $v["id"] ?>"> <?= $v["libelle"] ?> </option>
                    <?php endif ?>
                <?php }?>
            </select>
            <div class="invalid-feedback">
                Veuillez selectionner un profil.
            </div>
        </div>
        <div class="col-md-10">
            <label for="description" class="form-label" >Description du candidat:</label>
            <textarea class="form-control" id="validationCustom09"  required name="description"></textarea>
            <div class="invalid-feedback">
                Veuillez ajouter une description.
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="inscription">S'inscrire</button>
        </div>

    </form>
  </div>
</div>

