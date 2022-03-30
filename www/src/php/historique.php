<h1 class="hr">Historique</h1>


<div class="table-responsive" style="margin:auto;width:80%">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Date de début</th>
                <th scope="col">Date de fin</th>
                <th scope="col">Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(file_exists("./src/images/photos_objets/".$objet[0]['nom'].'_'.$objet[0]['idObjet'].".PNG")){
                    echo '<img class="logo" src="./src/images/photos_objets/'.$objet[0]['nom'].'_'.$objet[0]['idObjet'].'.PNG" alt="logo' . $objet[0]['nom'] . '"> <br/>';
                }elseif (file_exists("./src/images/photos_objets/".$objet[0]['nom'].'_'.$objet[0]['idObjet'].".png")) {
                    echo '<img class="logo" src="./src/images/photos_objets/'.$objet[0]['nom'].'_'.$objet[0]['idObjet'].'.png" alt="logo' . $objet[0]['nom'] . '"> <br/>';
                }elseif (file_exists("./src/images/photos_objets/".$objet[0]['nom'].'_'.$objet[0]['idObjet'].".jpg")) {
                    echo '<img class="logo" src="./src/images/photos_objets/'.$objet[0]['nom'].'_'.$objet[0]['idObjet'].'.jpg" alt="logo' . $objet[0]['nom'] . '"> <br/>';
                }elseif (file_exists("./src/images/photos_objets/".$objet[0]['nom'].'_'.$objet[0]['idObjet'].".JPG")) {
                    echo '<img class="logo" src="./src/images/photos_objets/'.$objet[0]['nom'].'_'.$objet[0]['idObjet'].'.JPG" alt="logo' . $objet[0]['nom'] . '"> <br/>';
                }else{
                    echo '<img class="logo" src="./src/images/default.jpg" alt="logoDefault"> <br/>';
                }

                foreach ($result as $key => $array) {
                    echo '<tr>';
                    echo '<td>'. $array['prenom'].'</td>';
                    echo '<td>'. $array['nom'].'</td>';
                    echo '<td>'. $array['dateDebut'].'</td>';
                    echo '<td>'. $array['dateFin'].'</td>';
                    echo '<td>'. $array['etat'].'</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>