<?php
include('connect.php');

if (isset($_POST['add_to_cart'])) {
    $cart_product_name = $_POST['product_name'];
    $cart_product_price = $_POST['product_price'];
    $cart_product_image = $_POST['product_image'];
    $cart_product_quantity = 1;

    $destinationimage = $cart_product_image;

    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$cart_product_name'") or die(mysqli_error($con));

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart';
    } else {
        $insert_product = mysqli_query($con, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$cart_product_name', '$cart_product_price', '$destinationimage', '$cart_product_quantity')") or die(mysqli_error($con));
        $message[] = 'Product added to cart successfully';
    }
}

$category_query = "SELECT * FROM categories";
$category_result = mysqli_query($con, $category_query) or die("Erreur de la requête");

$category_filter = isset($_POST['category']) ? $_POST['category'] : '';

$query = "SELECT products.*, categories.name AS category_name FROM products 
          LEFT JOIN categories ON products.category_id = categories.id";

if (!empty($category_filter) && is_numeric($category_filter)) {
    $query .= " WHERE products.category_id = '$category_filter'";
}

$result = mysqli_query($con, $query) or die("Erreur de la requête");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <link rel="stylesheet" href="../css/afficherProduit.css">
    <link rel="stylesheet" href="../css/message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Produits</title>
</head>

<body>
    <?php
    if (isset($message) && !empty($message)) {
        foreach ($message as $msg) {
            echo '<div class="message"><span>' . htmlspecialchars($msg) . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
        }
    }
    ?>

    <?php include("nav.php"); ?>

    <div class="container my-5">
        <form action="" method="post" class="w-70 d-flex">
            <select class="form-control w-25" name="category">
                <option value="">Sélectionner une catégorie</option>
                <?php
                while ($category = mysqli_fetch_assoc($category_result)) {
                    echo "<option value='" . $category['id'] . "'>" . htmlspecialchars($category['name']) . "</option>";
                }
                ?>
            </select>
            <button class="btn" type="submit">Filtrer</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['id'];
                    $product_name = $row['name'];
                    $product_description = $row['description'];
                    $product_price = $row['price'];
                    $product_category = $row['category_name'];
                    $product_image = $row['image_url'];  
                    ?>
                    <div class="col-md-3 mb-4">
                        <div class="product-card">
                            <a href="detailProduit.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: inherit;">
                                <img src="../images/<?php echo htmlspecialchars($product_image); ?>" class="product-image" alt="<?php echo htmlspecialchars($product_name); ?>">
                                <div class="product-info">
                                    <p class="product-title"><?php echo htmlspecialchars($product_name); ?></p>
                                    <div>
                                        <span class="product-price"><?php echo number_format($product_price, 2); ?> DH</span>
                                    </div>
                                </div>
                            </a>

                            <form method="POST" action="">
                                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>">
                                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product_price); ?>">
                                <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product_image); ?>">
                                <input type="submit" value="Add to Cart" class="btn btn-order-now" name="add_to_cart">
                            </form>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<h4 class="text-danger">Aucun produit trouvé pour cette catégorie</h4>';
            }
            ?>
        </div>
    </div>
    <?php 
        include("footer.php");
    ?>    
</body>

</html>
