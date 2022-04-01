
<?php
	$servername = "db";
	$username = "root";
	$password = "emaloc";
	
	try {
	  $pdo = new PDO("mysql:host=$servername;dbname=EMALOC", $username, $password);
	  // set the PDO error mode to exception
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  #echo "Connected successfully";
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}	

	
	// TODO: PREVENT SQL INJECTION 	


	if(isset($_GET['action']) && $_GET["action"] == 'read'){
		if(isset($_GET['id'])){
			$sql = 'SELECT * FROM objet WHERE idObjet='.$_GET['id'];
			$sth = $pdo->prepare($sql);

			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			$page='details';
			$pagetitle="Détails";
			require 'src/php/view.php';
		}
	}elseif(isset($_GET['action']) && $_GET["action"] == 'connexion'){
		require 'src/php/connexion.php';
	}
	elseif(isset($_GET['action']) && $_GET["action"] == 'historique'){

			if(isset($_GET['idObjet'])){// historique d'un objet
				
				$sql = 'SELECT * FROM location l JOIN objet o ON o.idObjet=l.idObjet WHERE l.idObjet='.$_GET['idObjet'];
				$sth = $pdo->prepare($sql);
				$sth->execute();
				$result = $sth->fetchAll(PDO::FETCH_ASSOC);
				$page='historique';
				$pagetitle="Historique";
				require 'src/php/view.php';

			}else if (isset($_GET['idAssociation'])){// historique d'une association
				$sql = 'SELECT * FROM location l JOIN objet o ON o.idObjet=l.idObjet WHERE idAssociation='.$_GET['idAssociation'];
				$sth = $pdo->prepare($sql);
				$sth->execute();
				$result = $sth->fetchAll(PDO::FETCH_ASSOC);
				
				$page='historique';
				$pagetitle="Historique";
				require 'src/php/view.php';
			}else{
				goToIndex($pdo);
			}
			
	}
	else{//Associations case
		if(isset($_GET['idAssociation'])){
			$sql = 'SELECT * FROM objet WHERE idAssociation = :tagAssociation';
			try{
				$sth = $pdo->prepare($sql);
				$sth->execute(array('tagAssociation' => $_GET['idAssociation']));
				$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			} catch(PDOException $e) {
				echo $e->getMessage();
				die();
			}
			$page='objets';
			$pagetitle="Objets";
			require 'src/php/view.php';
		}else{
			goToIndex($pdo);
		}
	}


	function goToIndex($pdo){
		$sql = 'SELECT * FROM association';
		$sth = $pdo->prepare($sql);

		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		$page='clubs';
		$pagetitle="Clubs";
		require 'src/php/view.php';
	}
?>