<?php

require_once('./src/model/Model.php');
require_once('./src/model/ModelLogin.php');

if(isset($_GET['action']) && $_GET["action"] == 'details'){
    //Détails d'un objet
    if(isset($_GET['idObjet'])){
        $result= Model::selectDetailsObject($_GET['idObjet']);
        $page='detailsObjet';
        $pagetitle="Détails objet";
        require './src/view/view.php';

    //Détails d'une association
    }elseif(isset($_GET['idAssociation'])){
        $result= Model::selectDetailsAssociation($_GET['idAssociation']);
        $page='objets';
        $pagetitle="Association";
        require 'src/view/view.php';
        
    }else{
        goToIndex();
    }

} elseif(isset($_GET['action']) && $_GET["action"] == 'connexion'){
        refreshCSS();                            

}elseif(isset($_GET['action']) && $_GET["action"] == 'connected'){ // connexion à l'espace admin
        
    require 'src/view/VerifLogin.php';
    if(isset($_SESSION['username']) && ($_SESSION['password'])){ 
        $historique = Model::selectHistoryAssociationFromUsername($_SESSION['username']);
        $page='admin';
        $pagetitle="Administration " . $_SESSION['username'];
        require './src/view/view.php';
    } else {
        $messageErreur = "Invalid username or password";
        require './src/view/connexion.php';
        
    }

}elseif(isset($_GET['action']) && $_GET["action"] == 'historique'){

    if(isset($_GET['idObjet'])){// historique d'un objet
        $result=Model::selectHistoryObject($_GET['idObjet']);
        $page='historique';
        $pagetitle="Historique";
        require 'src/view/view.php';

    }else if (isset($_GET['idAssociation'])){// historique d'une association
        $result=Model::selectHistoryAssociation($_GET['idAssociation']);
        $page='historique';
        $pagetitle="Historique";
        require 'src/view/view.php';
    } else{
        goToIndex();
    }
    
} else if(isset($_GET['action']) && $_GET["action"] == 'approveRequest') {

    Model::approveRequest($_POST['idLocation']);
    $historique = Model::selectHistoryAssociationFromUsername($_SESSION['username']);
    require './src/view/demande.php';
    
} else if (isset($_GET['action']) && $_GET["action"] == 'declineRequest') {
    
    Model::declineRequest($_POST['idLocation']);
    $historique = Model::selectHistoryAssociationFromUsername($_SESSION['username']);
    require './src/view/demande.php';

}else if (isset($_GET['action']) && $_GET["action"] == 'ajoutItemAdmin') {
    $idAssoc = Model::getIdAssociation($_SESSION['username']);
    Model::ajoutItem($_POST['name'],$_POST['number'],$_POST['description'],$_POST['prix'],$idAssoc);
    if(!empty($_FILES['fileToUpload']))
        {
            $firstRename = Model::downloadImage($_FILES['fileToUpload'],$_POST['name'],$_SESSION['username']);
            $id = Model::getIdObjet();
            Model::renameFile($_FILES['fileToUpload'],$_POST['name'],$firstRename,$id,$_SESSION['username']);
        }
    
    //tableau association rafraichit
    refreshCSS();
    

}elseif(isset($_GET['action']) && $_GET["action"] == 'deconnexion'){
        deco();                            

}else if (isset($_GET['action']) && $_GET["action"] == 'createDemandeLocation') {
    Model::createDemandeLocation($_POST['idObjet'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['messenger'],$_POST['telephone'],$_POST['dateDebut'],$_POST['dateFin'],$_POST['etat']);
    $data = array('idObjet' => $_POST['idObjet'],'nom' => $_POST['nom'],'mail' => $_POST['mail'],'prenom' => $_POST['prenom'],'dateDebut' => $_POST['dateDebut'],'dateFin' => $_POST['dateFin']);
    $data = array_merge($data, Model::selectDetailsObject($_POST['idObjet']));
    $page='confirmation_demande';
    $pagetitle="Confirmation";
    require 'src/view/view.php';
}else{
    //Default case, index
    goToIndex();
}

function goToIndex(){
    $result= Model::selectAllClubs();
    $page='clubs';
    $pagetitle="Clubs";
    require './src/view/view.php';
}
function refreshCSS(){
    if(isset($_SESSION['username'])){ // si l'utilisateur est connecté on affiche la page admin
        $historique = Model::selectHistoryAssociationFromUsername($_SESSION['username']);
        $page='admin';
        $pagetitle="Administration " . $_SESSION['username'];
        require './src/view/view.php';
    } else {
        require 'src/view/connexion.php';
    }
}
function deco(){ //deconnexion utilisateur
    if(isset($_SESSION['username'])){
        $_SESSION['username']=NULL;
        require 'src/view/connexion.php';
    }

}
?>