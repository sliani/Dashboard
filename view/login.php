<div class="container">
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Login</div>
    <div class="card-body">
      <form action="../altran/login.php" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Remember Password</label>
          </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Login</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="register.php">Register an Account</a>
        <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>
