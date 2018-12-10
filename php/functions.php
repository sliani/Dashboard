<?php
/* On créer la fonction debug qui prendra en paramètre la variable que je souhaite débuguer */


/* Je multiplie 60 fois la chaine de caractère pour avoir plusieurs fois plusieurs caractères */
function str_random($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

/* Je laisse intentionnellement la balise php ouverte afin d'évitez tout bug suite
aux espaces après la balise php en cas d'oublie, PHP comprend que je termine mes fonctions */


function login_only(){
  session_start();
  if ($_SESSION['auth'] != null) {
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'être ici !";
    header('Location: login.php');
  }
}
