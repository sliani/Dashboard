<?php

/******************** IMPORTANT ********************/
/* La page confirm n'a plus d'utilité dans le sens ou la fonction mail
dans altran/register.php ligne 61 à été commenter ...
Les joies des smtp qui ne fonctionne pas... Dans tous les cas
Le système de validation token reste fonctionnel avec l'email. */

  $user_id = $_GET['id'];

  $token = $_GET['token'];

  require './processing/db.php';

  $req = $pdo->prepare('SELECT validation_token FROM users WHERE id = ?');

  $req->execute([$user_id]);

  $user = $req->fetch();
  session_start();
  /* Ici si mon utilisateur se connecte avec un token valide nous sommes OKAY ! */

  /* Cependant nous allons quand même vérifier si un utilisateur est bien existant */
  /* Dans notre condition on redige touts simplement l'user au dashboard si il existe */
  /* la même condition avec obligation d'un token valide serais  ($user && $user->validation_token == $tokens) */
  if ($user) {
    $pdo->prepare('UPDATE users SET validation_token = NULL, confirm_at = NOW() where id = ?')->execute([$user_id]);
    /* dans le cas ou ça match je crée m'a super variable et son index 'Auth' ou j'y stockerais mon user */
    $_SESSION['auth'] = $user;
    /* Attention voir la requête pdo->prepare au dessus, sans elle l'user ne pourra réaccéder a cette page */
    /* Voir également table : confirm_at en base de données */
    header('Location: ../index.php');
  }
  /* Sinon bah ... C'est pas OKAY quoi :) */
  else {
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
    header('Location: ../login.php');
  }

?>
