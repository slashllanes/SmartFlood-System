<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartFlood System</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.php"><img src="images/logo.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="data.php">DATA</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </nav>
<div class="text-box">
    <h1>Advanced Flood Alert System</h1>
    <p>Revolutionizing Flood Safety with Real-Time Alerts and Advanced Monitoring Technology.<br> Stay Informed, Stay Safe!</p>
    <a href="" class="hero-btn"> Visit Us to know More</a>
</div>
    </section>

<!--Key Features-->
<section class="features">
    <h1>Key Features</h1>
    <p>State-of-the-art flood warning and alert system designed to ensure maximum safety and preparedness.</p>

    <div class="row">
        <div class="features-col">
            <h3>Real-Time Monitoring</h3>
            <p>Utilizing cutting-edge sensors and data analytics, FloodGuard provides accurate and up-to-date flood monitoring for your area.</p>
        </div>
        <div class="features-col">
            <h3>Automated Alerts</h3>
            <p> Receive immediate notifications on your mobile device and email when flood levels rise, ensuring you have the information you need to stay safe.</p>
        </div>
        <div class="features-col">
            <h3>User-Friendly Interface</h3>
            <p>Users can customize alert settings, access educational resources about flood safety, and participate in community forums to share information and experiences.</p>
        </div>
    </div>
</section>

<!--Global-->
<section class="global">
    <h1> Going Global</h1>
    <p>Taking our mission to the global stage, AquaSafe is now expanding its reach worldwide, bringing advanced <br> flood warning and alert capabilities to every corner of the globe.</p>

    <div class="row">
        <div class="global-col">
            <img src="images/london.png">
            <div class="layer">
                <h3>LONDON</h3>
            </div>
        </div>
        <div class="global-col">
            <img src="images/newyork.png">
            <div class="layer">
                <h3>NEW YORK</h3>
            </div>
        </div>
        <div class="global-col">
            <img src="images/washington.png">
            <div class="layer">
                <h3>WASHINGTON</h3>
            </div>
        </div>
    </div>
</section>

<!--Reviews-->
<section class="reviews">
    <h1>Reviews</h1>

    <div class="row">
        <div class="reviews-col">
            <img src="images/user1.jpg">
            <div>
                <p>Ever since we got AquaSafe, it's been like having a buddy watching out for us. Those alerts? Super handy! Now I can relax knowing AquaSafe has my back when the water starts rising.</p>
                <h3>Christine Berkley</h3>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div>
        <div class="reviews-col">
            <img src="images/user2.jpg">
            <div>
                <p> Total game-changer. It's like having a smart friend who's always looking out for you. The alerts are spot-on, and knowing AquaSafe has our little community covered? Priceless. Big thumbs up from me!</p>
                <h3>David Byer</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div>
    </div>
</section>

<!--Call to Action-->

<section class="cta">
    <h1>Stay Ahead of the Floods, <br>Act Now with AquaSafe</h1>
    <a href="" class="hero-btn">CONTACT US</a>

</section>

<!--Footer-->

<section class="footer">
    <h4> About Us </h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

    <div class="icons">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-square-instagram"></i>    </div>
</section>

</body>
</html>