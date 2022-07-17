<main class="form-signin">
  <form method="post">
    <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="username">
      <label for="floatingInput">Nombre de usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <?php if(isset($error_login) && $error_login): ?>
    <div class="alert alert-danger">Credenciales no válidas</div>
    <?php endif; ?>
  
    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>

  </form>
</main>