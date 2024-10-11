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
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* Ensures body height covers entire viewport */
        overflow: hidden;
        position: relative;
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

    .road-line {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 10px;
        height: 100vh;
        background: linear-gradient(
            to bottom,
            transparent 0%,
            transparent 45%,
            yellow 45%,
            yellow 55%,
            transparent 55%,
            transparent 100%
        );
        background-size: 10px 100px;
        animation: roadAnimation 2s linear infinite;
        opacity: 0.8;
    }

    .header {
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 20px;
        text-align: center;
        position: fixed;
        width: 100%;
        z-index: 1000;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .clock {
        font-size: 25px;
        color: blue;
        background-color: black;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 255, 0.5);
        width: 250px;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
    }

    .sidebar {
        background-color: black;
        width: 200px;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        position: fixed;
        height: calc(100vh - 70px);
        top: 70px;
        overflow-y: auto;
        z-index: 100;
    }

    .sidebar h2 {
        color: #1E90FF;
        margin-bottom: 20px;
        font-size: 24px;
        text-align: center;
    }

    .sidebar a {
        display: block;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        text-align: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #1E90FF;
        color: black;
    }

    .content {
        flex: 1;
        padding: 20px;
        margin-left: 220px;
        margin-top: 70px;
        position: relative;
        z-index: 10;
    }

    .logout-button {
        width: 140px;
        height: 60px;
        background-color: black;
        border: 2px solid transparent;
        border-radius: 5px;
        cursor: pointer;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        margin-top: 10px;
        transition: border 0.3s ease;
        text-align: center;
        text-decoration: none;
    }

    .logout-button:hover {
        border: 2px solid;
        border-image: linear-gradient(90deg, red, yellow, green);
        border-image-slice: 1;
        animation: borderAnimation 1.5s linear infinite;
    }

    .logout-text {
        font-size: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
        position: absolute;
    }

    .logout-text:nth-child(1) {
        color: red;
        top: 10px;
    }

    .logout-text:nth-child(2) {
        color: yellow;
        top: 30px;
    }

    .logout-text:nth-child(3) {
        color: green;
        top: 50px;
    }

    .logout-button:hover .logout-text:nth-child(1) {
        opacity: 1;
        animation: fadeOut 1s forwards;
    }

    .logout-button:hover .logout-text:nth-child(2) {
        opacity: 0;
        animation: fadeInOut 1s forwards 1s;
    }

    .logout-button:hover .logout-text:nth-child(3) {
        opacity: 0;
        animation: fadeInOut 1s forwards 2s;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }

    @keyframes fadeInOut {
        0% {
            opacity: 0;
        }
        25% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }

    @keyframes borderAnimation {
        0% {
            border-color: red;
        }
        33% {
            border-color: yellow;
        }
        66% {
            border-color: green;
        }
        100% {
            border-color: red;
        }
    }

    /* Ad container styling */
    .ad-container {
        background-color: black;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: 1000;
    }

    .ad-container img {
        max-width: 100%;
        height: auto;
    }
</style>

<main class="create-edit-main">
    <div class="header">
        <h1>Public Transport</h1>
        <div class="clock" id="clock"></div>
    </div>
    <div class="sidebar">
        <h2>Explore Public Transport</h2>
        <a href="/routes">View Routes</a>
        <a href="/schedules">Check Schedules</a>
        <a href="/fares">Fare Information</a>
        <a href="/map" class="home-link">Interactive Map</a>
        <a href="/logout" class="logout-button">
            <span class="logout-text">Stop</span>
            <span class="logout-text">Get Ready</span>
            <span class="logout-text">Go</span>
        </a>
    </div>
    <div class="content">
        <h1>Main Content and shit</h1>
    </div>
    <div class="road-line"></div>

    <!-- Ad Container -->
    <div class="ad-container">
        <a href="https://www.olybet.lv/" target="_blank">
            <img src="https://www2.basket.lv/image/article/thumb_title_picture_92bad-lv_valstsvienibu_sponsoru_vizualis_1920x1080px_v1.jpg" alt="Advertisement">
        </a>
    </div>
</main>

<script>
    function updateClock() {
        const now = new Date();
        const options = { hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Europe/Riga' };
        const timeString = now.toLocaleTimeString('en-US', options).replace(':', ' : ');
        document.getElementById('clock').textContent = timeString;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>
