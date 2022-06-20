<script>
    function accept(idLocation){
        $.ajax({
            url:"index.php?action=approveRequest", 
            type:"POST",
            data:{idLocation : idLocation},
            success:function(result){
                var tableau = document.getElementById('demandeTable');
                tableau.outerHTML=result;
            }
        })
    } 

    function decline(idLocation){
        $.ajax({
            url:"index.php?action=declineRequest",  
            type:"POST",
            data:{idLocation : idLocation},
            success:function(result){
                var tableau = document.getElementById('demandeTable');
                tableau.outerHTML=result;
            }
        })
    } 
</script>

<div id='demandeTable'>
<h1 class="hr">Demande</h1>
<div class="table-responsive" style="display: flex;flex-direction: column;margin:auto;width:80%">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Objet</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Date de début</th>
                <th scope="col">Date de fin</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                foreach ($historique as $key => $array) {

                    if($array['etat'] == 'demande') {
            
                    echo '<tr>';
                    echo '<td>'. $array['nomObjet'].'</td>';
                    echo '<td>'. $array['prenom'].'</td>';
                    echo '<td>'. $array['nom'].'</td>';
                    echo '<td>'. $array['dateDebut'].'</td>';
                    echo '<td>'. $array['dateFin'].'</td>';
            ?>
                    <td> 

                        <?php echo "<button id='approve' onclick='accept(".$array['idLocation'].")' type='button'> "?>
                            <img class='actionImage' src='./src/images/validate.png' title='Valider'> 
                        </button> 
                        <?php echo "<button id='decline' onclick='decline(".$array['idLocation'].")' type='button'> "?>
                            <img class='actionImages' src='./src/images/decline.png' title='Refuser'> 
                        </button> 
                        

                    </td>
                    </tr>
                    

            <?php

                    }
                }
            ?>
        </tbody>
    </table>
</div>
</div>
