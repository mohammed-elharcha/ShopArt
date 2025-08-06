<?php 
include('connect.php');

$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT products.*, categories.name AS category_name FROM products 
          LEFT JOIN categories ON products.category_id = categories.id
          WHERE products.id = '$product_id'";

$result = mysqli_query($con, $query) or die("Erreur de la requête");

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/detailProduit.css">
    <title>Détails du produit</title>
</head>
<body>
<?php include("nav.php"); ?>
    <div class="container w-50">
        <h2 class="product-detail-title"><?php echo htmlspecialchars($product['name']); ?></h2>
        <div class="product-detail-card">
            <img src="../images/<?php echo $product['image_url']; ?>" class="product-detail-image" alt="<?php echo $product['name']; ?>">
            <p class="product-detail-description"><?php echo htmlspecialchars($product['description']); ?></p>
            <p class="product-detail-price"><?php echo number_format($product['price'], 2); ?> DH</p>
            <p class="product-detail-category">Catégorie : <?php echo htmlspecialchars($product['category_name']); ?></p>
            <a href="afficherProduit.php" class="btn w-100">back</a>
        </div>
    </div>
</body>
</html>
