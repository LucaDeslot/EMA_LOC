<h1 class="hr">Objets</h1>
<div id="objetsContainer">
<?php
    foreach ($result as $key => $array) {
        echo'<a href="index.php?action=read&id='.$array['idObjet'] .'">';
        echo '<div class="objetDiv">';
        if(file_exists("./src/images/photos_objets/".$array['nom'].'_'.$array['idObjet'].".PNG")){
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'_'.$array['idObjet'].'.PNG" alt="logo' . $array['nom'] . '"> <br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nom'].'_'.$array['idObjet'].".png")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'_'.$array['idObjet'].'.png" alt="logo' . $array['nom'] . '"> <br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nom'].'_'.$array['idObjet'].".jpg")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'_'.$array['idObjet'].'.jpg" alt="logo' . $array['nom'] . '"> <br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nom'].'_'.$array['idObjet'].".JPG")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nom'].'_'.$array['idObjet'].'.JPG" alt="logo' . $array['nom'] . '"> <br/>';
        }else{
            echo '<img class="logo" src="./src/images/default.jpg" alt="logoDefault"> <br/>';
        }
        if(isset($array['prix']) && $array["prix"]==0){
            if(isset($array['description_courte']) && $array["description_courte"]==NULL){
            
            echo $array['nom'].' Disponible :' . $array['Disponible'];
        }
        else{
            echo $array['nom'] . ' - ' . $array['description_courte'].' -  Disponible :' . $array['Disponible'];
        }
    }
        else {
            if(isset($array['description_courte']) && $array["description_courte"]==NULL){
            
                echo $array['nom']. $array['prix']. 'euros'.' Disponible :' . $array['Disponible'];
            }
            else{
                echo $array['nom'] . ' - ' . $array['description_courte']. ' - ' . $array['prix']. 'euros'. ' -  Disponible :' . $array['Disponible'];
            }
            
            
        }
        
        echo'</div>';
        echo'</a>';
    }

?>
</div>