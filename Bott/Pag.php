<?php 	
	include_once "contr.php";
  include_once "BrandController.php";

  $control = new ProducController();
  $brandController = new BrandController();

  if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
      $products = $control->get();
      $brands = $brandController->get();
  } else {
      header('Location: index.php');
      exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
    </div>

    <!-- Main content -->
    <div class="flex-grow-1">
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

      <div class="container mt-4">

      <div class="container d-flex my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Productos</a></li>
            </ol>
        </nav>

        
        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Add Producto
        </button>
    </div>


          <div class="row">
          <?php foreach ($products as $product): ?>
              <div class="col-md-4">
                  <div class="card mb-3">
                      <img src="<?= htmlspecialchars($product->cover) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->name) ?>">
                      <div class="card-body">
                          <h5 class="card-title"><?= htmlspecialchars($product->name) ?></h5>
                          <p class="card-text"><?= htmlspecialchars($product->description) ?></p>
                          <a href="./Detalles.php?slug=<?= $product->slug  ?>" class="btn btn-primary">Ver detalles</a>
                          <button onclick='editar(this)' data-product='<?= json_encode($product)  ?>' data-bs-toggle="modal" data-bs-target="#updateModal" type="button" class="btn btn-warning">Editar</button>
                          <button onclick="eliminar(<?= $product->id ?>)" type="button" class="btn btn-danger m-2">Eliminar</button>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="modalForm" action="./contr.php" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                          <label for="name" class="form-label">Nombre</label>
                          <input type="text" class="form-control" name="nombre" id="nombre" required>
                      </div>
                      <div class="mb-3">
                          <label for="slug" class="form-label">Slug</label>
                          <input type="text" class="form-control" name="slug" id="slug" required>
                      </div>
                      <div class="mb-3">
                          <label for="description" class="form-label">Descripción</label>
                          <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                      </div>
                      <div class="mb-3">
                          <label for="Caracteristicas" class="form-label">Características</label>
                          <textarea class="form-control" name="features" id="features" rows="3" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="slug" class="form-label">
                          Marca
                        </label>
                        
                        <select class="form-control">
                          <?php if (isset($brands) && count($brands)): ?>
                          <?php foreach ($brands as $brand): ?>
                          <option value="<?= $brand->id ?>">
                            <?= $brand->name ?>
                          </option>
                          <?php endforeach ?>
                          <?php endif ?>
                          
                        </select>

                      </div>
                      <button type="submit" class="btn btn-primary">Guardar Producto</button>
                      <input type="hidden" name="action" value="create_product">
                  </form>
                </div>
            </div>
        </div>
    </div>

	<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">
	        	Editar producto
	        </h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form method="POST" action="contr.php">
			  
			  <div class="mb-3">
			    <label for="nombre" class="form-label">
			    	Nombre
			    </label>
			    <input type="text" class="form-control" id="update_nombre" name="nombre" aria-describedby="emailHelp" required> 
			  </div>
			  
			  <div class="mb-3">
			    <label for="slug" class="form-label">
			    	Slug
			    </label>
			    <input type="text" class="form-control" id="update_slug" name="slug" required> 
			  </div>

			  <div class="mb-3">
			    <label for="slug" class="form-label">
			    	description
			    </label>
			    <input type="text" class="form-control" id="update_description" name="description" required> 
			  </div>

			  <div class="mb-3">
			    <label for="slug" class="form-label">
			    	features
			    </label>
			    <input type="text" class="form-control" id="update_features" name="features" required> 
			  </div>
			  
			  <div class="mb-3">
			    <label for="slug" class="form-label">
			    	Marca
			    </label>
			    
			    <select class="form-control">
			    	<?php if (isset($brands) && count($brands)): ?>
			    	<?php foreach ($brands as $brand): ?>
			    	<option value="<?= $brand->id ?>">
			    		<?= $brand->name ?>
			    	</option>
			    	<?php endforeach ?>
			    	<?php endif ?>
			    	
			    </select>

			  </div>
			  
			  <button type="submit" class="btn btn-primary">
			  	Crear producto
			  </button>

			  <input type="hidden" name="action" value="update_product">
				
			  <input type="hidden" name="product_id" id="product_id">

			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
	        	Cancelar
	        </button> 
	      </div>
	    </div>
	  </div>
	</div>

	<form method="POST" id="remove_form" action="contr.php"> 

	  <input type="hidden" name="action" value="delete_product">
	  <input type="hidden" name="product_id" id="product_id_delete">

	</form>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		
		function editar(boton)
		{

			let producto = JSON.parse(boton.dataset.product);

			console.log(producto.id)
			
			document.getElementById("update_nombre").value = producto.name
			document.getElementById("update_slug").value = producto.slug
			document.getElementById("update_description").value = producto.description
			document.getElementById("update_features").value = producto.features
			document.getElementById("product_id").value = producto.id
			


		}

		function eliminar(product_id)
		{
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    
			    swal("Poof! Your imaginary file has been deleted!", {
			      icon: "success",
			    });

			    document.getElementById("product_id_delete").value = product_id

			    document.getElementById('remove_form').submit();
			  
			  } else {
			    
			  }
			});
		}

	</script>

</body>
</html>
