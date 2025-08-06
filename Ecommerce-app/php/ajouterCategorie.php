<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = !empty($_POST['name']) ? $_POST['name'] : '';

    if ($name) {
        $query = "INSERT INTO categories (name) VALUES (?)";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $name);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<div class='alert alert-success mt-3'>Catégorie ajoutée avec succès !</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Erreur lors de l'ajout de la catégorie : " . mysqli_error($con) . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-warning mt-3'>Veuillez remplir tous les champs !</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
    <link rel="stylesheet" href="../css/ajouterCategorie.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Ajouter une Catégorie</h1>
        <div class="form-container">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la Catégorie</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <input type="submit" value="Ajouter Categorie" class="submit w-50" name="submit">
                <a href="ajouteProduit.php"><input value="Ajouter Produit" class="submit w-45" name="submit"></a>
            </form>
        </div>
    </div>

</body>
</html>
