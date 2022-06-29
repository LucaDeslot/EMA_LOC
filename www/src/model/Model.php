
<?php

    require_once dirname(__FILE__) . '/../config/Conf.php';
    require_once dirname(__FILE__) . '/../lib/File.php';
    use PHPMailer\PHPMailer\PHPMailer;

    require dirname(__FILE__) . '/../PHPMailer/src/PHPMailer.php';
    require dirname(__FILE__) . '/../PHPMailer/src/SMTP.php';

    //gestion de la connexion à la base de données

class Model {

    public static $pdo;

    public static function Init(){

        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

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

    public static function selectAllClubs(){
        $sql = 'SELECT * FROM association';
        $sth = Model::$pdo->prepare($sql);

        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function selectDetailsObject($idObjet){
        $sql = 'SELECT * FROM objet WHERE idObjet=:tag_objet';
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tag_objet' => $idObjet));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $result;
    }

    public static function selectHistoryObject($idObjet){
        $sql = 'SELECT * FROM location l JOIN objet o ON o.idObjet=l.idObjet WHERE l.idObjet=:tag_objet';
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tag_objet' => $idObjet));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $result;
    }

    public static function selectHistoryAssociation($idAssociation){
        $sql = 'SELECT * FROM location l JOIN objet o ON o.idObjet=l.idObjet WHERE idAssociation= :tag_association';
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tag_association' => $idAssociation));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $result;
    }

    public static function selectHistoryAssociationFromUsername($username) {
        $sql = "SELECT * FROM association where identifiant= :tag_username";
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tag_username' => $username));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return self::selectHistoryAssociation($result[0]['idAssociation']);
    }

    public static function selectDetailsAssociation($idAssociation){
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

    public static function getMailFromIdLocations($idLocations){
        $sql = 'SELECT mail FROM location WHERE idLocation = :tagidLocation';
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tagidLocation' => $idLocations));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $result;
    }

    public static function approveRequest($idLocation){
        $sql = "UPDATE location SET etat='accepté' where idLocation = :tagidLocation";
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tagidLocation' => $idLocation));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public static function declineRequest($idLocation){
        self::sendMailToUser(self::getMailFromIdLocations($idLocation)[0], "Votre réservation a été refusée");
        $sql = "UPDATE location SET etat='refusé' where idLocation = :tagidLocation";
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tagidLocation' => $idLocation));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
<<<<<<< HEAD
    public static function ajoutItem($name,$number,$description, $longDescription,$prix,$username){
        echo $username;
        $sql = "INSERT INTO objet (nomObjet,description_longue,description_courte,prix, disponible, idAssociation) VALUES ('$name','$longDescription','$description',$prix,$number,$username)";
=======
    public static function ajoutItem($name,$number,$description,$prix,$username){
        echo $username;
        $sql = "INSERT INTO objet (nomObjet,description_longue,description_courte,prix, disponible, idAssociation) VALUES ('$name','$description','$description',$prix,$number,$username)";
>>>>>>> 3aec242 (ui)
        $sth = Model::$pdo->prepare($sql);
        $sth->execute();
        $sth->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public static function createDemandeLocation($idObjet,$nom,$prenom,$mail,$messenger,$telephone,$dateDebut,$dateFin){
        $sql = "INSERT INTO location (idObjet,nom,prenom,mail,messenger,telephone,dateDebut,dateFin,etat) VALUES ('$idObjet','$nom','$prenom','$mail','$messenger','$telephone','$dateDebut','$dateFin', 'demande')";
        $sth = Model::$pdo->prepare($sql);
        $sth->execute();
        $sth->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public static function getIdAssociation($username) {
        $sql = "SELECT idAssociation FROM association where identifiant=:tag_username";
        try{
            $sth = Model::$pdo->prepare($sql);
            $sth->execute(array('tag_username' => $username));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $result[0]['idAssociation'];
    }

<<<<<<< HEAD
=======
    public static function getIdObjet() {
        // $sql = "SELECT idObjet FROM objet";
        // $sth = Model::$pdo->prepare($sql);
        // $sth->execute();
        // $q->bindParam(':champ2', $champ2);
        $id=Model::$pdo->lastInsertId();
        return $id;
    }

>>>>>>> 3aec242 (ui)
    private function sendMailToUser($email, $msg){
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        //Send mail using gmail
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only

        $mail->SMTPAuth = true; // enable SMTP authentication


        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier

        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server

        $mail->Port = 465; // set the SMTP port for the GMAIL server

        $mail->IsHTML(true);

        $mail->Username = "emaloc.ales@gmail.com"; // GMAIL username

        $mail->Password = "lxcaxxoxuqutkgtb"; // GMAIL password

        //Typical mail data

        $mail->SetFrom("emaloc.ales@gmail.com");

        $mail->Subject = "Etat de votre demande";

        $mail->Body = $msg;

        $mail->AddAddress($email);


        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } 
    }
<<<<<<< HEAD
}

=======
    public static function downloadImage($file, $objet,$nameFolder) {
            Model::createFolder($nameFolder);
            $nameFile = $file['name']; /* nom du fileToUpload */
            $typeFile = $file['type']; /* type du fileToUpload */
            $sizeFile = $file['size'];/* taille en octets */
            $tmp_nameFile = $file['tmp_name']; /* emplacement du fileToUpload temporaire sur le serveur */
            $errFile = $file['error']; /* code erreur du téléchargement */
    
            $extensions = ['jpg','jpeg','gif','png'];
            $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
            $extensionFile= explode('.', $nameFile);
            $tempName = explode('/', $tmp_nameFile); //pour mettre un nom temporaire au fichier sans /temp dedans
            if(in_array($typeFile,$type)) //verif type
            {
                if($errFile==0)
                {
                    if(move_uploaded_file($tmp_nameFile, 'src/images/photos_objets/'.$nameFolder.'/'.$tempName[2] . '.' . strtolower(end($extensionFile))))
                    {
                        $newName = 'src/images/photos_objets/'.$nameFolder.'/'.$tempName[2] . '.' . strtolower(end($extensionFile));
                        echo "File upload in ". $newName;
                        return $newName;
                    }
                    else{
                        echo "Erreur upload";
                    }
                }
                else{
                    echo "Erreur";
                }
            }
             else
            {
                echo 'Type non autorisé';
            }
    }

    public static function createFolder($nameFolder) {
    if(!file_exists('src/images/photos_objets/' . $nameFolder))
    {
        mkdir('src/images/photos_objets/'.$nameFolder, 0777);
        chmod('src/images/photos_objets/'.$nameFolder, 0777);
    }
    else{
        echo "Folder already exist.";
    }
   
    }
    public static function renameFile($file, $objet,$tmpName,$idObjet,$nameFolder) {
    rename($tmpName,'src/images/photos_objets/'.$nameFolder.'/'.$objet.'_'.$idObjet.'.jpg');
}
}
>>>>>>> 3aec242 (ui)
Model::Init(); 
?>
    