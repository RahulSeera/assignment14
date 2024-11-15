<?php include 'header.php'; ?>

<div class="hero">
    <div class="container">
        <h2>Your Fitness Journey Starts Here</h2>
        <p style="color:white">Join us and achieve your fitness goals with personalized workout plans.</p>
        <a href="#services" class="btn">Get Started</a>
    </div>
</div>

<section class="about" id="about">
    <div class="container">
        <h2>About Us</h2>
        <p style="color:white">We are dedicated to helping people reach their fitness goals with tailored workout programs, nutritional advice, and one-on-one support.</p>
    </div>
</section>

<section class="services" id="services">
    <div class="container">
        <h2>Our Services</h2>
        <div class="service-list">
            <div class="service-item1" onclick="window.location.href='calculator.php'">
                <h3>Basic</h3>
                <button class="sb1">Try Now</button>
            </div>
            
            <div class="service-item2" onclick="window.location.href='exercises.php'">
                <h3>Advanced</h3>
                <button class="sb2">Try Now</button>
            </div>
            
            <div class="service-item3" onclick="window.location.href='diet.php'">
                <h3>Nutrition Plans</h3>
                <button class="sb3">View Plans</button>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>