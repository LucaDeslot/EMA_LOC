<h1 class="hr">Clubs</h1>
<div id="clubLogoContainer">
<?php
    foreach ($result as $key => $array) {
        echo '<a href="?idAssociation='.$array['idAssociation'].'">';
        echo '<div class="clubDiv">';
        echo '<div style="width:100px;height:100px">';
        if(file_exists("./src/images/logos_associations/".$array['nom'].".PNG")){
            echo '<img class="logo" src="./src/images/logos_associations/'.$array['nom'].'.PNG" alt="logo' . $array['nom'] . '"> <br/>';
        }elseif (file_exists("./src/images/logos_associations/".$array['nom'].".png")) {
            echo '<img class="logo" src="./src/images/logos_associations/'.$array['nom'].'.png" alt="logo' . $array['nom'] . '"> <br/>';
        }elseif (file_exists("./src/images/logos_associations/".$array['nom'].".jpg")) {
            echo '<img class="logo" src="./src/images/logos_associations/'.$array['nom'].'.jpg" alt="logo' . $array['nom'] . '"> <br/>';
        }elseif (file_exists("./src/images/logos_associations/".$array['nom'].".JPG")) {
            echo '<img class="logo" src="./src/images/logos_associations/'.$array['nom'].'.JPG" alt="logo' . $array['nom'] . '"> <br/>';
        }else{
            echo '<img class="logo" src="./src/images/default.jpg" alt="logoDefault"> <br/>';
        }
        echo '</div>';
        echo $array['nom'].'<br/>';

        echo '</div>';
        echo '</a>';
    }

?>
</div>