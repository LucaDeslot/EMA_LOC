<?php

require_once dirname(__FILE__) . '/Model.php';;



class ModelLogin {

    public static function selectUsernameAndPasswordCount($username, $password){
        $sql = "SELECT COUNT(*) FROM association where identifiant = '$username' AND motdepasse = '$password'"; 
        $sth = Model::$pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public static function selectPassword($password){
        $sql = 'SELECT * FROM association where password = ' . $password;
        $sth = Model::$pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>