<?php 
require_once("../cnx.php");

$sql = "SELECT * FROM `categorie`";
$exe = $con->prepare($sql);
$exe->execute();

$categories = $exe->fetchAll(PDO::FETCH_ASSOC);



if(isset($_POST['submit'])){
  $lib = $_POST['libelle'];
  $prix = $_POST['prix'];
  $quantite = $_POST['quantite'];
  $idcategorie = $_POST['idcategorie'];

  try {
      $sql = "INSERT INTO `produit`(`id`, `libelle`, `prix`, `quantite`, `idcategorie`)
      VALUES (Null,:lib,:prix,:quantite,:idcategorie)";

      $exe = $con->prepare($sql);
      $exe->bindParam(':lib', $lib);
      $exe->bindParam(':prix', $prix);
      $exe->bindParam(':quantite', $quantite);
      $exe->bindParam(':idcategorie', $idcategorie);
      $exe->execute();

      header('Location:', 'index.php');

  } catch (PDOException $e) {
     
     // die();
      echo "Error: " . $e->getMessage();
  }

 
}

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

    <div class="card offset-3 w-50 mt-5">
        <div class="card-header text-center">
            <h2>Ajout Categorie</h2>
        </div>
        <div class="card-body m-3">
          <form action="" method="post">
          <div class="mt-2">
                <label for="">Libelle</label>
                <input type="text" name="libelle" id="" class="form-control">
            </div>
            <div class="mt-2">
                <label for="">Prix</label>
                <input type="text" name="prix" id="" class="form-control">
            </div>
            <div class="mt-2">
                <label for="">Quantite</label>
                <input type="text" name="quantite" id="" class="form-control">
            </div>
            <div class="mt-2">
                <label for="">Categorie</label>
                <select name="idcategorie" id="" class="form-select">
                <?php foreach ($categories as $key => $cat) {?>
                    <option value="<?=$cat['id'] ?>"><?php echo $cat['nom']?></option>
                    <?php }?>
                </select>
            </div>

            <div class="mt-3 text-center">
                <input type="submit" name="submit" value="Ajouter" class="btn btn-primary w-50">
            </div>
          </form>
        </div>
    </div>

</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>