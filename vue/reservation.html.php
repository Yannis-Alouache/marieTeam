

<div class="breadcumb-area bg-img bg-overlay"></div>
    <?php
        if ($message != "") {
            echo "<div class='alert alert-danger' role='alert'>
                $message
            </div>";
        }
    ?>

 
    <div class="dorne-contact-area container" id="contact">
        <!-- Contact Form Area -->
        <div class="contact-form-area equal-height">
            <div class="contact-text">
                <h4>Reservation</h4>
            </div>
            <div class="contact-form">
                <form action="./?action=reservation" method="POST">
                    <div class="row">

                        <!--<div class="col-12">
                            <input type="email" name="mail" class="form-control" placeholder="Adresse Mail">
                        </div>-->

                        <div class="col-12">
                            <input type="text" name="lastName" class="form-control" placeholder="Nom">
                        </div>  

                    <!-- 
                        <p style="width: 100%"><?php echo("CodeTraversee => ".$traverseId) ?></p>
                        <p style="width: 100%"><?php echo("CodeUtilisateur =>".$codeUtilisateur) ?></p>
                        <p style="width: 100%"><?php echo("liaisonId =>".$liaisonId) ?></p>
                        <p style="width: 100%"><?php echo("Date =>".$date) ?></p>


                        <p style="width: 100%"><?php if (isset($lastName)) echo("Nom => ".$lastName) ?></p>
                        <p style="width: 100%"><?php if (isset($firstName)) echo("Prénom =>".$firstName) ?></p>
                        <p style="width: 100%"><?php if (isset($address)) echo("Adresse => ".$address) ?></p>
                        <p style="width: 100%"><?php if (isset($codePostal)) echo("CodePostal =>".$codePostal) ?></p>
                        <p style="width: 100%"><?php if (isset($city)) echo("Ville => ".$city) ?></p>

                        <p style="width: 100%"><?php if (isset($lastName)) echo("Nombre d'adulte => ".$a1) ?></p>
                        <p style="width: 100%"><?php if (isset($firstName)) echo("Nombre Junior 8 à 18 ans =>".$a2) ?></p>
                        <p style="width: 100%"><?php if (isset($address)) echo("Nombre Enfant 0 à 7 ans => ".$a3) ?></p>
                        <p style="width: 100%"><?php if (isset($codePostal)) echo("Nombre Voiture inférieur à 4 m =>".$b1) ?></p>
                        <p style="width: 100%"><?php if (isset($city)) echo("Nombre Voiture inférieur à 5 m => ".$b2) ?></p>
                        <p style="width: 100%"><?php if (isset($city)) echo("Nombre Fourgon => ".$c1) ?></p>
                        <p style="width: 100%"><?php if (isset($city)) echo("Nombre Camping Car => ".$c2) ?></p>
                        <p style="width: 100%"><?php if (isset($city)) echo("Camion => ".$c3) ?></p>
                        <p style="width: 100%"><?php if (isset($totalPrice)) echo("Prix Total => ".$totalPrice) ?></p>
                        <p style="width: 100%"><?php if (isset($totalPrice)) echo("Message => ".$message) ?></p>
                        <p style="width: 100%"><?php if (isset($passenger)) var_dump($passenger) ?></p>
                    -->



                        <div class="col-12">
                            <input type="text" name="firstName" class="form-control" placeholder="Prenom">
                        </div>

                        <div class="col-12">
                            <input type="text" name="address" class="form-control" placeholder="Adresse">
                        </div>

                        <div class="col-12">
                            <input type="text" name="codePostal" class="form-control" placeholder="Code Postal">
                        </div>

                        <div class="col-12">
                            <input type="text" name="city" class="form-control" placeholder="Ville">
                        </div>

                        <input type="hidden" name="traverseId" value="<?php $traverseId ?>" />



                        <div class="col-12">

                            <table class = "table">
                                <thead>
                                    <tr>                                        
                                        <th></th>
                                        <th>Tarif en €</th>
                                        <th>Quantité</th>
                                    </tr>                                  
                                </thead>

                                <tbody>
                                    <?php
                                        foreach ($tarifs as &$tarif) {
                                            echo '<tr>                                        
                                                    <td>'. $tarif["id"] . " - " . $tarif["libelle"] .'</td>
                                                    <td>'. $tarif["prix"] .'</td>
                                                    <td><input type="number" min="0" name="' . $tarif["id"] . '" class="form-control" value="0"></td>
                                                </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">
                        <form action="recapReservation.html.php" method="get" target="_blank">
                            <button type="submit" class="btn dorne-btn">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area End ***** -->