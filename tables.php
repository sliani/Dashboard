<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('./php/head.php');?>
</head>
<?php if(!isset($_SESSION['auth']))
{
  $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'être ici !";
  header('Location: login.php');
}
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <header>
    <?php include_once('./php/header.php');?>
  </header>
  <?php include_once('./view/tables.php');?>

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
