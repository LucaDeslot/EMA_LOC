
<h1 class="hr">Ajout objet</h1>
<div id="ajoutobj" class="table-responsive" style="display: flex;flex-direction: column;margin:auto;width:80%">
<<<<<<< HEAD
    <form id="ajoutObjet" action="index.php?action=ajoutItemAdmin" method="post">
=======
    <form id="ajoutObjet" action="index.php?action=ajoutItemAdmin" method="post" enctype='multipart/form-data'>
>>>>>>> 3aec242 (ui)
        <label for="name">Nom de l'objet : </label>
        <input type="text" name="name" id="name" required>
        <label for="description">La description : </label>
        <input type="text" name="description" id="description" required>
<<<<<<< HEAD
        <label for="description" class="desciptionLongueLabel">La description longue: </label>
        <textarea name="longDescription" cols="30" rows="2" form="ajoutObjet"></textarea> 
=======
>>>>>>> 3aec242 (ui)
        <label for="prix">Prix : </label>
        <input type="number" name="prix" id="prix" required>
        <label for="number">Nombre disponible : </label>
        <input type="number" name="number" id="number" required>
<<<<<<< HEAD
        <label for="number">Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Valider" id="validerInputAdmin">
        </button>
    </form>
</div>
=======
        <label for="fileToUpload">Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Valider" id="validerInputAdmin">
       
        </button>
    </form>
</div>
>>>>>>> 3aec242 (ui)
