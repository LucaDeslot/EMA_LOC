<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>EMA'Loc</title>
  
  <link rel="stylesheet" href="./src/css/global.css">
</head>
<body>
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

	$sql = 'SELECT * FROM association';

	$sth = $pdo->prepare($sql);

	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $key => $array) {

		if(!file_exists("./src/images/logos_associations/".$array['nom'].".PNG") && !file_exists("./src/images/logos_associations/".$array['nom'].".jpg")){
			echo '<img class="logoAssociation" src="./src/images/default.jpg" alt="logoDefault"> <br/>'.$array['nom'].'<br/>';
		}else{
			if(file_exists("./src/images/logos_associations/".$array['nom'].".PNG")){
				echo '<img class="logoAssociation" src="./src/images/logos_associations/'.$array['nom'].'.PNG" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
			}elseif (file_exists("./src/images/logos_associations/".$array['nom'].".jpg")) {
				echo '<img class="logoAssociation" src="./src/images/logos_associations/'.$array['nom'].'.jpg" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
			}
		}
	}

?>
</body>
</html>





