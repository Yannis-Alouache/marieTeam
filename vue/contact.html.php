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
                <h3>Contactez nous !</h3>
            </div>
            <div class="contact-text">
                <p>L'équipe MarieTeam met tout en oeuvre pour répondre à vos attentes et vous accompagner dans vos projets</p>
            </div>
            <div class="contact-form">
                <form action="./?action=contact" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <input type="email" name="mail" class="form-control" placeholder="Adresse Mail">
                        </div>
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Nom">
                        </div>
                        <div class="col-12">
                            <input type="text" name="first_name" class="form-control" placeholder="Prenom">
                        </div>
                        <div class="col-12">
                            <input type="text" name="message" class="form-control" placeholder="Je souhaiterais avoir plus d'information sur ...">
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