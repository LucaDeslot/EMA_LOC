<div style="width:40%;margin: 5% auto;border-radius:5px;text-align: center;background-color:#DCDCDC">
    Merci <?php echo ucfirst($data['prenom']);?>, <br>
    
    Votre demande de location à bien été prise en compte. <br>
    <img  style="width:300px" src='./src/images/checked-svgrepo-com.svg' alt="validate"><br>
    Vous allez recevoir un mail de confirmation sur 
    <?php echo '<a href="mailto:'.$data["mail"].'">'.$data["mail"].'</a>';?>
</div>
<div style="text-align: center;">
    <a style="margin:auto" href="index.php">Retour à l'accueil</a>
</div>


    <h1 class="hr">Récapitulatif</h1>
    <table style="margin: 5% auto;text-align: center;border: 1px solid">
    <tbody>
        <tr>
            <th>Objet :</th>
            <td><?php echo $data[0]['nomObjet'];?></td>
        </tr>
        <tr>
            <th>Prix :</th>
            <td><?php if(is_null($data[0]['prix'])){echo "Gratuit";}else{echo $data[0]['nomObjet'];}?></td>
        </tr>
        <tr>
            <th>Nom :</th>
            <td><?php echo $data['nom'];?></td>
        </tr>
        <tr>
            <th>Prénom :</th>
            <td><?php echo $data['prenom'];?></td>
        </tr>
        <tr>
            <th>Dates :</th>
            <td><?php echo $data['dateDebut'].' - '.$data['dateFin'] ;?></td>
        </tr>
    </tbody>
    </table>
</div>