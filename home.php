<?php
 ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OM Restaurant</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <header>
    <div class="logo">OM RESTAURANT</div>
    <nav id="navbar">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
  </header>

  <main>
    <section id="home">
      <h1 style="color:blue";>Welcome to OM Restaurant</h1>
      <img src="image.png" alt="Restaurant Image" />
    </section>
  </main>

  <script src="script.js"></script>
</body>


<!-- Contact Section -->
<section id="contact" class="contact-section">
  <div class="contact-container">
    <div class="contact-image">
      <img src="gujarati_restaurant_in_gujarat.jpg" alt="OM Restaurant">
    </div>
    <div class="contact-form">
      <h2>Contact Us</h2>
      <form action="/send" method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
      </form>
    </div>
  </div>
</section>

<!-- Footer Section -->
<footer class="site-footer">
  <link rel="stylesheet" href="footer.css">
  <div class="footer-content">
    <div class="footer-about">
      <h3>OM RESTAURANT</h3>
      <p>Delicious food.</p>
    </div>
    <div class="footer-links">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Menu</a></li>
        <li><a href="#">Reservations</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div class="footer-contact-info">
      <h4>Get in Touch</h4>
      <p>📞 <a href="tel:+919876543210">+91 98765 43210</a></p>
      <p>📧 <a href="mailto:info@omrestaurant.com">info@omrestaurant.com</a></p>
      <p>📍 Sarngpur, Botad, Gujarat</p>
    </div>
    <div class="footer-social">
      <h4>Follow Us</h4>
      <a href="#"><img src="https://img.icons8.com/ios/24/ffffff/facebook--v1.png"/></a>
      <a href="#"><img src="https://img.icons8.com/ios/24/ffffff/instagram-new.png"/></a>
      <a href="#"><img src="https://img.icons8.com/ios/24/ffffff/twitter-squared.png"/></a>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 OM RESTAURANT. All rights reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
  </div>
</footer>

</html>
