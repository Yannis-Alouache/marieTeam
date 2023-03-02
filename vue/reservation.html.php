

<div class="breadcumb-area bg-img bg-overlay"></div>
    <!--
        <?php
        if ($message != "") {
            echo "<div class='alert alert-danger' role='alert'>
                $message
            </div>";
        }
    ?>
    -->

 
    <div class="dorne-contact-area container" id="contact">
        <!-- Contact Form Area -->
        <div class="contact-form-area equal-height">
            <div class="contact-text">
                <h4>Reservation</h4>
            </div>
            <div class="contact-form">
                <form action="./?action=inscription" method="POST">
                    <div class="row">

                        <!--<div class="col-12">
                            <input type="email" name="mail" class="form-control" placeholder="Adresse Mail">
                        </div>-->

                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Nom">
                        </div>

                        <div class="col-12">
                            <input type="text" name="first_name" class="form-control" placeholder="Prenom">
                        </div>

                        <div class="col-12">
                            <input type="text" name="codePostal" class="form-control" placeholder="Code Postal">
                        </div>

                        <div class="col-12">
                            <input type="text" name="country" class="form-control" placeholder="Ville">
                        </div>

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
                                    <tr>                                        
                                        <td>Adulte</td>
                                        <td>20.00</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Junior 8 à 18 ans</td>
                                        <td>13.10</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Enfant 0 à 7 ans</td>
                                        <td>7.00</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Voiture inférieur à 4 m </td>
                                        <td>95.00</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Voiture inférieur à 5 m</td>
                                        <td>142.00</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Fourgon</td>
                                        <td>208.00</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Camping Car</td>
                                        <td>226.00</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                    <tr>
                                        <td>Camion</td>
                                        <td>295.00</td>
                                        <td><input type="text" name="quantité" class="form-control" placeholder="0"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn dorne-btn">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area End ***** -->