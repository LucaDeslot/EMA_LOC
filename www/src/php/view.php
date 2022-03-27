<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>EMA'loc - <?php echo $pagetitle; ?></title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="https://share-my-location.com/buttons/find-location.svg"/>
	    <link rel="stylesheet" href="./src/css/global.css">
    </head>
    <body>
        <header>
            <a href="index.php" >
                <img class="logo" src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="home">
            </a>
            <a href="index.php?action=connexion" >
                <img class="logo" style="float:right;" src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="user">
            </a>
        </header>
        <main>
            <h1 class="hr">Recherche</h1>
            <div id ='searchContainer'>
                <input type="text">
            </div>
            <?php
                require 'src/php/'.$page.'.php';
            ?>
        </main>
    </body>
    <footer>
        <img src="http://www.cercle-des-eleves.fr/wp-content/uploads/alumni.png" alt="Mines Ales Alumni">
    </footer>
</html>