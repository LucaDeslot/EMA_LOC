<h1 class="hr">Objets</h1>
<div id="objetsContainer">
<?php
    foreach ($result as $key => $array) {
        echo'<a href="index.php?action=read&id='.$array['idObjet'] .'">';
        echo '<div class="objetDiv">';
        if(file_exists("./src/images/photos_objets/".$array['nom'].".PNG")){
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'.PNG" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nom'].".jpg")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'.jpg" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nom'].".png")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'.png" alt="logo' . $array['nom'] . '"> <br/>'.$array['nom'].'<br/>';
        }else{
            echo '<img class="logo" src="./src/images/default.jpg" alt="logoDefault"> <br/>'.$array['nom'].'<br/>';
        }
        echo'</div>';
        echo'</a>';
    }

?>
</div>