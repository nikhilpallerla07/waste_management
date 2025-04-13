<?php
session_start();
include("connect.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EcoWaste Solutions</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <style>
    .fade-section {
      opacity: 0;
      transform: translateY(20px);
      transition: all 1s ease-out;
    }
    .fade-section.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .active-service {
      animation: popUp 0.6s ease-out forwards;
    }
    @keyframes popUp {
      0% {
        transform: scale(0.8);
        opacity: 0.5;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }
    .slideshow-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }
    .slideshow {
      display: flex;
      animation: slideShow 25s linear infinite;
      height: 100%;
    }
    .slideshow img {
      min-width: 100%;
      height: 100%;
      object-fit: cover;
      flex-shrink: 0;
    }
    @keyframes slideShow {
      0% { transform: translateX(0); }
      20% { transform: translateX(0); }
      25% { transform: translateX(-100%); }
      45% { transform: translateX(-100%); }
      50% { transform: translateX(-200%); }
      70% { transform: translateX(-200%); }
      75% { transform: translateX(-300%); }
      95% { transform: translateX(-300%); }
      100% { transform: translateX(-400%); }
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.3s ease-out;
    }
  </style>
</head>
<body>
  <script>AOS.init();</script>

  <!-- Navigation -->
  <header class="text-white bg-red-200">
    <nav class="flex justify-between items-center p-6 bg-white shadow-md">
      <div class="text-xl font-bold flex items-center space-x-2">
        <span class="text-green-600">ZERO</span> <span class="text-black">WASTE</span>
      </div>
      <div class="space-x-6 hidden md:flex">
        <a href="#" class="nav-link text-gray-700 font-medium hover:text-green-600">Home</a>
        <a href="#about" class="nav-link text-gray-700 font-medium hover:text-green-600">About Us</a>
        <a href="#services" class="nav-link text-gray-700 font-medium hover:text-green-600">Services</a>
        <a href="#" class="nav-link text-gray-700 font-medium hover:text-green-600">Process</a>
        <a href="#" class="nav-link text-gray-700 font-medium hover:text-green-600">Event</a>
      </div>
      <div class="space-x-4">
        <button class="px-3 py-2 text-black border rounded-lg hover:bg-gray-400">Contact Us</button>
        <button class="px-3 py-2 text-black font-bold border rounded-lg hover:bg-red-400"
        onclick="window.location.href='logout.php';">
        Log out
        </button>

      </div>
    </nav>
  </header>

  <!-- Hero Section with Sliding Background -->
  <section class="relative h-screen overflow-hidden">
    <!-- Slideshow Background -->
    <div class="slideshow-container">
      <div class="slideshow">
        <img src="img10.jpg" alt="Slide 1">
        <img src="img9.jpg" alt="Slide 2">
        <img src="img11.jpg" alt="Slide 3">
        <img src="img8.jpg" alt="Slide 4">
        <img src="img4.jpg" alt="Slide 5">
      </div>
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
    </div>

    <!-- Foreground Content -->
    <div class="relative z-20 flex justify-center items-center h-full">
      <div class="text-center text-white px-6">
        <h1 class="text-5xl font-bold mb-4" data-aos="fade-down">Welcome to</h1>
        <p class="text-4xl" data-aos="fade-up">Waste Management and Recycling Request Portal.</p>
        <a href="#explore" class="mt-6 inline-block bg-blue-600 text-white py-3 px-8 rounded-full hover:bg-blue-700 transition" data-aos="zoom-in">Start Exploring</a>
      </div>
    </div>
  </section>

  <!-- Animated Counter Section -->
  <section class="bg-white py-20 text-center" id="explore">
    <h2 class="text-3xl font-bold mb-8">Our Impact</h2>
    <div class="text-5xl font-bold text-green-600" id="counter">0</div>
  </section>
  <script>
    let count = 0;
    let counter = document.getElementById("counter");
    let interval = setInterval(() => {
      count++;
      counter.innerText = count;
      if (count >= 1000) clearInterval(interval);
    }, 5);
  </script>

  <!-- Hover Effect Section -->
  <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 py-12 bg-gray-100">
    <img src="img10.jpg" class="transform hover:scale-105 hover:rotate-1 transition duration-500 rounded-xl">
    <img src="img11.jpg" class="transform hover:scale-105 hover:rotate-1 transition duration-500 rounded-xl">
    <img src="img9.jpg" class="transform hover:scale-105 hover:rotate-1 transition duration-500 rounded-xl">
  </section>

  

  <!-- Add your Services, About, Footer, and Script sections below (as in your earlier code) -->

  <!-- Services Section -->
  <section class="py-20 bg-gray-50 fade-section" id="services">
    <div class="container mx-auto px-6">
      <h2 class="text-4xl font-bold text-center mb-12">Our Services</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="service-card bg-white p-8 rounded-lg shadow-lg transition">
          <div class="text-5xl mb-4 animate-bounce">♻️</div>
          <h3 class="text-2xl font-semibold mb-4">Recycling Services</h3>
          <p class="text-gray-600 mb-4">Professional recycling solutions for residential and commercial needs.</p>
          <a href="recycling.html" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Learn More</a>
        </div>
        <div class="service-card bg-white p-8 rounded-lg shadow-lg transition">
          <div class="text-5xl mb-4 animate-bounce">🚛</div>
          <h3 class="text-2xl font-semibold mb-4">Waste Collection</h3>
          <p class="text-gray-600 mb-4">Regular and reliable waste collection services.</p>
          <a href="collection.html" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Learn More</a>
        </div>
        <div class="service-card bg-white p-8 rounded-lg shadow-lg transition">
          <div class="text-5xl mb-4 animate-bounce">🌱</div>
          <h3 class="text-2xl font-semibold mb-4">Green Initiatives</h3>
          <p class="text-gray-600 mb-4">Sustainable waste management consulting and solutions.</p>
          <a href="green.html" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Learn More</a>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-20 bg-white fade-section" id="about">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-8 md:mb-0">
          <div class="grid grid-cols-2 gap-4">
            <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b" class="rounded-lg shadow-xl">
            <img src="https://images.unsplash.com/photo-1581090700227-1e37b190418e" class="rounded-lg shadow-xl">
            <img src="https://images.unsplash.com/photo-1605705319956-4e8a5d3cf2b0" class="rounded-lg shadow-xl col-span-2">
          </div>
        </div>
        <div class="md:w-1/2 md:pl-12">
          <h2 class="text-4xl font-bold mb-6">About Us</h2>
          <p class="text-gray-600 mb-6">We are committed to providing sustainable waste management solutions that protect our environment for future generations. Our team of experts works tirelessly to ensure proper waste disposal and maximize recycling efforts.</p>
          <button class="bg-green-600 text-white px-8 py-3 rounded-full font-bold hover:bg-green-700 transition">Learn More</button>
        </div>
      </div>
    </div>
  </section>
  <!-- feedback -->
 <section class="px-6 py-12 bg-white">
  <h2 class="text-3xl font-bold mb-6 text-center">Frequently Asked Questions</h2>
  <div class="max-w-2xl mx-auto space-y-4">
    <details class="group border border-gray-300 rounded-lg p-4 bg-gray-50 hover:shadow-lg transition">
      <summary class="font-semibold text-lg cursor-pointer flex justify-between items-center group-open:text-green-600">
        What items can be recycled?
        <span class="ml-2 transform group-open:rotate-180 transition-transform">▼</span>
      </summary>
      <p class="mt-2 text-gray-700 leading-relaxed">Plastic, paper, glass, and metals are recyclable.</p>
    </details>
    <details class="group border border-gray-300 rounded-lg p-4 bg-gray-50 hover:shadow-lg transition">
      <summary class="font-semibold text-lg cursor-pointer flex justify-between items-center group-open:text-green-600">
        How do I schedule a pickup?
        <span class="ml-2 transform group-open:rotate-180 transition-transform">▼</span>
      </summary>
      <p class="mt-2 text-gray-700 leading-relaxed">You can schedule through the portal or mobile app.</p>
    </details>
    <details class="group border border-gray-300 rounded-lg p-4 bg-gray-50 hover:shadow-lg transition">
      <summary class="font-semibold text-lg cursor-pointer flex justify-between items-center group-open:text-green-600">
        What is the best way to reduce waste at home?
        <span class="ml-2 transform group-open:rotate-180 transition-transform">▼</span>
      </summary>
      <p class="mt-2 text-gray-700 leading-relaxed">Use reusable items, compost organic waste, and avoid single-use plastics.</p>
    </details>
    <details class="group border border-gray-300 rounded-lg p-4 bg-gray-50 hover:shadow-lg transition">
      <summary class="font-semibold text-lg cursor-pointer flex justify-between items-center group-open:text-green-600">
        Where can I drop off hazardous waste?
        <span class="ml-2 transform group-open:rotate-180 transition-transform">▼</span>
      </summary>
      <p class="mt-2 text-gray-700 leading-relaxed">Check local government or recycling centers that handle hazardous materials.</p>
    </details>
    <details class="group border border-gray-300 rounded-lg p-4 bg-gray-50 hover:shadow-lg transition">
      <summary class="font-semibold text-lg cursor-pointer flex justify-between items-center group-open:text-green-600">
        Do you offer services for businesses?
        <span class="ml-2 transform group-open:rotate-180 transition-transform">▼</span>
      </summary>
      <p class="mt-2 text-gray-700 leading-relaxed">Yes, we offer tailored waste management solutions for businesses and organizations.</p>
    </details>
  </div>
</section>

  <!-- Feedback Modal -->
  <div id="feedbackModal" class="hidden fixed inset-0 bg-black bg-opacity-40 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md space-y-4 animate-fadeIn">
      <h3 class="text-xl font-semibold text-gray-800">We'd love your feedback!</h3>
      <textarea placeholder="Write your feedback here..." class="w-full p-2 border border-gray-300 rounded resize-none h-32"></textarea>
      <div class="flex justify-end space-x-2">
        <button onclick="toggleFeedback()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
        <button onclick="submitFeedback()" class="px-4 py-2 rounded bg-green-600 text-white hover:bg-green-700">Submit</button>
      </div>
    </div>
  </div>

  <!-- Feedback Button -->
  <button onclick="toggleFeedback()" title="Send us your thoughts!" class="fixed bottom-6 right-6 bg-green-600 text-white px-5 py-3 rounded-full shadow-lg hover:bg-green-700 animate-bounce transition">
    💬 Feedback
  </button>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">EcoWaste Solutions</h3>
          <p class="text-gray-400">Making waste management sustainable and efficient.</p>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
          <ul class="space-y-2">
            <li><a href="#home" class="text-gray-400 hover:text-white transition">Home</a></li>
            <li><a href="#services" class="text-gray-400 hover:text-white transition">Services</a></li>
            <li><a href="#about" class="text-gray-400 hover:text-white transition">About</a></li>
            <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
          <ul class="space-y-2 text-gray-400">
            <li>Phagwara</li>
            <li>Green City, 144411</li>
            <li>Phone: (123) 456-7890</li>
            <li>Email: msingh7763@gmail.com</li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition">Facebook</a>
            <a href="#" class="text-gray-400 hover:text-white transition">Twitter</a>
            <a href="#" class="text-gray-400 hover:text-white transition">LinkedIn</a>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; 2025 EcoWaste Solutions. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script>
    function toggleFeedback() {
      document.getElementById("feedbackModal").classList.toggle("hidden");
    }

    function submitFeedback() {
      toggleFeedback();
      alert("Thank you for your feedback!");
    }
    const fadeSections = document.querySelectorAll('.fade-section');
    const fadeObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          if (entry.target.id === "services") {
            const cards = entry.target.querySelectorAll(".service-card");
            cards.forEach((card, index) => {
              setTimeout(() => {
                card.classList.add("active-service");
              }, index * 500);
            });
          }
        }
      });
    });
    fadeSections.forEach(section => fadeObserver.observe(section));

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });

    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    function activateLinkOnScroll() {
      let scrollY = window.scrollY;
      sections.forEach(current => {
        const sectionHeight = current.offsetHeight;
        const sectionTop = current.offsetTop - 100;
        const sectionId = current.getAttribute('id');
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
          navLinks.forEach(link => {
            link.classList.remove('text-green-600', 'font-bold');
            if (link.getAttribute('href') === `#${sectionId}`) {
              link.classList.add('text-green-600', 'font-bold');
            }
          });
        }
      });
    }
    window.addEventListener('scroll', activateLinkOnScroll);
  </script>
</body>
</html>s