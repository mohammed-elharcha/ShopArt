<?php

@include 'connect.php';

if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
    if ($update_quantity_query) {
        header('location:cart.php');
    }
    ;
}
;

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:cart.php');
}
;

if (isset($_GET['delete_all'])) {
    mysqli_query($con, "DELETE FROM `cart`");
    header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="../css/carte.css">

</head>

<body>

    <?php include 'nav.php'; ?>

    <div class="container">

        <section class="shopping-cart">

            <h1 class="heading">shopping cart</h1>

            <table>
                <tbody>

                    <?php

                    $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            ?>

                            <tr>
                                <td><img src="../images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                                <td><?php echo $fetch_cart['name']; ?></td>
                                <td><?php echo number_format($fetch_cart['price']); ?> DH</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                                        <input type="number" name="update_quantity" min="1"
                                            value="<?php echo $fetch_cart['quantity']; ?>" class="quantity-select">
                                        <input type="submit" value="update" name="update_update_btn" class="update-btn">
                                    </form>
                                </td>
                                <td><?php echo number_format($sub_total = $fetch_cart['price'] * $fetch_cart['quantity']); ?> DH</td>
                                <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>"
                                        onclick="return confirm('remove item from cart?')" class="delete-btn"> <i
                                            class="fas fa-trash"></i> remove</a></td>
                            </tr>
                            <?php
                            $grand_total += $sub_total;
                        }
                        ;
                    }
                    ;
                    ?>
                    <tr class="table-bottom">
                        <td><a href="afficherProduit.php" class="option-btn" style="margin-top: 0;">continue
                                shopping</a></td>
                        <td colspan="3">grand total</td>
                        <td><?php echo number_format($grand_total); ?> DH</td>
                        <td><a href="cart.php?delete_all"
                                onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i
                                    class="fas fa-trash"></i> delete all </a></td>
                    </tr>

                </tbody>

            </table>

            <div class="checkout-btn">
                <a href="payment.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Buy</a>
            </div>

        </section>

    </div>
    <?php 
        include("footer.php");
    ?>    


</body>

</html>