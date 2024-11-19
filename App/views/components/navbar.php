<div class="navbar">
    <div class="nav-container">
        <div class="logo">
            <a href="/">Public Transport</a>
        </div>
        <div class="burger-menu" id="burger-menu" aria-label="Toggle navigation menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="nav-links" id="nav-links">
            <a href="/">Home</a>
            <a href="/routes">View Routes</a>
            <a href="/news">News</a>
            <a href="/map">Interactive Map</a>
            <a href="/profile">Profile</a>
            <a href="/logout" class="logout-button">Logout</a>
        </nav>

        <!-- Digital Clock -->
        <div id="clock" class="digital-clock"></div>
    </div>
</div>

<script>
    // Burger menu toggle functionality
    document.addEventListener("DOMContentLoaded", function() {
        const burgerMenu = document.getElementById("burger-menu");
        const navLinks = document.getElementById("nav-links");

        burgerMenu.addEventListener("click", function() {
            // Toggle the "show" class to show or hide the menu
            navLinks.classList.toggle("show");

            // Toggle "open" class to transform the burger menu into an "X"
            burgerMenu.classList.toggle("open");
        });
    });

    // Function to update the clock (Only with hours and minutes)
    function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, "0");
        const minutes = now.getMinutes().toString().padStart(2, "0");

        const timeString = `${hours}:${minutes}`;
        document.getElementById('clock').textContent = timeString;
    }

    // Update the clock every minute
    setInterval(updateClock, 60000); // Update every 60,000 milliseconds (1 minute)
    updateClock(); // Initialize the clock immediately
</script>

<style>
    /* Add Google Fonts for the digital clock */
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');

    /* Navbar Styling */
    .navbar {
        background-color: rgba(0, 0, 0, 0.9); /* Transparent black background */
        color: white;
        padding: 10px 20px;
        position: fixed; /* Stays at the top */
        top: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Add shadow */
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    /* Logo */
    .logo a {
        color: white;
        text-decoration: none;
        font-size: 24px;
        font-weight: bold;
    }

    /* Burger Menu Styling */
    .burger-menu {
        display: none; /* Hidden by default on desktop */
        flex-direction: column;
        justify-content: space-between;
        height: 20px;
        cursor: pointer;
    }

    .burger-menu span {
        display: block;
        width: 25px;
        height: 3px;
        background-color: white;
        border-radius: 2px;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    /* Navigation Links Styling */
    .nav-links {
        display: flex; /* Inline on larger screens */
        gap: 20px;
    }

    /* Link Hover Effect */
    .nav-links a {
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .nav-links a:hover {
        background-color: #1E90FF; /* Blue on hover */
    }

    /* For smaller screens, burger menu becomes visible */
    @media (max-width: 768px) {
        /* Show burger menu only on mobile */
        .burger-menu {
            display: flex;
        }

        .nav-links {
            position: absolute;
            top: 60px; /* Below the navbar */
            right: 0;
            background-color: rgba(0, 0, 0, 0.9); /* Transparent background */
            width: 100%;
            flex-direction: column;
            align-items: center;
            display: none; /* Hidden by default */
            z-index: 10;
        }

        .nav-links a {
            width: 100%; /* Full width for links */
            text-align: center; /* Center links */
            padding: 10px;
            border-top: 1px solid white; /* Adds a divider between links */
        }

        /* Show the nav-links when burger is clicked */
        .nav-links.show {
            display: flex; /* Show when toggled */
        }
    }

    /* Burger Menu Turns into an "X" when Opened */
    .burger-menu.open span:nth-child(1) {
        transform: rotate(45deg); /* Rotate the first span */
        position: relative;
        top: 7px; /* Move the span down */
    }

    .burger-menu.open span:nth-child(2) {
        opacity: 0; /* Hide the middle span */
    }

    .burger-menu.open span:nth-child(3) {
        transform: rotate(-45deg); /* Rotate the third span */
        position: relative;
        top: -7px; /* Move the span up */
    }

    /* Digital Clock Styling */
    .digital-clock {
        color: white;
        font-size: 24px; /* Increased font size for better visibility */
        font-family: 'Orbitron', sans-serif; /* Use Orbitron font */
        padding: 5px;
        border-radius: 5px;
        background-color: rgba(0, 0, 0, 0.7); /* Slightly transparent background */
        min-width: 70px; /* Ensures the clock has space for '00:00' */
        text-align: center;
    }
</style>
