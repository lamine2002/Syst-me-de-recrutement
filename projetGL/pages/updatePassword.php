 <!-- <form method="post">
  <div class="form-group">
    <label for="oldPassword">Ancien mot de passe</label>
    <input type="password" class="form-control" id="oldPassword" name="oldPassword">
  </div>
  <div class="form-group">
    <label for="newPassword">Nouveau mot de passe</label>
    <input type="password" class="form-control" id="newPassword" name="newPassword">
  </div>
  <div class="form-group">
    <label for="confirmPassword">Confirmation du nouveau mot de passe</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
  </div>
  <button type="submit" class="btn btn-primary" name="updatePassword">Modifier le mot de passe</button>
</form> -->

<form method="POST">

    <div class="row mb-3">
        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="oldPassword" type="password" class="form-control" id="validationCustom10"  required>
            <div class="invalid-feedback">
                Veuillez saisir l'ancien mot de passe.
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="newPassword" type="password" class="form-control" id="validationCustom09"  required>
            <div class="invalid-feedback">
                Veuillez saisir le nouveau mot de passe.
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="confirmPassword" type="password" class="form-control" id="validationCustom09"  required>
            <div class="invalid-feedback">
                Veuillez confirmer le nouveau mot de passe.
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="updatePassword" onclick="return confirm('Voulez vous modifier le mot de passe?');">Change Password</button>
    </div>
</form>