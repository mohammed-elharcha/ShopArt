<?php
include("connect.php");

$query = "SELECT * FROM categories";
$result = mysqli_query($con, $query);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $category_id = (int)$_POST['category_id'];
    $price = (float)$_POST['price'];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $source = $_FILES['photo']['tmp_name'];
        $destination = "../images/" . basename($_FILES['photo']['name']);

        if (move_uploaded_file($source, $destination)) {
            $query = "INSERT INTO products(`name`, `description`, `image_url`, `category_id`, `price`) 
                      VALUES('$name', '$description', '$destination', '$category_id', '$price')";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Produit ajouté avec succès');</script>";
            } else {
                echo "<script>alert('Erreur lors de l\'ajout du produit');</script>";
            }
        } else {
            echo "<script>alert('Erreur lors du téléchargement de l\'image');</script>";
        }
    } else {
        echo "<script>alert('Veuillez sélectionner une photo valide');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="../css/ajouteProdui.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
<?php include 'nav.php'; ?>
    <div class="form-container my-4">
        <h1 class="text-center mb-4">Ajouter un Produit</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="firstrow">
                <label for="name">Nom du Produit</label>
                <input type="text" name="name" id="name" class="form-control" required>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
            <div class="secondrow">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" required>
                <label for="category_id">Catégorie</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Sélectionner une catégorie</option>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="thirdrow">
                <label for="price">Prix</label>
                <input type="number" name="price" id="price" step="0.01" class="form-control mb-3" required>
            </div>
            <div class="d-flex justify-content-between">
                <input type="submit" value="Ajouter Produit" class="submit w-50" name="submit">
                <a href="ajouterCategorie.php"><input type="button" value="Ajouter Catégorie" class="submit w-45"></a>
            </div>
        </form>
    </div>
</body>

</html>
