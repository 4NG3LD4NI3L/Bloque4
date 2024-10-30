<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="d-flex justify-content-center align-items-center vh-100">
    
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row align-items-center bg-light shadow-lg rounded p-4">
            <div class="col-lg-6 d-none d-lg-block p-0">
                <img src="frf.jpg" class="img-fluid rounded-start" alt="Image 1">
            </div>
            <div class="col-lg-6 text-center">
                <img src="retr.jpg" class="img-fluid mb-4 rounded-circle" alt="Profile Image" style="max-width: 150px;">
                <h1 class="mb-4 fw-bold text-primary">SIGN INTO YOUR ACCOUNT</h1>
                <form method="POST" action="./auth">
                  <div class="mb-3 text-start">
                      <label for="correo" class="form-label">Email</label>
                      <input type="email" class="form-control" id="correoo" aria-describedby="emailHelp" required name="correo">
                  </div>
                  <div class="mb-3 text-start">
                      <label for="contrasena" class="form-label">Password</label>
                      <input type="password" placeholder="* * * * *" class="form-control" required name="contrasenna" id="contrasena">
                  </div>
                  <div class="mb-3 form-check text-start">
                      <input type="checkbox" class="form-check-input" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Submit</button>
                  <!-- Campo oculto para indicar la acción -->
                  <input type="hidden" name="action" value="access">
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
