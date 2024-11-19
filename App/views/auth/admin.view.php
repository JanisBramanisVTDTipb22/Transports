<?php require 'components/head.php'; ?>
<?php require 'components/navbar.php'; ?>

<main class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-blue-100 to-gray-100">
    <div class="admin-container bg-white rounded-lg shadow-lg p-8 max-w-2xl w-full">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

        <!-- Welcome message -->
        <p class="mb-4">Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</p>

        <!-- Display success message if set -->
        <?php if (isset($_SESSION["flash"])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <strong>Success!</strong> <?= htmlspecialchars($_SESSION["flash"]) ?>
            </div>
            <?php unset($_SESSION["flash"]); // Clear the message after displaying ?>
        <?php endif; ?>

        <!-- User Management Section -->
        <section class="user-management mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">User Management</h2>
            <div class="flex justify-between mb-4">
                <form action="" method="POST" class="flex w-full"> <!-- Action set to empty string to submit to the current page -->
                    <div class="mr-2 flex-grow">
                        <label for="username" class="block text-gray-600">Username:</label>
                        <input type="text" name="username" required class="border border-gray-300 rounded px-2 py-1 w-full">
                    </div>
                    <div class="mr-2 flex-grow">
                        <label for="password" class="block text-gray-600">Password:</label>
                        <input type="password" name="password" required class="border border-gray-300 rounded px-2 py-1 w-full">
                    </div>
                    <div class="mr-2 flex-grow">
                        <label for="confirm_password" class="block text-gray-600">Confirm Password:</label>
                        <input type="password" name="confirm_password" required class="border border-gray-300 rounded px-2 py-1 w-full">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white rounded px-4 py-1">Register</button>
                </form>
            </div>
            <!-- Display error messages if any -->
            <?php if (!empty($errors)): ?>
                <div class="text-red-600 mb-4">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- List of users -->
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Existing Users:</h3>
            <ul class="list-disc pl-5">
                <?php
                // Fetch users from the database
                $users = $db->query("SELECT id, username, role FROM users")->fetchAll();
                foreach ($users as $user): ?>
                    <li>
                        <?= htmlspecialchars($user['username']) ?> - Role: <?= htmlspecialchars($user['role']) ?>
                        <?php if ($user['role'] === 'user'): ?>
                            <form action="" method="POST" class="inline">
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <button type="submit" name="make_teacher" class="text-blue-500 hover:text-blue-700 ml-2">Make Teacher</button>
                            </form>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- Class Management Section -->
        <section class="class-management mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Class Management</h2>
            <form action="/create" method="POST" class="flex items-center mb-4">
                <label for="class_name" class="block text-gray-600 mr-2">Create New Class:</label>
                <input type="text" name="name" required class="border border-gray-300 rounded px-2 py-1 flex-grow" placeholder="Class Name">
                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-1 ml-2">Create Class</button>
            </form>

            <!-- List of existing classes -->
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Existing Classes:</h3>
            <ul class="list-disc pl-5">
                <?php
                // Fetching classes for the admin; this should ideally fetch all classes
                $classes = $db->query("SELECT name FROM classes")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($classes as $class): ?>
                    <li><?= htmlspecialchars($class['name']) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
</main>

<?php require 'components/footer.php'; ?>