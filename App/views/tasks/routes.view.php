<?php require "../App/views/components/head.php"; ?>

<style>
    /* Reusing existing styles for consistency */
    body {
        margin: 0;
        color: #e0e0e0;
        font-family: 'Arial', sans-serif;
        display: flex;
        height: 100vh;
        overflow: hidden;
        position: relative;
        background-color: #3c3c3c; /* Dark gray background */
    }

    header {
        background-color: #0A0908;
        padding: 25px 0;
    }

    nav {
        margin: auto;
        text-align: center;
    }

    nav a {
        color: #fff;
        font-size: 20px;
        text-decoration: none;
        padding: 20px 50px;
        margin: 0 50px;
        border-radius: 5px;
        transition: background-color 0.5s ease;
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
        height: calc(100vh - 70px);
        position: relative;
        z-index: 10;
        overflow-y: auto; /* Allow scrolling for content */
    }

    /* Route Sections */
    .route-section {
        margin-bottom: 30px; /* Space between sections */
    }

    .route-section h2 {
        color: #1E90FF; /* Section title color */
        font-size: 28px; /* Font size for section titles */
        margin-bottom: 10px; /* Space below section titles */
    }

    /* Map styling */
    #map {
        width: 100%; /* Full width for map */
        height: 400px; /* Set height for map */
        border-radius: 5px; /* Rounded corners */
        margin-top: 10px; /* Space above the map */
    }
    .clock {
        font-size: 25px; /* Font size for the clock */
        color: blue; /* Green text color */
        background-color: black; /* Background color for clock */
        padding: 10px; /* Padding for clock */
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 255, 0.5);
        width: 250px;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
    }
</style>

<main class="create-edit-main">
    <div class="header">
        <h1>Public Transport - Routes</h1>
        <div class="clock" id="clock"></div>
    </div>
    <div class="sidebar">
        <h2>Explore Public Transport</h2>
        <a href="/" class="back-link">Back to Home</a>
        <a href="/schedules">Check Schedules</a>
        <a href="/fares">Fare Information</a>
        <a href="/contacts">Contact Us</a>
        <a href="/map">Interactive Map</a>
    </div>
    <div class="content">
        <div class="route-section">
            <h2>Train Routes in Latvia</h2>
            <p>Explore the train routes that connect major cities and regions in Latvia.</p>
            <ul>
                <li>Riga to Daugavpils</li>
                <li>Riga to Liepaja</li>
                <li>Riga to Rēzekne</li>
                <li>Daugavpils to Rēzekne</li>
                <li>Liepaja to Ventspils</li>
            </ul>
        </div>
        <div class="route-section">
            <h2>Bus Routes in Latvia</h2>
            <p>Discover the bus routes that serve urban and rural areas across the country.</p>
            <ul>
                <li>Riga to Jurmala</li>
                <li>Riga to Sigulda</li>
                <li>Daugavpils to Rēzekne</li>
                <li>Liepaja to Ventspils</li>
                <li>Riga to Cesis</li>
            </ul>
        </div>
        <div class="route-section">
            <h2>Map of Routes</h2>
            <div id="map"></div>
        </div>
    </div>
    <div class="road-line"></div>
</main>

<script>
    // Function to initialize the map (using Google Maps)
    function initMap() {
        // Create a map object with specified options
        const mapOptions = {
            center: { lat: 56.8796, lng: 24.6032 }, // Center of Latvia
            zoom: 7, // Zoom level
        };

        // Create the map instance
        const map = new google.maps.Map(document.getElementById("map"), mapOptions);

        // Optional: Add markers or additional features to the map
        // Example: Adding a marker for Riga
        new google.maps.Marker({
            position: { lat: 56.9496, lng: 24.1052 }, // Riga coordinates
            map: map,
            title: "Riga",
        });
    }

    function updateClock() {
        const now = new Date();
        const options = { hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Europe/Riga' };
        const timeString = now.toLocaleTimeString('en-US', options).replace(':', ' : ');
        document.getElementById('clock').textContent = timeString;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>

<!-- Add Google Maps API -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>

</main>
