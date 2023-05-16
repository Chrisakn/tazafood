<?php
$getContact = getContact($bdd);
?>
<div class="details">
    <div class="recentOrders">

        <div class="cardHeader">
            <h1>Boite de reception</h1>
        </div>
        <hr>

        <?php
        if ($getContact != null) {
            foreach ($getContact as $resultatContact) {
                echo "
                <div class='accordion'>
                    <div class='accordion-item'>
                        <div class='accordion-item-header'>
                        <h1 id='titre_contact'>Message de <span id='couleurNom'>$resultatContact[nom_contact]</span></h1>
                        
                        </div>
                        <div class='accordion-item-body'>
                            <div class='accordion-item-body-content'>
                            <p>Contenu du message : <br> $resultatContact[message_contact]</p>
                            <br><br>
                            <p>Information sur l'expéditeur(trice) :</p>
                                <ul style='padding-left: 1rem;'>
                                <li>Nom : $resultatContact[nom_contact]</li>
                                <li>Email : <span class='couleurBleu'>$resultatContact[email_contact]</span></li>
                                <li>Telephone : <span class='couleurBleu'>$resultatContact[telephone_contact]</span></li>
                                </ul> 
                            <br><br>
                            <p>Message envoyé le : <span class='couleurBleu'><em>$resultatContact[created_at]</em></span> </p>
                            <p><button id='btn_contact'><a href=''>Supprimer le message</a></button></p>
                            </div>
                        </div>
                    </div>
    
                </div>";
            }
        }

        ?>

    </div>


    <script src="../../public/assets/js/js-backoffice/boiteReception.js"></script>