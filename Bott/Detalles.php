<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


  <!-- Sidebar -->
  <div class="d-flex">
    <div class="bg-dark text-white p-3 min-vh-100">
      <h4>Sidebar</h4>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Customers</a>
        </li>
      </ul>
      <div class="dropdown ">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>

    <!-- Main content -->
    <div class="flex-grow-1">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar scroll</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>

              <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                  <li><a class="dropdown-item" href="#">New project...</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>
            </form>
          </div>
        </div>
      </nav>

      <!-- Tarjetas -->
      <div class="container mt-4">
        <h1>Detalles de productos</h1>

        <?php
        include 'contr.php';

       
        $id = $_GET['id'] ?? null;

        
        if ($id) {
          $product = getProductDetails($id);

          if ($product) {
        ?>
        <div class="card">
          <div class="card-header">
            <?= htmlspecialchars($product['categories'][0]['slug']) ?>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-xs-12 col-md-4">
                <img src="<?= htmlspecialchars($product['cover']) ?>" class="d-block w-100" alt="<?= htmlspecialchars($product['name']) ?>">
              </div>
  
              <div class="col">
                <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                <h3>$<?= htmlspecialchars(number_format($product['presentations'][0]['price'][0]['amount'], 2)) ?></h3>
                <p class="card-text">Descripcion: <?= htmlspecialchars($product['features']) ?></p>
                <a href="#" class="btn btn-primary">Comprar</a>
              </div>
            </div>
          </div>
        </div>
        <?php
          } else {
            echo "<div class='alert alert-danger'>Producto no encontrado.</div>";
          }
        } else {
          echo "<div class='alert alert-warning'>ID del producto no proporcionado.</div>";
        }
        ?>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
