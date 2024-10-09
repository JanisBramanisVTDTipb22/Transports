<?php require "../App/views/components/head.php"; ?>

<style>
    @keyframes roadAnimation {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: 0 100%; /* Move the background vertically */
        }
    }

    body {
        margin: 0;
        color: #e0e0e0;
        font-family: 'Arial', sans-serif;
        display: flex; /* Flexbox for layout */
        height: 100vh; /* Full height */
        overflow: hidden; /* Prevent scrolling */
        position: relative; /* To position the animated road background */
        background-color: #3c3c3c; /* Solid dark gray background to simulate road */
    }

    header {
        background-color: #0A0908; /* Header color */
        padding: 25px 0; /* Header padding */
    }

    nav {
        margin: auto;
        text-align: center; /* Center navigation items */
    }

    nav a {
        color: #fff; /* Text color for links */
        font-size: 20px; /* Font size for links */
        text-decoration: none; /* Remove underline */
        padding: 20px 50px; /* Padding around links */
        margin: 0 50px; /* Margin between links */
        border-radius: 5px; /* Rounded corners for links */
        transition: background-color 0.5s ease; /* Smooth transition for hover effect */
    }

    /* Create the single road line */
    .road-line {
        position: absolute;
        top: 0;
        left: 50%; /* Center horizontally */
        transform: translateX(-50%); /* Adjust for centering */
        width: 10px; /* Width of the road line */
        height: 100vh; /* Full height of the viewport */
        background: linear-gradient(
            to bottom,
            transparent 0%,
            transparent 45%,
            yellow 45%, /* Changed to yellow */
            yellow 55%, /* Changed to yellow */
            transparent 55%,
            transparent 100%
        ); /* Dashed line effect */
        background-size: 10px 100px; /* Adjust size for dashed effect */
        animation: roadAnimation 2s linear infinite; /* Move lines with road */
        opacity: 0.8; /* Slight transparency for effect */
    }

    /* Full-width Header */
    .header {
        background-color: rgba(0, 0, 0, 0.8); /* Dark background for the header */
        color: white; /* White text color */
        padding: 20px; /* Padding for header */
        text-align: center; /* Center text in header */
        position: fixed; /* Keep header at the top */
        width: 100%; /* Full width */
        z-index: 1000; /* Ensure header is on top */
    }

    /* Full-height Sidebar */
    .sidebar {
        background-color: black; /* Black sidebar */
        width: 200px; /* Fixed width for sidebar */
        padding: 20px; /* Padding for the sidebar */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5); /* Shadow effect */
        position: fixed; /* Fixed position for sidebar */
        height: calc(100vh - 70px); /* Full height minus header */
        top: 70px; /* Position under the header */
        overflow-y: auto; /* Allow scrolling if content overflows */
        z-index: 100; /* Sidebar above other elements */
    }

    .sidebar h2 {
        color: #bb86fc; /* Sidebar heading color */
        margin-bottom: 20px;
        font-size: 24px; /* Increased font size */
        text-align: center; /* Centered heading */
    }

    .sidebar a {
        display: block; /* Block display for links */
        color: white; /* Changed link color to white for visibility */
        text-decoration: none; /* No underline */
        padding: 10px; /* Padding for links */
        border-radius: 5px; /* Rounded corners */
        margin-bottom: 10px; /* Space between links */
        text-align: center; /* Center text */
        transition: background-color 0.3s ease; /* Transition effect */
    }

    .content {
        flex: 1; /* Flexible content area */
        padding: 20px; /* Padding for content */
        margin-left: 220px; /* Leave space for sidebar */
        margin-top: 70px; /* Leave space for header */
        height: calc(100vh - 70px); /* Full viewport height minus header */
        position: relative; /* To stack content above animated road */
        z-index: 10; /* Ensure content is above the background */
    }

    .logout-button {
        width: 140px; /* Width of the logout button */
        height: 60px; /* Height of the logout button */
        background-color: black; /* Default background color */
        border: 2px solid transparent; /* Initial border color */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Pointer on hover */
        z-index: 1000; /* Ensures the button is on top */
        display: flex; /* Flexbox for vertical stacking */
        flex-direction: column; /* Stack texts vertically */
        align-items: center; /* Center text */
        justify-content: center; /* Center vertically */
        position: relative; /* For absolute positioning of lights */
        overflow: hidden; /* Hide overflow for lights */
        color: white; /* Text color for logout button */
        margin-top: 10px; /* Margin to separate from other links */
        transition: border 0.3s ease; /* Transition effect for border */
        text-align: center; /* Center text */
    }

    .logout-text {
        font-size: 20px; /* Font size for the text */
        opacity: 0; /* Initially hide the text */
        transition: opacity 0.3s ease; /* Transition effect for opacity */
        position: absolute; /* Position absolutely for stacking */
    }

    /* Text colors for normal state */
    .logout-text:nth-child(1) {
        color: red; /* Red for the top text */
        top: 10px; /* Position the text at the top */
    }

    .logout-text:nth-child(2) {
        color: yellow; /* Yellow for the middle text */
        top: 30px; /* Position the text in the middle */
    }

    .logout-text:nth-child(3) {
        color: green; /* Green for the bottom text */
        top: 50px; /* Position the text at the bottom */
    }

    /* Hover effect for the traffic light sequence */
    .logout-button:hover .logout-text:nth-child(1) {
        opacity: 1; /* Show top text */
        animation: fadeOut 1s forwards; /* Fade out over 1 second */
    }

    .logout-button:hover .logout-text:nth-child(2) {
        opacity: 0; /* Hide middle text initially */
        animation: fadeInOut 1s forwards 1s; /* Fade in after top text fades out */
    }

    .logout-button:hover .logout-text:nth-child(3) {
        opacity: 0; /* Hide bottom text initially */
        animation: fadeInOut 1s forwards 2s; /* Fade in after middle text fades out */
    }

    /* RGB border on hover for logout button */
    .logout-button:hover {
        border: 2px solid; /* Border color on hover */
        border-image: linear-gradient(90deg, red, yellow, green); /* RGB gradient */
        border-image-slice: 1; /* Slice the gradient for proper rendering */
        animation: borderAnimation 1.5s linear infinite; /* Animate the border */
    }

    @keyframes fadeOut {
        0% {
            opacity: 1; /* Fully visible */
        }
        100% {
            opacity: 0; /* Fade out */
        }
    }

    @keyframes fadeInOut {
        0% {
            opacity: 0; /* Initially hidden */
        }
        25% {
            opacity: 1; /* Fully visible */
        }
        100% {
            opacity: 0; /* Fade out */
        }
    }

    @keyframes borderAnimation {
        0% {
            border-color: red; /* Start with red */
        }
        33% {
            border-color: yellow; /* Change to yellow */
        }
        66% {
            border-color: green; /* Change to green */
        }
        100% {
            border-color: red; /* Loop back to red */
        }
    }
</style>

<main class="create-edit-main">
    <div class="header">
        <h1>Welcome to Public Transport</h1>
    </div>
    <div class="sidebar">
        <h2>Explore Public Transport</h2>
        <a href="/routes">View Routes</a>
        <a href="/schedules">Check Schedules</a>
        <a href="/fares">Fare Information</a>
        <a href="/map">Interactive Map</a>
        <a href="/news">Transport News</a>

        <!-- Logout Form -->
        <form action="/logout" method="POST" style="margin-top: 20px;">
            <button type="submit" class="logout-button">
                <span class="logout-text">Logout</span>
                <span class="logout-text">Logout</span>
                <span class="logout-text">Logout</span>
            </button>
        </form>
    </div>
    <div class="content">
        <h2>Galvenais text and shit</h2>
    </div>
</main>
