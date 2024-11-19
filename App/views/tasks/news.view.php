<?php 
// Set a title for the page
$title = "Latest Transport News";
require "../App/views/components/head.php"; 
?>

<title><?= htmlspecialchars($title) ?></title>

<?php require "../App/views/components/navbar.php"; ?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold text-center text-blue-600 mb-8"><?= $title ?></h1> <!-- Display the title here as well -->
    
    <!-- News Articles Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        // Real Transport Articles
        $news_articles = [
            [
                "title" => "Electric Bus Fleet Expands in London",
                "description" => "London is set to expand its electric bus fleet as part of efforts to reduce carbon emissions. The new electric buses will serve several major routes in the city, aiming to make public transport more sustainable.",
                "image" => "https://images.squarespace-cdn.com/content/6442a2e2ad47043e38d8d696/1705664502081-P0ATVL42O0FWJRK7XM4Z/Hero-London-Bus-2.jpg?format=1500w&content-type=image%2Fjpeg",
                "date" => "2024-10-24",
                "link" => "https://assetfinanceconnect.com/transport-uk-london-bus-expands-electric-fleet/"
            ],
            [
                "title" => "Paris Rolls Out Autonomous Shuttle Buses",
                "description" => "Paris has introduced autonomous shuttle buses in certain districts, designed to complement the city’s existing public transport system. These self-driving buses will help ease congestion and improve mobility.",
                "image" => "https://images.unsplash.com/photo-1626881580491-e96b9ad5a6d0?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OXwwfDF8c2VhcmNofDN8fGF1dG9ub21vdXNoaW5lY2l8ZW58MHx8fHwxNjYyMzc0Mjgw&ixlib=rb-1.2.1&q=80&w=400",
                "date" => "2024-11-09",
                "link" => "/news/paris-autonomous-buses"
            ],
            [
                "title" => "Singapore to Introduce Electric Car Sharing Service",
                "description" => "Singapore is set to introduce a new electric car-sharing service, which will allow citizens to rent electric vehicles on a short-term basis. The initiative aims to reduce private car ownership and promote greener alternatives.",
                "image" => "https://images.unsplash.com/photo-1632168309740-70adf7a8fe8a?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OXwwfDF8c2VhcmNofDV8fGVsZWN0cmljfGVufDB8fHx8&ixlib=rb-1.2.1&q=80&w=400",
                "date" => "2024-11-05",
                "link" => "/news/singapore-electric-car-sharing"
            ],
            [
                "title" => "More Bus and Bike Lanes for a Safer, Greener City",
                "description" => "New York City has announced plans to add thousands of new bus and bike lanes as part of its commitment to creating a safer and greener city. The new lanes will help improve public transit and make the city more accessible for cyclists and pedestrians.",
                "image" => "https://advocate.nyc.gov/sites/default/files/styles/article_image/public/2023-10/IMG_0045.jpg?itok=-pjt2dU8",
                "date" => "2024-11-10",
                "link" => "https://advocate.nyc.gov/blog/more-bus-and-bike-lanes-for-a-safer-greener-city"
            ]
        ];

        // Loop through each article and display it dynamically
        foreach ($news_articles as $article) {
        ?>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="<?= $article['image'] ?>" alt="News Image">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2"><?= $article['title'] ?></h2>
                    <p class="text-gray-600 mb-4"><?= substr($article['description'], 0, 120) ?>...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500 text-sm"><?= date("F j, Y", strtotime($article['date'])) ?></span>
                        <a href="<?= $article['link'] ?>" class="text-blue-500 hover:text-blue-700 text-sm">Read more</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    // Optional: Add dynamic JS functionality like infinite scrolling or loading more news
</script>

<?php require "../App/views/components/footer.php"; ?>

<style>
    /* Animated Gradient Background */
    body {
        background: linear-gradient(90deg, #4caf50, #2196f3, #ff9800, #e91e63);
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
    }

    @keyframes gradientAnimation {
        0% { background-position: 0% 50%; }
        25% { background-position: 50% 50%; }
        50% { background-position: 100% 50%; }
        75% { background-position: 50% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Optional: Add custom styles for pagination */
    .pagination a {
        transition: background-color 0.3s;
    }

    .pagination a:hover {
        background-color: #1E90FF;
        color: white;
    }
</style>
