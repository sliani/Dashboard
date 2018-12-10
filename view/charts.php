<?php include("php/processing/db.php");

if(isset($_GET['id']))
{
  $req2 = $pdo->prepare("SELECT competence.intitule, salarie.nom, salarie.prenom FROM competence
          RIGHT JOIN salarie_competence ON (salarie_competence.id_competence = competence.id)
          RIGHT JOIN salarie ON (salarie.id = salarie_competence.id_salarie) WHERE salarie.id = :id"); //Récupère toutes les entrées de tous les salariées avec leurs compétences
  $req2->execute(array(
    'id' => $_GET['id']
  ));
  $listeComp = $req2->fetchAll();
  $req2->closeCursor();
}
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Charts</li>
    </ol>
    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-area-chart"></i> Liste des compétences du salarié</div>
      <div class="card-body">
        <ul>
        <?php
          if(isset($_GET['id']))
          {
            foreach($listeComp as $competences)
            {
              echo "<a href=\"#\" class=\"list-group-item\" style=\"color: black !important;\">" . $competences['intitule'] . "</a>";
            }
          }
          else
          {
            echo "Sélectionnez un salarié pour voir ses compétences";
          }

        ?>
      </ul>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <!-- Example Bar Chart Card-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-bar-chart"></i> Avis </div>
          <div class="card-body">
            <canvas id="myBarChart" width="100" height="50"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>

    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright © Altran 2018</small>
      </div>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>
