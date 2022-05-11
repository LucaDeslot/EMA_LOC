
<?php

    require_once dirname(__FILE__) . '/../config/Conf.php';
    require_once dirname(__FILE__) . '/../lib/File.php';
    //gestion de la connexion à la base de données
    
class Model {

    public static $pdo;

    public static function Init(){

        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        echo File::build_path('model','modelLogin.php');

        try{
            self::$pdo = new PDO("mysql:host=$database_name;dbname=EMALOC", $login, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); 
            } else {
                echo 'Une erreur PDO est survenue.';
            }
            die();
        }
    }

    //TODO : Il faut renforcer la sécurité pour éviter les injections sql avec les try catch (voir le projet willy wonka)

    public static function selectAllClubs(){
        $sql = 'SELECT * FROM association';
        $sth = Model::$pdo->prepare($sql);

        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function selectDetailsObject($idObjet){
        $sql = 'SELECT * FROM objet WHERE idObjet='.$idObjet;
        $sth = Model::$pdo->prepare($sql);

        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function selectHistoryObject($idObjet){
        $sql = 'SELECT * FROM location l JOIN objet o ON o.idObjet=l.idObjet WHERE l.idObjet='.$idObjet;
        $sth = Model::$pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function selectHistoryAssociation($idAssociation){
        $sql = 'SELECT * FROM location l JOIN objet o ON o.idObjet=l.idObjet WHERE idAssociation='.$idAssociation;
        $sth = Model::$pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function selectDetailsAssociation($idAssociation){
        // TODO: UTILISER CETTE METHODE DE PREPARATION DE REQUETES PARTOUT POUR EVITER LES INJECTIONS SQL (le truc avec try catch et array)
        $sql = 'SELECT * FROM objet WHERE idAssociation = :tagAssociation';
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tagAssociation' => $idAssociation));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $result;
    }

}

Model::Init(); 
?>
    