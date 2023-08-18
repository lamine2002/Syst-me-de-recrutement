<?php
//            echo "<pre>";
//            print_r($postemod);
//            echo "</pre>";
//            die();
?>
<form method="POST">
    <label for="" >Titre</label>
    <input type="text" class="form-control" name="titre"  value="<?=$postemod['titre']?>">
    <label for="">Description</label>
    <textarea name="description" class="form-control"  id="" cols="30" rows="5" value="<?=$postemod['description']?>"></textarea>
    <label for="">Date Cloture</label>
    <input type="date" class="form-control" name="dateCloture" value="<?=$postemod['datepub']?>">
    <label for="">Type</label>
    <select name="type" id="" class="form-control">
        <option value="Stage">Stage</option>
        <option value="Emploi">Emploi</option>
    </select>
    
    <label for="">Publication</label>
    <input type="checkbox"   name="publier">
    <button  type="submit" class="btn btn-primary"  name="modifierOffre" onclick="return confirm('Voulez vous modidfier cette Publication');">Modifier</button>
</form>