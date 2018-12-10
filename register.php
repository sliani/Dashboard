<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('./php/head.php');?>
</head>
<?php
  require_once './php/functions.php';
  session_start();

  /* On vérifie si des données ont bien été posté ! */
  if (!empty($_POST)) {
    /* Je créer une variable errors dans un tableau vide */
    /* Si ce tableau reste vide = aucune error sinon je les renverrais a l'utilisateur */
    $errors = array();
    require_once './php/processing/db.php';

    /* On vérifie que nom et prénom on bien été rentrer et qu'ils soient valide */
    if (empty($_POST['ftname']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['ftname'])) {
      $errors['ftname'] = "Votre nom n'est pas valide !";
    } else {
      $req = $pdo->prepare('SELECT id FROM users WHERE ftname = ?');
      $req->execute([$_POST['ftname']]);
    }

    if (empty($_POST['lsname']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['lsname'])) {
      $errors['lsname'] = "Votre prénom n'est pas valide !";
    } else {
      $req = $pdo->prepare('SELECT id FROM users WHERE lsname = ?');
      $req->execute([$_POST['lsname']]);
    }

    /* J'appelle une constante de PHP afin de valider l'email : FILTER_VALIDATE... */
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Votre email n'est pas valide !";
    } else {
      $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
      $req->execute([$_POST['email']]);
      $user = $req->fetch();
      if ($user) {
        $errors['email'] = "Ce mail est déjà pris !";
      }
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password']) {
      $errors['password'] = "Votre mot de passe doit être valide !";
    }

    if (empty($errors)) {
      require './php/processing/db.php';
      $req = $pdo->prepare("INSERT INTO users SET ftname = ?, lsname = ?, password = ?, email = ?");
      /* Faille de sécuriter si on stock le mot de passe en clair, celui ci sera donc encrypter */
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $token = str_random(60);
      $req->execute([$_POST['ftname'], $_POST['lsname'], $password, $_POST['email']]);
      /* Je récupère l'id utilisateur */
      /*$user_id = $pdo->lastInsertId(); */

      $_SESSION['flash']['success'] = 'Vous êtes bien inscris !';
      header('Location: ./login.php');
      /* Je commente ce code car trouver un smtp fonctionnel sous windows dois relevé du miracle
      il faut croire :D sinon le système serait fonctionnel mais nous allons faire sans pour facilité
      l'accès au dashboard */
       /* mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte Digital Factory merci de cliquez sur le lien suivant\n\nhttp://localhost/altran/php/confirm.php?id=$user_id&token=&token"); */
    }
  }

?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <header>
      <?php include_once('./php/header.php');?>
    </header>
    <?php include_once('./view/register.php');?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <!-- Custom scripts for this page-->
  <script src="js/sb-admin-datatables.min.js"></script>
  <script src="js/sb-admin-charts.js"></script>
</body>

</html>
