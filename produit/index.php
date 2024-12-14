<?php 
require_once("../cnx.php");

$sql = "SELECT * FROM `produit`";
$exe = $con->prepare($sql);
$exe->execute();

$produits = $exe->fetchAll(PDO::FETCH_ASSOC)

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Gestion Produit</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../categorie/index.php">Categorie</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>


<div class="cantainer">

<div class="m-3">
    <a href="add.php" class="btn btn-primary">Nouveau</a>
</div>

    <table class="table table-bordered w-75 mt-5 offset-2">

        <thead class="table-primary">
            <tr>
                <th>N</th>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Categorie</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($produits as $key => $pro) {?>
            <tr>
                <th>  <?php echo $key + 1?></th>
                <th>  <?php echo $pro['libelle']?> </th>
                <th> <?php echo $pro['prix']?></th>
                <th> <?php echo $pro['quantite']?></th>
                <th> <?php echo $pro['idcategorie']?></th>
                <th>
                <a href="#" class="btn btn-primary">Modifier</a>
                <a href="#" class="btn btn-danger">Supprimer</a>
                </th>
            </tr>
          <?php } ?>
        </tbody>

    </table>


</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>