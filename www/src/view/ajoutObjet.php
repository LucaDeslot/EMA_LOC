
<h1 class="hr">Ajout objet</h1>
<div id="ajoutobj" class="table-responsive" style="display: flex;flex-direction: column;margin:auto;width:80%">
    <form id="ajoutObjet" action="index.php?action=ajoutItemAdmin" method="post" enctype='multipart/form-data'>
        <label for="name">Nom de l'objet : </label>
        <input type="text" name="name" id="name" required>
        <label for="description">La description : </label>
        <input type="text" name="description" id="description" required>
        <label for="prix">Prix : </label>
        <input type="number" name="prix" id="prix" required>
        <label for="number">Nombre disponible : </label>
        <input type="number" name="number" id="number" required>
        <label for="fileToUpload">Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Valider" id="validerInputAdmin">
       
        </button>
    </form>
</div>
