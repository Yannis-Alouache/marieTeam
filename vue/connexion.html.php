    <div class="breadcumb-area bg-img bg-overlay">
    </div>
    <?php
        if ($message != "") {
            echo "<div class='alert alert-danger' role='alert'>
                $message
            </div>";
        }
    ?>

 
 <!-- ***** Contact Area Start ***** -->
    <div class="dorne-contact-area container" id="contact">
        <!-- Contact Form Area -->
        <div class="contact-form-area equal-height">
            <div class="contact-text">
                <h4>Connexion</h4>
            </div>
            <div class="contact-form">
                <form action="./?action=connexion" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <input type="email" name="mail" class="form-control" placeholder="Adresse Mail">
                        </div>
                        <div class="col-12">
                            <input type="password" name="password" class="form-control" style="margin-bottom: 0;" placeholder="Mot de passe">
                        </div>
                        <div class="col-12" style="margin-bottom: 30px;">
                            <a href="./?action=inscription"><small>Vous n'avez pas de compte ?</small></a>
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