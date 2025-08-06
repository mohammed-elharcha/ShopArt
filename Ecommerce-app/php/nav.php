<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <title>Document</title>
</head>
<body>
        <header>
            <div class="logo"><a href="home.php"><img src="../images/shopart-removebg-preview.png"/></a></div>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="navbar">
            <!-- <?php
session_start();
?> -->
<ul>
    <li><a href="home.php " class="active">home</a></li>
    <li><a class="black-color" href="afficherProduit.php">products</a></li>
    
    <?php
      $con =mysqli_connect("127.0.0.1", "root", "", "shopart") or die("connexion error");
      $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      
      ?>
    <li><a class="black-color" href="contact.php">contact</a></li>
    <li><a class="black-color" href="about.php">about</a></li>
    <li><a class='panier' href='cart.php'><i class="fa fa-shopping-cart"> </i><span> (<?php echo $row_count; ?>)</span></a></li> 

    <li>
        <?php
        if (empty($_SESSION['idUtilisateur'])) {
            echo "<a class='signup' href='sign-up.php'>sign up</a>";
        } else {
            echo "<a class='signup' href='profile.php'>mon profile</a>";
        }
        ?>
    </li>
    <li>
        <?php
        if (empty($_SESSION['idUtilisateur'])) {
            echo "<a class='login' href='login.php'>Login</a>";
        } else {
            echo "<a class='login' href='logout.php'>Déconnection</a>";
        }
        ?>
    </li>
</ul>
            </nav>
        </header>
        <script>
            hamburger =document.querySelector(".hamburger")
            hamburger.onclick = function(){
                navbar = document.querySelector(".navbar")
                navbar.classList.toggle("active")
            }
        </script>
</body>
</html>