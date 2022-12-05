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
                <h4>Inscription</h4>
            </div>
            <div class="contact-form">
                <form action="./?action=inscription" method="POST">
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
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
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