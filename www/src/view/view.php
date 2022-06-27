<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>EMA'loc - <?php echo $pagetitle; ?></title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="https://share-my-location.com/buttons/find-location.svg"/>
	    <link rel="stylesheet" href="./src/css/global.css">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <a href="index.php" >
                <img src="http://www.cercle-des-eleves.fr/wp-content/uploads/logo-cercle-vector-white-e1639922098763.png" alt="logo du cercle" style="position:absolute;top:0;margin:20px;left:0">
            </a>
            <a href="index.php" >
                <img class="logo" style="float:left;margin-top:80px;margin-left:20px;margin-right:25px;width:50px;filter: invert(100%)" src="https://cdn-icons-png.flaticon.com/128/1946/1946488.png" alt="logo deco" style="position:absolute;top:0;margin:20px;left:0">
            </a>            
            <?php if(isset($_SESSION['username'])){?>            
            <a href="index.php?action=deconnexion" >
                <img class="logo" style="float:right;margin-top:20px;margin-left:25px;margin-right:25px;width:50px;filter: invert(100%)" src="https://cdn-icons-png.flaticon.com/512/182/182448.png" alt="logo deco" style="position:absolute;top:0;margin:20px;left:0">
            </a>
            <?php   
            }
            ?>
            <a href="index.php?action=connexion" >
                <img class="logo" style="float:right;margin:20px;width:50px;filter: invert(100%)" src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="user">
            </a>
            
            <div class="search-box">
            <?php if ($page != 'admin') { ?>
                <button class="btn-search"><span class="material-icons-outlined" style="font-size: 30px;">
                        search
                    </span>
                </button>
             <input type="text" class="input-search" placeholder="Type to Search...">
            <?php  } ?>

            </div>
        </header>
        <main>
            <?php
                require './src/view/'.$page.'.php';
            ?>
        </main>
    </body>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted">© 2022 IMT Mines Alès, Cercle des élèves</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</html>
