<h1 class="hr">Objets</h1>
<div id="objetsContainer">
<?php
    foreach ($result as $key => $array) {
        echo'<a href="index.php?action=read&id='.$array['idObjet'] .'">';
        echo '<div class="objetDiv">';
        if(file_exists("./src/images/photos_objets/".$array['nomObjet'].'_'.$array['idObjet'].".PNG")){
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nomObjet'].'_'.$array['idObjet'].'.PNG" alt="logo' . $array['nomObjet'] . '"> <br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nomObjet'].'_'.$array['idObjet'].".png")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nomObjet'].'_'.$array['idObjet'].'.png" alt="logo' . $array['nomObjet'] . '"> <br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nomObjet'].'_'.$array['idObjet'].".jpg")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nomObjet'].'_'.$array['idObjet'].'.jpg" alt="logo' . $array['nomObjet'] . '"> <br/>';
        }elseif (file_exists("./src/images/photos_objets/".$array['nomObjet'].'_'.$array['idObjet'].".JPG")) {
            echo '<img class="logo" src="./src/images/photos_objets/'.$array['nomObjet'].'_'.$array['idObjet'].'.JPG" alt="logo' . $array['nomObjet'] . '"> <br/>';
        }else{
            echo '<img class="logo" src="./src/images/default.jpg" alt="logoDefault"> <br/>';
        }


        if($array["prix"]==0 && $array['disponible']==1){
            if( $array["description_courte"]==NULL){
            
            echo $array['nomObjet'].'- Disponible ';
        }
            else{
                echo $array['nomObjet'] . ' - ' . $array['description_courte'].' -  Disponible ';
        }
    }
        elseif($array["prix"]==0 && $array['disponible']==0){
            if( $array["description_courte"]==NULL){
        
            echo $array['nomObjet'].' - Non Disponible ';
        }
            else{
            echo $array['nomObjet'] . ' - ' . $array['description_courte'].' - Non Disponible ';
        }
    }
    elseif( $array["prix"]>0){
            if($array['disponible']==1)
            {
                if($array["description_courte"]==NULL){
            
                    echo $array['nomObjet']. $array['prix']. 'euros'.' Disponible ';
                }
                else{
                    echo $array['nomObjet'] . ' - ' . $array['description_courte']. ' - ' . $array['prix']. 'euros'. ' -  Disponible ';
                }
            }
            if($array['disponible']==0){
                if( $array["description_courte"]==NULL){
            
                    echo $array['nomObjet']. $array['prix']. 'euros'.' Non Disponible ';
                }
                else{
                    echo $array['nomObjet'] . ' - ' . $array['description_courte']. ' - ' . $array['prix']. 'euros'. ' - Non Disponible ';
                }
                
            }  
        }
        
        echo'</div>';
        echo'</a>';
    }

?>
</div>