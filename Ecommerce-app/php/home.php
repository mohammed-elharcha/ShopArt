<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <?php 
        include("nav.php");
    ?>
    <section class="first">
        <img src="../images/shopart-removebg-preview.png" class="logo" alt="logo" />
        <div class="text">
            <h5 class="header-text">Best Art Shop</h5>
            <h6 class="middle-text">Experience the beauty <span>of art at Shopart</span></h6>
            <p class="paragraph">There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain.</p>
            <div class="button">
                <a href="afficherProduit.php">
                    <button type="submit" value="" class="shop-now">
                        <i class="fa fa-shopping-cart"></i> Shop Now
                    </button>
                </a>
            </div>
        </div>
    </section>
    <section class="second">
        <div class="advantages-container">
        <div class="advantages">
            <i class="fa-solid fa-truck-fast"></i>
            <h3>Fast Shipping</h3>
        </div>
        <div class="advantages">
            <i class="fa-solid fa-check-circle"></i>
            <h3>100% Quality Guarantee</h3>
        </div>
        <div class="advantages">
            <i class="fa-solid fa-thumbs-up"></i>
            <h3>Customer Satisfaction</h3>
        </div>
        </div>
    </section>
    <section class="third">

        <h1 class="artworks">
            OUR BEST ARTWORKS
        </h1>
        <div class="container">
        <div class="card">
            <img src="../images/Bildnis_Ludwig_van_Beethoven_.jpg" alt="beethoven">
            <h5 class="card-title">Portrait Ludwig van Beethoven when composing the Missa Solemnis</h5>
            <h6 class="price">200,000,000 DH</h6>
            <div class="btn-buy">
                <a href="afficherProduit.php" ><button class="order-now">order now</button></a>
            </div>
    </div>
        <div class="card">
            <img src="../images/Das-Maedchen-mit-dem-Perlenohrring-Restaurierte-Version-ab-1994.jpg" alt="beethoven">
            <h5 class="card-title">Girl with a Pearl Earring by Johannes Vermeer (1665)</h5>
            <h6 class="price">200,000,000 DH</h6>
            <div class="btn-buy">
                <a href="afficherProduit.php" ><button class="order-now">order now</button></a>
            </div>        </div>
        <div class="card">
            <img src="../images/Mona_Lisa,_by_Leonardo_da_Vinci,_from_C2RMF_retouched.jpg" alt="beethoven">
            <h5 class="card-title">Mona Lisa by Leonardo da Vinci (1503-1505)</h5>
            <h6 class="price">200,000,000 DH</h6>
            <div class="btn-buy">
                <a href="afficherProduit.php" ><button class="order-now">order now</button></a>
            </div>        </div>
    </div>
    </section>
    <section class="fourth">
        <h1 class="discount-title">Get 25% off on your first purchase!</h1>
        <a href="afficherProduit.php"><button class="announce"> <i class="fa fa-shopping-cart"></i> SHOP NOW</button></a>
    </section>
    <section class="fifth">
        <h2 class="review-title"> Customers Reviews </h2>
            <div class="review-container">
        <div class="review-card">
            <div class="review-header">
                <img src="../images/Khabib-Nurmagomedov-a-lUFC-990313.jpg" alt="khabib">
                <div review-info>
                    <h4 class="review-name">
                        Khabib Nurmagomedov
                    </h4>
                    <h4 class="review-rating">★★★★★</h4>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Dolor magni nostrum earum velit laborum ratione, tempore veritatis
                aut tenetur inventore omnis labore? Enim ullam alias consequuntur nisi, soluta rerum molestiae
                 elit. Dolor magni nostrum earum velit laborum ratione, tempore veritatis
                aut tenetur inventore omnis labore? Enim ullam alias consequuntur nisi, soluta rerum molestiae.</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="../images/download.jpg" alt="mike">
                <div review-info>
                    <h4 class="review-name">
                        Mike Tyson
                    </h4>
                    <h4 class="review-rating">★★★★★</h4>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Dolor magni nostrum earum velit laborum ratione, tempore veritatis
                aut tenetur inventore omnis labore? Enim ullam alias consequuntur nisi, soluta rerum molestiae
                elit. Dolor magni nostrum earum velit laborum ratione, tempore veritatis
                aut tenetur inventore omnis labore? Enim ullam alias consequuntur nisi, soluta rerum molestiae.</p>
        </div>
        <div class="review-card">
            <div class="review-header">
                <img src="../images/eb7bbd6d64f309185e53ae51570b6f5c.jpg" alt="khabib">
                <div review-info>
                    <h4 class="review-name">
                        marthe nielsen
                    </h4>
                    <h4 class="review-rating">★★★★★</h4>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Dolor magni nostrum earum velit laborum ratione, tempore veritatis
                aut tenetur inventore omnis labore? Enim ullam alias consequuntur nisi, soluta rerum molestiae      elit. Dolor magni nostrum earum velit laborum ratione, tempore veritatis
                aut tenetur inventore omnis labore? Enim ullam alias consequuntur nisi, soluta rerum molestiae.</p>
        </div>
    </div>
    </section>
    <?php 
        include("footer.php");
    ?>      
</body>
</html>
