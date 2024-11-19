<?php require "../App/views/components/head.php"; ?>

<!-- Tailwind CDN (if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="flex h-screen">
    <!-- Left side: Register form -->
    <div class="w-1/2 flex justify-center items-center bg-white">
        <main class="p-8 w-full sm:w-96">
            <h1 class="text-3xl font-semibold text-black mb-6 text-center">Register</h1>

            <!-- Registration Form -->
            <form method="POST" class="space-y-6">
                
                <!-- Username -->
                <label class="block text-black">
                    <span class="block text-lg">Username</span>
                    <input class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg bg-gray-100 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" name="username" value="<?= $_POST["username"] ?? "" ?>" />
                </label>
                <?php if (isset($errors["username"])) { ?>
                    <p class="text-red-500 text-sm mt-2"><?= $errors["username"] ?></p>
                <?php } ?>

                <!-- Email -->
                <label class="block text-black">
                    <span class="block text-lg">Email</span>
                    <input class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg bg-gray-100 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" name="email" value="<?= $_POST["email"] ?? "" ?>" />
                </label>
                <?php if (isset($errors["email"])) { ?>
                    <p class="text-red-500 text-sm mt-2"><?= $errors["email"] ?></p>
                <?php } ?>

                <!-- Password -->
                <label class="block text-black">
                    <span class="block text-lg">Password</span>
                    <div class="relative">
                        <input class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg bg-gray-100 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" type="password" name="password" value="<?= $_POST["password"] ?? "" ?>" />
                        <button type="button" class="absolute top-2 right-2 px-4 py-2 text-white bg-black rounded-md" onclick="togglePassword()">Show</button>
                    </div>
                </label>
                <?php if (isset($errors["password"])) { ?>
                    <p class="text-red-500 text-sm mt-2"><?= $errors["password"] ?></p>
                <?php } ?>
                <span class="text-xs text-black">(8 chars: 1 uppercase, 1 number, 1 symbol)</span>

                <!-- Submit Button -->
                <button class="w-full px-4 py-2 mt-4 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Submit
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-4">
                <a href="/login" class="text-blue-500 hover:text-blue-700 text-lg">Already have an account? Log-in</a>
            </div>
        </main>
    </div>

    <!-- Right side: Image -->
    <div class="w-1/2 bg-cover bg-center" style="background-image: url('https://ec.europa.eu/eurostat/documents/29567/19147678/phaisarnwong2517_AdobeStock_336596257_RV.jpg/e57cc2be-a232-d68c-d5c2-20a1f9a83e12?t=1716366406127');">
        <!-- Optional content or leave it empty -->
    </div>
</div>

<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var showButton = document.querySelector(".absolute button");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        showButton.innerHTML = 'Hide'; // Change to "Hide"
    } else {
        passwordField.type = "password";
        showButton.innerHTML = 'Show'; // Change back to "Show"
    }
}
</script>

<?php require "../App/views/components/footer.php"; ?>

<style>
/* Image Section on the Right */
.w-1/2 {
    height: 100vh; /* Full viewport height */
}

/* Ensure there are no unwanted margins, padding or borders */
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
}

main {
    background-color: white; /* Remove any unnecessary borders or padding */
    border-radius: 0px;
    box-shadow: none;
}

/* Optional: You can style the image container or add content as needed */
</style>
