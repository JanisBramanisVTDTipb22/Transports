<?php require "../App/views/components/head.php"; ?>
<?php require "../App/views/components/navbar.php"; ?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="relative bg-gray-800 min-h-screen text-gray-200 flex flex-col items-center justify-center">
    <!-- Main Content -->
    <div class="flex-1 flex flex-col justify-center items-center p-6">
        <p class="text-center text-lg md:text-xl mb-6">
            Navigate through our website to find information on routes, schedules, fares, and interactive maps. Stay updated with real-time information to plan your journey efficiently.
        </p>

        <a href="/logout" class="bg-blue-500 hover:bg-yellow-400 text-white hover:text-black text-center px-6 py-3 rounded transition">
            <span class="block">Stop</span>
            <span class="block">Get Ready</span>
            <span class="block">Go</span>
        </a>
    </div>

    <!-- Animated Road Line -->
    <div class="absolute inset-0 w-2 bg-gradient-to-b from-transparent via-yellow-400 to-transparent mx-auto animate-scroll-line"></div>

</div>

<script>
    function updateClock() {
        const now = new Date();
        const options = { hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Europe/Riga' };
        const timeString = now.toLocaleTimeString('en-US', options).replace(':', ' : ');
        document.getElementById('clock').textContent = timeString;
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
