<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/contact.css">

</head>
<body>
    <?php 
        include("nav.php");
    ?>
<div class="contact-intro">
  <p>
    Have questions, suggestions, or need assistance? We'd love to hear from you! 
    Whether you're looking for more information about our products or need support, 
    our team is here to help. Reach out to us through the form below, and we'll get 
    back to you as soon as possible. Your satisfaction is our top priority!
  </p>
</div>
    <div class="container">
        <div class="header">
            <?php 
            extract($_POST);
                if(isset($_POST["submit"])){
                    echo "<h4 class='feedback' >we received your email and will answer you as soon as possible</h4> 
                    <a href='home.php'><button class='home' >back</button></a>
                    ";
                }
            ?>
            <h1>Contact Us</h1>
        </div>

        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" name="submit" class="btn">Send</button>
        </form>
    </div>
    <?php 
        include("footer.php");
    ?>    
</body>
</html>
