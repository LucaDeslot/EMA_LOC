<h1 class="hr"><?php echo $result[0]['nom']; ?> </h1>
<div id="detailsContainer">
<h1>
    <?php echo $result[0]['nom']; ?>
</h1>

<?php
    if(file_exists("./src/images/photos_objets/". $result[0]['nom'].".PNG")){
        echo '<img src="./src/images/photos_objets/'. $result[0]['nom'].'.PNG" alt="logo' .  $result[0]['nom'] . '">';
    }elseif (file_exists("./src/images/photos_objets/". $result[0]['nom'].".jpg")) {
        echo '<img src="./src/images/photos_objets/'. $result[0]['nom'].'.jpg" alt="logo' .  $result[0]['nom'] . '">';
    }elseif (file_exists("./src/images/photos_objets/". $result[0]['nom'].".png")) {
        echo '<img src="./src/images/photos_objets/'. $result[0]['nom'].'.png" alt="logo' .  $result[0]['nom'] . '">';
    }else{
        echo '<img src="./src/images/default.jpg" alt="logoDefault">';
    }
?>
</div>
