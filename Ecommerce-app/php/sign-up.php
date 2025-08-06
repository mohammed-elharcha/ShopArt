

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="/images/icone.ico">
</head>
<body>
    <div class="fullContainer">

    <form method="POST" class="form">
        <div class="container">
        <?php
if (isset($_POST["submit"])) {
    include "connect.php";
    extract($_POST);


    $queryfname = "SELECT * FROM Utilisateur WHERE firstName = '$firstName'";
    $querylname = "SELECT * FROM Utilisateur WHERE lastName = '$lastName'";
    $queryemail = "SELECT * FROM Utilisateur WHERE email = '$email'";
    $querycin = "SELECT * FROM Utilisateur WHERE cin = '$cin'";
    $querytele = "SELECT * FROM Utilisateur WHERE tele = '$tele'";

    $resultfname = mysqli_query($con, $queryfname);
    $resultlname = mysqli_query($con, $querylname);
    $resultemail = mysqli_query($con, $queryemail);
    $resultcin = mysqli_query($con, $querycin);
    $resulttele = mysqli_query($con, $querytele);


    if (mysqli_num_rows($resultfname) > 0 && mysqli_num_rows($resultlname) > 0 && mysqli_num_rows($resultemail) > 0 && mysqli_num_rows($resultcin) > 0 && mysqli_num_rows($resulttele) > 0) {
        echo "<p class='pEreur'>Ce nom d'utilisateur, CNI et email sont déjà utilisés.</p>";
    } elseif (mysqli_num_rows($resultfname) > 0 || mysqli_num_rows($resultlname) > 0) {
        echo "<p class='pEreur'>Ce nom d'utilisateur est déjà utilisé.</p>";
    } elseif (mysqli_num_rows($resultcin) > 0) {
        echo "<p class='pEreur'>Ce CIN est déjà utilisé.</p>";
    } elseif (mysqli_num_rows($resultemail) > 0) {
        echo "<p class='pEreur'>Cet email est déjà utilisé.</p>";
    } elseif (mysqli_num_rows($resulttele) > 0) {
        echo "<p class='pEreur'>Ce numéro téléphone est déjà utilisé.</p>";
    } else {

        $query = "INSERT INTO `utilisateur` (`firstName`, `lastName`, `email`, `password`, `cin`, `tele`,`role`, `genre`) 
                  VALUES ('$firstName', '$lastName', '$email', '$password', '$cin', '$tele','user', '$genre')";
        $result = mysqli_query($con, $query);
        header("location:login.php");
    }
}
?>
            <h2 class="title">Create account</h2>
            <div class="first_row">
                <input type="text" name="firstName" class="firstName" placeholder="First Name" required/>
                <input type="text" name="lastName" class="lastName" placeholder="Last Name" required/>
            </div>
            <div class="second_row">
                <input type="email" name="email" class="email" placeholder="Email" required/>
                <input type="password" name="password" class="password" placeholder="Password" required/>
            </div>
            <div class="third_row">
                <input type="tel" name="tele" class="tele"  placeholder="Telephone" required/>
                <input type="text" name="cin" class="cin" placeholder="CIN" required/>
            </div>
            <div class="forth_row">
                <div class="radio_group">
                    <div class="homme">
                    <input type="radio" id="homme" value="homme" name="genre" required/>
                    <label for="homme">Homme</label>
                    </div>
                    <div class="femme">
                    <input type="radio" id="femme" value="femme" name="genre" required/>
                    <label for="femme">Femme</label>
                    </div>
                </div>
            </div>
            <div class="checkbox">
                <input type="checkbox" required value="terms" id="terms"/>
                <label class="terms" for="terms">I have read the terms and conditions and I hereby accept and agree to the <a href="#">terms and conditions</a>  </label>
            </div>
            <div class="subDiv">
                <input type="submit" name="submit" class="submit" value="Submit"/>
            </div>
            <h5>Already a member? Login <a href="login.php">here</a></h5>
        </div>
        
    </form>    
    </div>
    <?php 
        include("footer.php");
    ?>    
</body>
</html>
