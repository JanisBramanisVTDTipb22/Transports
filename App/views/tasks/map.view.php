<?php require "../App/views/components/head.php"; ?>

<style>
    /* Overall container for the map view */
    body {
        margin: 0; /* Remove default body margin */
        background-color: #282828; /* Dark background color */
        color: #ffffff; /* Light text color */
        font-family: Arial, sans-serif; /* Consistent font */
        height: 100vh; /* Full viewport height */
        overflow: hidden; /* Prevent scrolling */
    }

    .map-container {
        display: flex;
        flex-direction: column; /* Stack elements vertically */
        align-items: center; /* Center align items */
        justify-content: center; /* Center content */
        padding: 20px; /* Padding around the container */
        height: 100%; /* Full height of the viewport */
        color: #e0e0e0; /* Light text color */
    }

    /* Styling for the back link */
    .back-link {
        margin-bottom: 20px; /* Space below the link */
        color: #1E90FF; /* Link color */
        text-decoration: none; /* No underline */
        font-size: 20px; /* Font size for the link */
        transition: color 0.3s; /* Smooth color transition */
    }

    /* Hover effect for the back link */
    .back-link:hover {
        color: #0AFF0A; /* Change color on hover */
    }

    /* Heading for the map */
    .map-heading {
        font-size: 30px; /* Larger font size for the heading */
        margin-bottom: 20px; /* Space below the heading */
        color: #FFD700; /* Gold color for the heading */
        text-align: center; /* Center align the heading */
    }

    /* Map Container */
    #map {
        width: 100%; /* Full width of the container */
        height: 500px; /* Fixed height for the map */
        margin-bottom: 20px; /* Space below the map */
        /* Removed border and border radius for a cleaner look */
    }

    /* Digital Clock Styling */
    .digital-clock {
        font-size: 25px; /* Font size for the clock */
        color: #00FF00; /* Bright green color */
        background-color: #000; /* Black background color */
        padding: 10px; /* Padding for clock */
        border-radius: 5px; /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 255, 0, 0.5); /* Green glow effect */
        width: 250px; /* Fixed width */
        text-align: center; /* Center the text */
        position: absolute; /* Position the clock */
        top: 20px; /* Position from top */
        right: 20px; /* Position from right */
        z-index: 1000; /* Keep the clock on top */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .map-heading {
            font-size: 24px; /* Smaller font size for mobile */
        }

        .digital-clock {
            font-size: 20px; /* Smaller clock size for mobile */
            width: 200px; /* Smaller width for mobile */
        }
    }
</style>

<div class="map-container">
    <a href="/" class="back-link">Back to Home</a>
    <h2 class="map-heading">Interactive Map of Latvia</h2>

    <!-- Digital Clock -->
    <div class="digital-clock" id="clock"></div>

    <!-- Map Container -->
    <div id="map"></div>
</div>

<!-- Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<script>
    // Initialize and add the map
    function initMap() {
        // Center the map at Riga, Latvia
        var location = { lat: 56.9496, lng: 24.1052 };
        
        // Create the map
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7, // Zoom level
            center: location,
            styles: [ // Custom styles for the map
                {
                    "featureType": "all",
                    "elementType": "geometry",
                    "stylers": [
                        { "visibility": "on" },
                        { "color": "#424242" } // Darker color for land
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        { "color": "#1A237E" } // Dark blue for water
                    ]
                }
            ]
        });

        // Add a marker for Riga
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Riga, Latvia',
            icon: {
                url: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Custom marker icon
            }
        });
    }

    // Function to update the digital clock
    function updateClock() {
        const now = new Date();
        const options = { hour: '2-digit', minute: '2-digit', hour12: false }; // Format: 24-hour
        const timeString = now.toLocaleTimeString('en-RU', options); // Localize to Riga time
        document.getElementById('clock').innerText = timeString;
    }

    // Update the clock every minute
    setInterval(updateClock, 60000); // Update every minute
    updateClock(); // Initial call to display clock immediately
</script>

<?php require "../App/views/components/footer.php"; ?>
