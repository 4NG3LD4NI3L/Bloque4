<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <form action="aute.php" method="POST">
                    <div class="mb-3 text-start">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3 text-start">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                    </div>
                    <div class="mb-3 form-check text-start">
                      <input type="checkbox" class="form-check-input">
                      <label class="form-check-label">Remember me</label>
                    </div>
                    <input type="hidden" name="action" value="login">
                    <button type="submit" href="../Bott/pag.php" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
