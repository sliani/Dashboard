<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Register an Account</div>
    <div class="card-body">
      <form action="" method="POST">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="exampleInputName">Nom</label>
              <input class="form-control" type="text" name="ftname" aria-describedby="nameHelp" placeholder="Entrez votre Nom">
            </div>
            <div class="col-md-6">
              <label for="exampleInputLastName">Prénom</label>
              <input class="form-control" type="text" name="lsname" aria-describedby="nameHelp" placeholder="Entrez votre Prénom">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input class="form-control" type="email" name="email" aria-describedby="emailHelp" placeholder="Entrez votre email">
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="exampleInputPassword1">Mot de passe</label>
              <input class="form-control" type="password" name="password" placeholder="Mot de passe">
            </div>
            <div class="col-md-6">
              <label for="exampleConfirmPassword">Validation Mot de Passe</label>
              <input class="form-control" type="password" name="confirm_password" placeholder="Confirmez votre mot de passe">
            </div>
          </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Register</button>
        <?php if (!empty($errors)): ?>
          <div class="alert alert-danger">
            <p>Vous n'avez pas rempli le formulaire correctement</p>
            <ul>
              <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="login.php">Login Page</a>
        <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>
