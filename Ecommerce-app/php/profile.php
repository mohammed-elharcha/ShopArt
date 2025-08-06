<?php
session_start();


if (empty($_SESSION['idUtilisateur'])) {
    header("Location: login.php");
    exit();
}


$firstName = $_SESSION['firstname'] ?? 'N/A';
$lastName = $_SESSION['lastname'] ?? 'N/A';
$email = $_SESSION['email'] ?? 'N/A';
$cin = $_SESSION['cin'] ?? 'N/A';
$tele = $_SESSION['tele'] ?? 'N/A';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 2rem;
            color: #4CAF50;
        }
        .profile-info {
            list-style: none;
            padding: 0;
        }
        .profile-info li {
            padding: 10px;
            margin: 10px 0;
            background: #f9f9f9;
            border-left: 4px solid #4CAF50;
            border-radius: 4px;
        }
        .logout-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 15px;
            background: #ff4c4c;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
        .logout-btn:hover {
            background: #e60000;
        }
    </style>
</head>
<body>
    <?php include "nav.php" ?>
    <div class="container">
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars($firstName); ?>!</h1>
        </div>
        <ul class="profile-info">
            <li><strong>First Name:</strong> <?php echo htmlspecialchars($firstName); ?></li>
            <li><strong>Last Name:</strong> <?php echo htmlspecialchars($lastName); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
            <li><strong>CIN:</strong> <?php echo htmlspecialchars($cin); ?></li>
            <li><strong>Phone:</strong> <?php echo htmlspecialchars($tele); ?></li>
        </ul>
        <a class="logout-btn" href="home.php">Back to home</a>
    </div>
</body>
</html>
