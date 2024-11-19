<?php 
// Ensure $title is defined
$title = $title ?? "Profile";  // Fallback if $title is not set

require "../App/views/components/head.php"; 
?>
<title><?= htmlspecialchars($title) ?></title> <!-- Dynamically set the page title -->


<?php require "../App/views/components/navbar.php"; ?>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    @keyframes backgroundMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<body class="bg-gradient-to-r from-blue-800 via-gray-900 to-blue-800 bg-[300%_100%] animate-[backgroundMove_10s_ease_infinite] min-h-screen flex items-center justify-center text-gray-300 font-sans">
    <main class="w-full max-w-md px-6 mt-14">
        <div class="bg-gray-900 rounded-lg shadow-lg p-8 text-center">
            <h1 class="text-2xl font-semibold text-blue-400 mb-4">
                Hello, <?= htmlspecialchars($_SESSION["username"]) ?>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                    <span class="text-sm text-blue-300">(Admin)</span>
                <?php endif; ?>
            </h1>

            <!-- Update Username Form -->
            <div class="mb-6">
                <form method="POST" class="space-y-4">
                    <div class="flex flex-col">
                        <label class="text-left text-sm font-medium mb-1">New Username:</label>
                        <input 
                            type="text" 
                            name="new_username" 
                            value="<?= $_POST["new_username"] ?? "" ?>" 
                            class="rounded-md border-gray-700 bg-gray-800 text-white px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required 
                        />
                        <?php if (isset($errors["new_username"])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors["new_username"] ?></p>
                        <?php endif; ?>
                    </div>
                    <button 
                        type="submit" 
                        name="update_username" 
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
                        onclick="return confirm('Are you sure you want to change your username?');"
                    >
                        Update Username
                    </button>
                </form>
            </div>

            <!-- Update Email Form -->
            <div class="mb-6">
                <form method="POST" class="space-y-4">
                    <div class="flex flex-col">
                        <label class="text-left text-sm font-medium mb-1">New Email:</label>
                        <input 
                            type="email" 
                            name="new_email" 
                            value="<?= $_POST["new_email"] ?? "" ?>" 
                            class="rounded-md border-gray-700 bg-gray-800 text-white px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required 
                        />
                        <?php if (isset($errors["new_email"])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors["new_email"] ?></p>
                        <?php endif; ?>
                    </div>
                    <button 
                        type="submit" 
                        name="update_email" 
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
                        onclick="return confirm('Are you sure you want to change your email address?');"
                    >
                        Update Email
                    </button>
                </form>
            </div>

            <!-- Update Password Form -->
            <div class="mb-6">
                <form method="POST" class="space-y-4">
                    <div class="flex flex-col">
                        <label class="text-left text-sm font-medium mb-1">New Password:</label>
                        <input 
                            type="password" 
                            name="new_password" 
                            class="rounded-md border-gray-700 bg-gray-800 text-white px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required 
                        />
                        <?php if (isset($errors["new_password"])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors["new_password"] ?></p>
                        <?php endif; ?>
                    </div>
                    <button 
                        type="submit" 
                        name="update_password" 
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
                        onclick="return confirm('Are you sure you want to change your password?');"
                    >
                        Update Password
                    </button>
                </form>
            </div>

        </div>
    </main>
</body>
