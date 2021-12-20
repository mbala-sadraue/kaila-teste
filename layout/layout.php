<?php 
$head =  '
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>'.$title.'</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/config.css">
</head>
<body>
  <div id="geral">
    
    
    <header id="header" class="navbar navbar-expand-lg cabecalho navbar-light">
      <div class="container">
        <a href="">
          <h1 class="navbar-brand" id="logo"> kaila-systems-solutions</h1>
        </a>
        <button type="button" class=" navbar-toggler " data-bs-toggle="collapse" data-bs-target="#barraNavegacao">
          <i class="fa fa-bars"></i>
        </button>
        <nav class="collapse navbar-collapse justify-content-start " id="barraNavegacao">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a href="/kaila/" class="nav-link link-activo">Home</a></li>
            <li class="nav-item"><a href="/Kaila/upload.php" class="nav-link link-activo">Contas</a></li>
           
          </ul>
        </nav>
      </div>
      </header>
      </head>

';


$footer = '
 </div>

  <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>

';
?>