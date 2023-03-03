 

    <!-- ***** Welcome Area Start ***** -->
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** About Area Start ***** -->
    <!-- ***** About Area End ***** -->

    <!-- ***** Features Destinations Area Start ***** -->
    <section class="dorne-features-destinations-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center" style="margin-top: 100px">
                        <span></span>
                        <h4>Traversées</h4>
                        <p>Voici les Traversées pour le <?php echo $date ?></p>
                    </div>
                </div>


                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Heure</th>
                                <th scope="col">Bateau</th>
                                <th scope="col">Passager</th>
                                <th scope="col">Véhicule inf. 2M</th>
                                <th scope="col">Véhicule sup. 2M</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach ($traversees as &$traversee) {
                                    echo "<form action='?action=reservation' method='POST'>";
                                    echo "<tr>";
                                        echo "<th scope='row'>$traversee[codeTraversee]</th>";
                                        echo "<td>$traversee[heure]</td>";
                                        echo "<td>$traversee[codeBateau]</td>";
                                        echo "<td>$traversee[quantitePassagerA]</td>";
                                        echo "<td>$traversee[quantitePassagerB]</td>";
                                        echo "<td>$traversee[quantitePassagerC]</td>";
                                        echo "<td><input type='submit' value='Reservez' class='btn btn-primary' /></td>";
                                    echo "</tr>";
                                    echo "<form>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

    <!-- ***** Clients Area Start ***** -->
    <div class="dorne-clients-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="clients-logo d-md-flex align-items-center justify-content-around">
                        <img src="img/clients-img/1.png" alt="">
                        <img src="img/clients-img/2.png" alt="">
                        <img src="img/clients-img/3.png" alt="">
                        <img src="img/clients-img/4.png" alt="">
                        <img src="img/clients-img/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Clients Area End ***** -->