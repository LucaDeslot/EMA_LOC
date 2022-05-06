<h1 class="hr"><?php echo $result[0]['nom']; ?> </h1>
<div id="detailsContainer">
<h1>
    <?php echo $result[0]['nom']; ?>
</h1>

<?php
    if(file_exists("./src/images/photos_objets/".$result[0]['nom'].'_'.$result[0]['idObjet'].".PNG")){
        echo '<img class="logo" src="./src/images/photos_objets/'.$result[0]['nom'].'_'.$result[0]['idObjet'].'.PNG" alt="logo' . $result[0]['nom'] . '"> <br/>';
    }elseif (file_exists("./src/images/photos_objets/".$result[0]['nom'].'_'.$result[0]['idObjet'].".png")) {
        echo '<img class="logo" src="./src/images/photos_objets/'.$result[0]['nom'].'_'.$result[0]['idObjet'].'.png" alt="logo' . $result[0]['nom'] . '"> <br/>';
    }elseif (file_exists("./src/images/photos_objets/".$result[0]['nom'].'_'.$result[0]['idObjet'].".jpg")) {
        echo '<img class="logo" src="./src/images/photos_objets/'.$result[0]['nom'].'_'.$result[0]['idObjet'].'.jpg" alt="logo' . $result[0]['nom'] . '"> <br/>';
    }elseif (file_exists("./src/images/photos_objets/".$result[0]['nom'].'_'.$result[0]['idObjet'].".JPG")) {
        echo '<img class="logo" src="./src/images/photos_objets/'.$result[0]['nom'].'_'.$result[0]['idObjet'].'.JPG" alt="logo' . $result[0]['nom'] . '"> <br/>';
    }else{
        echo '<img class="logo" src="./src/images/default.jpg" alt="logoDefault"> <br/>';
    }
?>
</div>
