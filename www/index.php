
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

	if(isset($_GET['action']) && $_GET["action"] == 'read'){
		if(isset($_GET['id'])){
			$sql = 'SELECT * FROM objet WHERE idObjet='.$_GET['id'];
			$sth = $pdo->prepare($sql);

			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $key => $array) {

				if(file_exists("./src/images/photos_objets/".$array['nom'].".PNG")){
					echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'.PNG" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
				}elseif (file_exists("./src/images/photos_objets/".$array['nom'].".jpg")) {
					echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'.jpg" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
				}elseif (file_exists("./src/images/photos_objets/".$array['nom'].".png")) {
					echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'.png" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
				}else{
					echo '<img class="logo" src="./src/images/default.jpg" alt="logoDefault"> <br/>'.$array['nom'].'<br/>';
				}
			}
			
		}
	}else{//readAll case
		if(isset($_GET['idAssociation'])){// TODO: prevent injection
			$sql = 'SELECT * FROM objet WHERE idAssociation='.$_GET['idAssociation'];
			$sth = $pdo->prepare($sql);

			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			$page='objets';
			$pagetitle="Objets";
			require 'src/php/view.php';
		}else{
			$sql = 'SELECT * FROM association';
			$sth = $pdo->prepare($sql);

			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			$page='clubs';
			$pagetitle="Clubs";
			require 'src/php/view.php';
		}
	}
?>