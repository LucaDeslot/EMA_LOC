<h1 class="hr">Historique</h1>
<div class="table-responsive" style="display: flex;flex-direction: column;margin:auto;width:80%">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <?php
                    if(!isset($_GET['idObjet'])){
                        echo '<th scope="col">Objet</th>';
                    }
                ?>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Date de début</th>
                <th scope="col">Date de fin</th>
                <th scope="col">Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_GET['idObjet'])){
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
                    echo '<div><h3>'.$result[0]['nomObjet'].'</h3><br>';
                    echo $result[0]['description_courte'].'<br>';
                    echo $result[0]['prix'].'<br>';
                    echo $result[0]['idAssociation'].'<br>';
                    echo '</div></div>';

                    foreach ($result as $key => $array) {
                        echo '<tr>';
                        echo '<td>'. $array['prenom'].'</td>';
                        echo '<td>'. $array['nom'].'</td>';
                        echo '<td>'. $array['dateDebut'].'</td>';
                        echo '<td>'. $array['dateFin'].'</td>';
                        echo '<td>'. $array['etat'].'</td>';
                        echo '</tr>';
                    }
                }else{
                    foreach ($result as $key => $array) {
                        echo '<tr>';
                        echo '<td>'. $array['nomObjet'].'</td>';
                        echo '<td>'. $array['prenom'].'</td>';
                        echo '<td>'. $array['nom'].'</td>';
                        echo '<td>'. $array['dateDebut'].'</td>';
                        echo '<td>'. $array['dateFin'].'</td>';
                        echo '<td>'. $array['etat'].'</td>';
                        echo '</tr>';
                    }
                }


            ?>
        </tbody>
    </table>
</div>