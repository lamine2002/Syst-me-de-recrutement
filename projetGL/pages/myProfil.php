
    <div class="container mt-5">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="./uploads/photo/<?php echo  $_SESSION["user"]["pp"]?>" alt="User Avatar" class="rounded-circle img-fluid">
          </div>
          <div class="col-md-8">
            <h1 class="mb-3"><?php echo  ucfirst($_SESSION["user"]["prenom"]).' '.strtoupper($_SESSION["user"]["nom"]) ?></h1>
            <p class="lead"><?= $_SESSION["user"]["libelle"]?></p>
            <p class="mb-4">
              Email: <?= $_SESSION["user"]["email"] ?> <br>
              Numéro de téléphone: <?= $_SESSION["user"]["telephone"] ?>
            </p>
            <hr>
            <h2 class="mb-3">About Me</h2>
            <p><?= $_SESSION["user"]["description"] ?></p>
            <hr>
            <a href="./uploads/cv/<?php echo $_SESSION["user"]["cv"]?>" class="btn btn-primary mr-2" target="_blank">Télécharger le CV</a>
          </div>
        </div>
      </div>
      
