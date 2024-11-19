<?php
// Set the default title for the page
$title = "Public Transport - Routes";
require "../App/views/components/head.php"; 
?>

<?php require "../App/views/components/navbar.php"; ?>
<script src="https://cdn.tailwindcss.com"></script>
<main class="min-h-screen bg-gray-800 text-gray-200 pt-20">
    <div class="content p-6">
        <!-- Train Routes Section -->
        <div class="route-section mb-8">
            <h2 class="text-blue-500 text-3xl mb-4">Train Routes in Latvia</h2>
            <p class="mb-4">Explore the train routes that connect major cities and regions in Latvia.</p>
            <ul class="list-disc pl-6">
                <li>Riga to Daugavpils</li>
                <li>Riga to Liepaja</li>
                <li>Riga to Rēzekne</li>
                <li>Daugavpils to Rēzekne</li>
                <li>Liepaja to Ventspils</li>
            </ul>
        </div>

        <!-- Bus Routes Section -->
        <div class="route-section mb-8">
            <h2 class="text-blue-500 text-3xl mb-4">Bus Routes in Latvia</h2>
            <p class="mb-4">Discover the bus routes that serve urban and rural areas across the country.</p>
            <ul class="list-disc pl-6">
                <li>Riga to Jurmala</li>
                <li>Riga to Sigulda</li>
                <li>Daugavpils to Rēzekne</li>
                <li>Liepaja to Ventspils</li>
                <li>Riga to Cesis</li>
            </ul>
        </div>

        <!-- Map Section -->
        <div class="route-section mb-8">
            <h2 class="text-blue-500 text-3xl mb-4">Map of Routes</h2>
            <div id="map" class="w-full h-96 rounded-lg mt-4"></div>
        </div>
    </div>

    <!-- Optional Road Line Animation -->
</main>

<script>
    // Function to initialize the map (using Google Maps)
    function initMap() {
        const mapOptions = {
            center: { lat: 56.8796, lng: 24.6032 }, // Center of Latvia
            zoom: 7,
        };
        const map = new google.maps.Map(document.getElementById("map"), mapOptions);

        // Train Stations (Example)
        const trainStations = [
            { name: "Riga Central Station", lat: 56.946, lng: 24.1056 },
            { name: "Daugavpils Station", lat: 55.875, lng: 26.5316 },
            { name: "Liepaja Station", lat: 56.5204, lng: 21.0111 },
            { name: "Jurmala Station", lat: 56.9654, lng: 23.8181 }
        ];

        // Bus Stations (Example)
        const busStations = [
            { name: "Riga Bus Station", lat: 56.9465, lng: 24.1116 },
            { name: "Sigulda Bus Station", lat: 57.1541, lng: 24.8504 },
            { name: "Daugavpils Bus Station", lat: 55.876, lng: 26.533 },
            { name: "Ventspils Bus Station", lat: 57.387, lng: 21.5635 }
        ];

        // Add Train Station Markers
        trainStations.forEach(station => {
            const marker = new google.maps.Marker({
                position: { lat: station.lat, lng: station.lng },
                map: map,
                title: station.name,
                icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'
            });
            const infoWindow = new google.maps.InfoWindow({
                content: `<h3 class="text-blue-500">${station.name}</h3><p>Train Station</p>`
            });
            marker.addListener("click", function() {
                infoWindow.open(map, marker);
            });
        });

        // Add Bus Station Markers
        busStations.forEach(station => {
            const marker = new google.maps.Marker({
                position: { lat: station.lat, lng: station.lng },
                map: map,
                title: station.name,
                icon: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png'
            });
            const infoWindow = new google.maps.InfoWindow({
                content: `<h3 class="text-green-500">${station.name}</h3><p>Bus Station</p>`
            });
            marker.addListener("click", function() {
                infoWindow.open(map, marker);
            });
        });
    }

    // Update clock (hours and minutes only)
    function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, "0");
        const minutes = now.getMinutes().toString().padStart(2, "0");

        document.getElementById('clock').textContent = `${hours}:${minutes}`;
    }

    setInterval(updateClock, 60000); // Update every minute
    updateClock();
</script>

<!-- Google Maps API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY52MMdRsBTUQXMV8fK5YSqZJZrd3LNSQ&callback=initMap"></script>

</body>
</html>
