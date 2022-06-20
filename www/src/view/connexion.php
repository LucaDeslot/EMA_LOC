<html lang="fr" class=" kfzfywxi idc0_338">
  <head>
    <meta charset="utf-8">
    <title>EMA'loc - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="https://share-my-location.com/buttons/find-location.svg"/>
    <link rel="stylesheet" href="./src/css/connexion.css">
  </head>
  <header>
    <a href="index.php" >
      <img src="http://www.cercle-des-eleves.fr/wp-content/uploads/logo-cercle-vector-white-e1639922098763.png" alt="logo du cercle" style="position:absolute;top:0;margin:20px;left:0">
    </a>
  </header>
  <body class="text-center">
    <main class="form-signin">
      <form action="index.php?action=connected" method="post">
        <img class="mb-4" style="filter: invert(100%)" src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="user" width="72">

        <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

        <div class="form-floating">
          <input type="username" class="form-control" id="floatingInput" placeholder="name@example.com" name='username'>
          <label for="floatingInput">Identifiant</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='password'>
          <label for="floatingPassword">Mot de passe</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" style="background-color:#ac133b; border-color:#ac133b" type="submit">Connexion</button>
      </form>
    </main>

  </body>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span>© 2022 Cercle des élèves</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a href="https://www.youtube.com/channel/UC4aCarwnYhkgibhatlOl8ZQ"><img class="logoSocialNetwork" src="https://cdn1.iconfinder.com/data/icons/social-media-rounded-corners/512/Rounded_Youtube3_svg-512.png" alt="youtube"></a></li>
      <li class="ms-3"><a href="https://www.facebook.com/CercleIMTMinesAles/"><img class="logoSocialNetwork" src="https://cdn1.iconfinder.com/data/icons/social-media-rounded-corners/512/Rounded_Facebook_svg-512.png" alt="facebook"></a></li>
      <li class="ms-3"><a href="https://fr.linkedin.com/company/bdeimtminesales"><img class="logoSocialNetwork" src="https://cdn1.iconfinder.com/data/icons/social-media-rounded-corners/512/Rounded_Linkedin2_svg-512.png" alt="linkedin"></a></li>
    </ul>
  </footer>
</html>