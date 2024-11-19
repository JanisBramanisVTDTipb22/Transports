<?php 
$title = "Interactive Map of Latvia"; 
require "../App/views/components/head.php"; 
?>

<?php require "../App/views/components/navbar.php"; ?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="relative bg-gray-800 min-h-screen text-gray-200 flex flex-col items-center justify-center">
    <!-- Back to Home Link -->
    <a href="/" class="absolute top-4 left-4 text-blue-400 hover:text-yellow-400 transition text-lg">
        ← Back to Home
    </a>

    <!-- Heading -->
    <h2 class="text-3xl md:text-4xl font-semibold text-yellow-400 mb-6 text-center">
        <?= $title ?> <!-- Dynamic Title -->
    </h2>

    <!-- Digital Clock -->
    <div id="clock" 
        class="absolute top-4 right-4 bg-gray-700 text-yellow-400 text-lg md:text-xl font-mono py-2 px-4 rounded shadow-lg ring-2 ring-yellow-400 animate-pulse">
    </div>

    <!-- Map Container -->
    <div id="map" 
        class="w-full max-w-5xl h-[500px] rounded shadow-lg border border-gray-600 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-700 z-10">
    </div>

    <!-- Animated Road Line -->
    <div class="absolute inset-0 w-2 bg-gradient-to-b from-transparent via-yellow-400 to-transparent mx-auto animate-scroll-line z-0"></div>
</div>

<!-- Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY52MMdRsBTUQXMV8fK5YSqZJZrd3LNSQ&callback=initMap" async defer></script>

<script>
    // Initialize and add the map
    function initMap() {
        // Set center location (Riga, Latvia)
        const latviaCenter = { lat: 56.9496, lng: 24.1052 };

        // Create the map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: latviaCenter,
            styles: [ // Custom dark theme for the map
                {
                    "featureType": "all",
                    "elementType": "geometry",
                    "stylers": [
                        { "visibility": "on" },
                        { "color": "#1b1b1b" }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        { "color": "#3333aa" }
                    ]
                }
            ]
        });

        // Add marker for Riga
        const rigaMarker = new google.maps.Marker({
            position: latviaCenter,
            map: map,
            title: "Riga, Latvia",
            icon: {
                url: "https://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
            }
        });

        // Marker click event
        rigaMarker.addListener("click", () => {
            const infoWindow = new google.maps.InfoWindow({
                content: "<h3 class='text-yellow-400'>Riga, Latvia</h3><p class='text-gray-300'>The capital city of Latvia.</p>",
            });
            infoWindow.open(map, rigaMarker);
        });
    }

    // Function to update the digital clock
    function updateClock() {
        const now = new Date();
        const options = { 
            timeZone: "Europe/Riga", 
            hour: "2-digit", 
            minute: "2-digit",  
            hour12: false 
        };
        const timeString = now.toLocaleTimeString("en-GB", options).replace(":", " : ");
        document.getElementById("clock").textContent = timeString;
    }

    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock();
</script>

<style>
    @keyframes scroll-line {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: 0 100%;
        }
    }

    .animate-scroll-line {
        background-size: 10px 100px;
        animation: scroll-line 2s linear infinite;
        opacity: 0.8;
    }
</style>

<?php require "../App/views/components/footer.php"; ?>
