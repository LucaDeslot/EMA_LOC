<h1 class="hr">Détails</h1>
<div class="table-responsive" style="margin:auto;width:80%">
<?php
   echo '<div id="containerDetails" style="text-align: center;">';
            if($result[0]['idAssociation']==1)
            {
                $folder='BDE';
            }
            if($result[0]['idAssociation']==2)
            {
                $folder='BDS';
            }
            if($result[0]['idAssociation']==3)
            {
                $folder='BDA';
            }
            if($result[0]['idAssociation']==4)
            {
                $folder='EMAMix';
            }
            if($result[0]['idAssociation']==5)
            {
                $folder="EMA'sterchef";
            }
   if(file_exists("./src/images/photos_objets/".$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".PNG")){
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.PNG" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }elseif (file_exists("./src/images/photos_objets/".$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".png")) {
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.png" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }elseif (file_exists("./src/images/photos_objets/".$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".jpg")) {
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.jpg" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }elseif (file_exists("./src/images/photos_objets/".$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].".JPG")) {
       echo '<img class="logoDetails" src="./src/images/photos_objets/'.$folder.'/'.$result[0]['nomObjet'].'_'.$result[0]['idObjet'].'.JPG" alt="logo' . $result[0]['nomObjet'] . '"> <br/>';
   }else{
       echo '<img class="logoDetails" src="./src/images/default.jpg" alt="logoDefault"> <br/>';
   }

   echo '<div><h1>'.$result[0]['nomObjet']. '</h1>';
   
    if(!is_null($result[0]['description_longue'])){echo $result[0]['description_longue'].'<br>';}
    if(is_null($result[0]['prix'])){echo 'prix : Gratuit';}else{echo 'prix : '. $result[0]['prix'].'<br>';}
    if(!is_null($result[0]['disponible'])){echo 'Disponibilité : '. $result[0]['disponible'].'<br>';}
    echo '</div>';
?>
</div>

<h1 class="hr">Louer objet</h1>
<div id="createLoc" class="table-responsive" style="display: flex;flex-direction: column;padding-top:20px;margin:auto;width:80%;box-shadow: inset 4px 4px 4px #c8c9cf, inset -4px -4px 4px #f6f6f9; border-radius: 10px;">
    <!--<form id="createDemandeLocation" action="index.php?action=createDemandeLocation" method="post">
        <input type="hidden" id="idObjet" name="idObjet" <?php echo 'value="'.$result[0]['idObjet'].'"';?>>        
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" id="prenom" placeholder="Antoine" required>

        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="Griezmann" required>


        <label for="mail">Mail : </label>
        <input type="email" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" name="mail" id="mail" placeholder="antoine.griezmann@mines-ales.org" required>

        <label for="messenger">Messenger : </label>
        <input type="text" name="messenger" id="messenger" placeholder="Antoine GriGri">

        <label for="telephone">Téléphone : </label>
        <input type="number" name="telephone" id="telephone" placeholder="0618214316" required>

        <label for="dateDebut">Date de début : </label>
        <input type="date" name="dateDebut" id="dateDebut" required>

        <label for="dateFin">Date de fin : </label>
        <input type="date" name="dateFin" id="dateFin" required>
    
        <input type="submit" value="Valider" id="" > 
    </form>
    !-->
   <style>
       .form-row{
        display:flex;justify-content: space-evenly;
       }

       .col-md-6{
           width:auto;
       }

       .form-group > label{
           text-align:left;
       }
   </style>
    <form action="index.php?action=createDemandeLocation" style="display: grid; " method="post">
        <input type="hidden" id="idObjet" name="idObjet" <?php echo 'value="'.$result[0]['idObjet'].'"';?>>        

        <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
            </div>
        </div>
        <div class="form-group">
            <label for="mail">Email*</label>
            <input type="email" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" class="form-control" name="mail" id="mail" placeholder="Email" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telephone">Téléphone*</label>
                <input type="text" class="form-control" name="telephone" id="telephone" required>
            </div>
            <div class="form-group col-md-6">
                <label for="messenger">Messenger</label>
                <input type="text" class="form-control" name="messenger" id="messenger">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label style="width: auto;" for="dateDebut">Date de début*</label>
                <input type="date" class="form-control" name="dateDebut" id="dateDebut" required>
            </div>
            <div class="form-group col-md-6">
                <label style="width: auto;" for="dateFin">Date de fin*</label>
                <input type="date" class="form-control" name="dateFin" id="dateFin">
            </div>
        </div>
        <button style="width:180px;margin: 20px auto;" type="submit" value="Valider" class="btn btn-primary">Valider</button>
    </form>
</div>


