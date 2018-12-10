<?php include("php/processing/db.php");

$req = $pdo->query("SELECT * FROM salarie");

if(isset($_GET['id']))
{
  $req2 = $pdo->prepare("SELECT competence.intitule, salarie.nom, salarie.prenom FROM competence
          RIGHT JOIN salarie_competence ON (salarie_competence.id_competence = competence.id)
          RIGHT JOIN salarie ON (salarie.id = salarie_competence.id_salarie) WHERE salarie.id = :id"); //Récupère toutes les entrées de tous le salariées avec leur compétence
  $req2->execute(array(
    'id' => $_GET['id']
  ));
  $listeComp = $req2->fetchAll();
  $req2->closeCursor();
}
?>

<!-- Start Content -->
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">My Dashboard</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-comments"></i>
            </div>
            <div class="mr-5">26 Nouveaux Messages!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">Détails</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-list"></i>
            </div>
            <div class="mr-5">11 Nouvelles Tâches!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">Détails</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5">123 Nouvelles Opérations!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">Détails</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-support"></i>
            </div>
            <div class="mr-5">13 Nouveaux Tickets!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">Détails</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!-- Area Chart Example-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-area-chart"></i> Liste des compétences du salarié</div>
      <div class="card-body">
        <ul class="list-group" style="color: black !important;">
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


    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Salarié(e)s</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Service</th>
              </tr>
            </thead>

            <tbody>
              <?php while($data = $req->fetch())
              {
                echo "<tr>";
                  echo "<td><a href='index.php?id=" . $data['id'] . "'>" . $data['nom'] . "</a></td>";
                  echo "<td>" . $data['prenom'] . "</td>";
                  echo "<td>" . $data['service'] . "</td>";
               echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
