<?php 
include "connect.php";

$payment_message = '';

if (isset($_POST["submit"])) {
    $num_cart = $_POST['num_cart'];
    $date_month = (int) $_POST['date_month'];
    $date_year = (int) $_POST['date_year'];
    $cvv_cart = (int) $_POST['cvv_cart'];

    if (
        !empty($num_cart) && ctype_digit($num_cart) && strlen($num_cart) === 16 &&
        $date_month >= 1 && $date_month <= 12 &&
        $date_year >= 24 && $date_year <= 99 &&
        $cvv_cart >= 100 && $cvv_cart <= 999
    ) {

        $stmt = $con->prepare("INSERT INTO Payement (num_cart, date_year, date_month, cvv_cart, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("siii", $num_cart, $date_year, $date_month, $cvv_cart);

        if ($stmt->execute()) {
            $payment_message = "<p style='text-align: center;padding:20px;color:white;font-size:18px;border-radius:12px;font-weight:500; text-shadow:1px 1px 1px black; background: rgb(150, 222, 150);'>Payment processed successfully</p>";
        } else {
            $payment_message = "<p style='text-align: center;padding:20px;color:white;font-size:18px;border-radius:12px;font-weight:500; text-shadow:1px 1px 1px black; background: rgb(255, 0, 0);'>Error processing payment: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        $payment_message = "<p style='text-align: center;padding:20px;color:white;font-size:18px;border-radius:12px;font-weight:500; text-shadow:1px 1px 1px black; background: rgb(255, 0, 0);'>Invalid payment details. Please ensure card details are correct.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../css/payment.css">
</head>
<body>
    <?php 
    include "nav.php";
    ?>
    <div class="container">
    <div class="form">
        <h1 class="title">Payment</h1>
        <form method="POST" action="">
            <div class="first_row">
                <label for="num_cart"><img src="../images/icon-cart.jpg" alt="cart-icon" class="cart-icon"></label>
                <input type="text" name="num_cart" placeholder="Card Number" maxlength="16" required>
            </div>
            <div class="second_row">
                <input type="number" name="date_month" maxlength="16" placeholder="Expiry Month (MM)" min="1" max="12" required>
                <input type="number" name="date_year" maxlength="2" placeholder="Expiry Year (YY)" min="1" max="31" required>
            </div>
            <div class="third_row">
                <input type="number" name="cvv_cart" placeholder="CVV" maxlength="3" min="0" max="999" required>
            </div>
            <div class="subDiv">
                <button type="submit" class="submit" name="submit">Confirmation</button>
            </div><br>
            <?php
            echo $payment_message;
            ?>
        </form>
    </div>
    </div>
</body>
</html>
