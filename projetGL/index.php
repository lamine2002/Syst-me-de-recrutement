<?php
        session_start();
        ob_start();
        include_once("model/db.php");
        require_once("model/posteModel.php");
        require_once("model/profilModel.php");
        require_once("model/utilisateurModel.php");

        require_once("template/header.php");
        require_once("template/navbar.php");
        require_once("template/sidebar.php");
  
        $postes= ($_GET['page']=='pageOffreEm')?getPostes():[];
        $postespub= ($_GET['page']=='acceuil')? getOffrePub():[];
        $postemod= ($_GET['page']=='modifierPoste')? poste_a_modifier($_GET['id']):[];
        $postulation= ($_GET['page']=='acceuil')? getCandidatures():[];
        $profils= ($_GET['page']=='profil' || $_GET['page']=='utilisateur' || $_GET['page']=='inscrire')?getProfils():[];
        $users= ($_GET['page']=='utilisateur')?getUsers():[];
        $nbCandidat= ($_GET['page']=='statistique')?nombre_de_candidat():[];
        $nbRh= ($_GET['page']=='statistique')?nombre_de_rh():[];
        $nbPoste= ($_GET['page']=='statistique')?nombre_de_poste():[];
        $candidatures= ($_GET['page']=='mesCandidatures')?getOffrePostuler($_SESSION['user'][0]):[];


        if(isset($_GET["page"]) && $_GET["page"]=="deconnexion"){
                $_SESSION=[];
                session_destroy();
                header("location:http://localhost/projetgl/index.php?page=connexion");
        }

   
        if(isset($_POST['ajoutOffre'])){
                extract($_POST);
                $res=addOffre($titre,$description,$dateCloture,$type,$publier);
                if($res==1){
                        header("location:http://localhost/projetgl/index.php?page=pageOffreEm");
                }else{
                        echo "Erreur insertion à la BD";
                }

        }
        if(isset($_POST['modifierOffre'])){
                $idP = $_GET['id'];
                extract($_POST);
                $res=modifierOffre($titre,$description,$dateCloture,$type,$publier,$idP);
                if($res==1){
                        header("location:http://localhost/projetgl/index.php?page=pageOffreEm");
                }else{
                        echo "Erreur insertion à la BD";
                }

        }
        if(isset($_POST['ajoutProfil'])){
                extract($_POST);
                $res=addProfil($libelle);
                if($res==1){
                        header("location:http://localhost/projetgl/index.php?page=profil");
                }else{
                        echo "Erreur insertion à la BD";
                }

        }
        if(isset($_POST['ajoutUtilisateur'])){
                extract($_POST);
                $res=addUser($nom,$prenom,$mdp,$email,$profil,$tel,$login);
                if($res==1){
                        header("location:http://localhost/projetgl/index.php?page=utilisateur");
                }else{
                        echo "Erreur insertion à la BD";
                }

        }
        if(isset($_POST['inscription']) && (isset($_FILES['pp']) && $_FILES['pp']['error'] == 0) && (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0)){
            //extract($_POST);
//            echo "<pre>";
//            print_r($_POST);
//            print_r($_FILES['pp']);
//            print_r($_FILES['cv']);
//            echo "</pre>";
//            die();
            
            
            if ($_FILES['pp']['size'] <= 2000000){
                $photo_name = uniqid()."_".$_FILES['pp']['name'];
                $fileinfo = pathinfo($_FILES['pp']['name']);
                $extension = $fileinfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if(in_array($extension,$allowedExtensions)){
                    move_uploaded_file($_FILES['pp']['tmp_name'],'uploads/photo/'.basename($photo_name));
                }
            }
            if ($_FILES['cv']['size'] <= 2000000){
                $cv_name = uniqid()."_".$_FILES['cv']['name'];
                $fileInfo = pathinfo($_FILES['cv']['name']);
                $ext = $fileInfo['extension'];
                $pdf = 'pdf';
                if($ext == $pdf){
                    move_uploaded_file($_FILES['cv']['tmp_name'],'uploads/cv/'.$cv_name);
                }
            }

            $res=inscription($_POST['nom'],$_POST['prenom'],$_POST['mdp'],$_POST['email'],$_POST['profil'],$_POST['telephone'],$_POST['login'],$photo_name,$cv_name,$_POST['description']);
            if($res==1){
                header("location:http://localhost/projetgl/index.php?page=connexion");
            }else{
                echo "Erreur insertion à la BD";
            }

        }
        if(isset($_POST['VerifConnexion'])){
                extract($_POST);
                $res= verifConnect($login,$password);
            
                if($res){
                        $_SESSION["user"]=$res;
                        header("location:http://localhost/projetgl/index.php?page=acceuil");
                }else{
                        $messageConnect="Login ou mot de passe incorrect";
                }

        }

       
        
        


      /*  if(isset($_GET['page'])){
                if($_GET['page']=="gestionOffre"){
                      
                        require_once("pages/pageOffreEm.php");
                }
                if($_GET['page']=="utilisateur"){
                       
                        require_once("pages/utilisateur.php");
                }
                if($_GET['page']=="profil"){
                        $postes=getPostes();
                        require_once("pages/profil.php");
                }
        }*/

        if(isset($_GET['id'],$_GET['page']) and $_GET['page']=='detailOffre' ){
                $id=$_GET['id'];
                $value=getOffreByid($id);
                $verif = verifPoste($id, $_SESSION['user'][0]);
                include_once("pages/detailOffre.php");
        }
        /////////// POUR MES CANDIDATURES  /////////////////////////////////////
        if(isset($_GET['idPoste'], $_GET['idCandidat'], $_GET['page']) and $_GET['page']=='acceuil'){
                $idPoste = $_GET['idPoste'];
                $idCandidat = $_GET['idCandidat'];
                $res = addCandidature($idPoste, $idCandidat);
                if($res==1){
                echo "<script> 
                        window.alert('Postuler avec avec succes')
                </script>";
                }else{
                        echo "Erreur insertion à la BD";
                }
        }

        //Routeur
        $page=isset($_GET['page'])?$_GET['page']:"";
        if($page!=""){
                if(file_exists("pages/$page.php")){
                        include_once("pages/$page.php");
                }else{
                        echo "La page n'existe pas";
                }
        }

        if(isset($_GET['id'],$_GET['etat'])){
                $id=$_GET['id'];
                $etat=$_GET['etat'];
                $res=UpdateOffre($id,$etat);
                if($res==1){
                        header("location:http://localhost/projetgl/index.php?page=pageOffreEm");
                }else{
                        echo "Erreur insertion à la BD";
                }
        }

       if (isset($_POST['updatePassword'])){
           $idUser = $_SESSION['user'][0];
           $oldPassword = $_POST['oldPassword'];
           $newPassword = $_POST['newPassword'];
           $confirmPassword = $_POST['confirmPassword'];

           if ($oldPassword === $_SESSION['user']['mdp']) {
                if ($newPassword === $confirmPassword){
                    $res = UpdatePassword($oldPassword,$newPassword,$idUser);
                    if ($res == 1) {
                        
                        header("location:http://localhost/projetgl/index.php?page=deconnexion");
                        echo "<script>
                            alert('Mot de passe modifier avec succes')
                            </script>";
                    }
                }else{
                    echo "<script>
                            alert('La confirmation du nouveau mot de passe ne correspond pas.')
                            </script>";
                }
           }else{
               echo "<script>
                            alert('Ancien mot de passe incorrect.')
                            </script>";
           }
       }


       if (isset($_POST['updateCV']) && (isset($_FILES['cvUpdate']) && $_FILES['cvUpdate']['error'] == 0)){
                if ($_FILES['cvUpdate']['size'] <= 2000000){
                        
                        $fileInfo = pathinfo($_FILES['cvUpdate']['name']);
                        $ext = $fileInfo['extension'];
                        $pdf = 'pdf';
                        if($ext == $pdf){
                                $cvUpdate_name = uniqid()."_".$_FILES['cvUpdate']['name'];
                                move_uploaded_file($_FILES['cvUpdate']['tmp_name'],'./uploads/cv/'.basename($cvUpdate_name));
                                $res = UpdateCV($cvUpdate_name, $_SESSION['user'][0]);
                                if ($res == 1) {
                                        header("location:http://localhost/projetgl/index.php?page=deconnexion");
                                }
                        }else{
                                echo "
                                        <script>
                                                window.alert('Veuillez ajouter un PDF de moin de 2 Mo')
                                        </script>
                                ";
                        }
                }else{
                        echo "
                                <script>
                                        window.alert('Veuillez ajouter un PDF de moin de 2 Mo')
                                </script>
                        ";
                }
       }

        if (isset($_GET['idcan'], $_GET['reponseRH']))
        {
            $idcan = $_GET['idcan'];
            $reponse = $_GET['reponseRH'];
            $res = updateReponse($reponse,$idcan);
            if ($res==1)
            {
                header("location:http://localhost/projetgl/index.php?page=acceuil");
            }
        }

        if (isset($_GET['id'], $_GET['option']) && $_GET['option'] == 'supprimer')
        {
            $poste_a_supprimer = $_GET['id'];
            
            $res = deletePoste($poste_a_supprimer);
            if ($res==1)
            {
                header("location:http://localhost/projetgl/index.php?page=pageOffreEm");
            }
        }





        require_once("template/footer.php");




?>