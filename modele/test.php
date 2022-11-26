<?php
include_once "bd.utilisateur.inc.php";
include_once "bd.inc.php";
include_once "bd.bateau.inc.php";


// var_dump(create_boat("La Fleche", 300, 150, 750, "F"));
// var_dump(create_boat("Le Raclo", 200, 100, 120, "V"));
// var_dump(create_boat("Le Raclof", 200, 100, 120, "F"));
// var_dump(get_boat_by_name("La Flech"));
var_dump(get_boats_special("A"));


?>