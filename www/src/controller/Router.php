<?php

require_once('./src/model/Model.php');
require_once('./src/model/ModelLogin.php');

if(isset($_GET['action']) && $_GET["action"] == 'details'){
    //Détails d'un objet
    if(isset($_GET['idObjet'])){
        $result= Model::selectDetailsObject($_GET['idObjet']);
        $page='details';
        $pagetitle="Détails";
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
        if(isset($_SESSION['username'])){ // si l'utilisateur est connecté on affiche la page admin
            $historique = Model::selectHistoryAssociationFromUsername($_SESSION['username']);
            $page='admin';
            $pagetitle="Administration " . $_SESSION['username'];
            require './src/view/view.php';
        } else {
            require 'src/view/connexion.php';
        }

}elseif(isset($_GET['action']) && $_GET["action"] == 'connected'){
        
    require 'src/view/VerifLogin.php';

    if(isset($_SESSION['username'])){ 
        $result = Model::selectHistoryAssociationFromUsername($_SESSION['username']);
        $page='admin';
        $pagetitle="Administration " . $_SESSION['username'];
        require './src/view/view.php';
    } else {
        echo 'mdp incorrect';//
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
?>