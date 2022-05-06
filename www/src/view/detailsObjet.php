<h1 class="hr">Détails</h1>
<div class="table-responsive" style="margin:auto;width:80%">
<?php
   echo '<div id="containerDetails">';
   if(file_exists("./src/images/photos_objets/".$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".PNG")){
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.PNG" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }elseif (file_exists("./src/images/photos_objets/".$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".png")) {
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.png" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }elseif (file_exists("./src/images/photos_objets/".$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".jpg")) {
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.jpg" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }elseif (file_exists("./src/images/photos_objets/".$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".JPG")) {
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.JPG" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }else{
       echo '<img class="logoDetails" src="./src/images/default.jpg" alt="logoDefault"> <br/>';
   }
   echo '<h1>'.$result[0]['nomObjet']. '</h1>';
?>

</div>

bonjoue
