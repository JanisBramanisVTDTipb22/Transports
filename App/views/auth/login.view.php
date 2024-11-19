<?php require "../App/views/components/head.php"; ?>

<!-- Tailwind CDN (if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Login Page with Image on Left, Form on Right -->
<form method="POST" class="flex h-screen bg-gradient-to-r from-blue-200 via-pink-200 to-yellow-200 animate-gradient-bg">

    <!-- Left Side Image -->
    <div class="w-1/2 bg-cover" style="background-image: url('https://ec.europa.eu/eurostat/documents/29567/19147678/phaisarnwong2517_AdobeStock_336596257_RV.jpg/e57cc2be-a232-d68c-d5c2-20a1f9a83e12?t=1716366406127'); background-position: 0% 50%;">
    <!-- You can replace the above URL with the actual image path -->
    </div>

    <!-- Right Side Form -->
    <div class="w-1/2 flex justify-center items-center bg-white p-8 shadow-lg">
        <div class="w-full sm:w-96">
            <h1 class="text-3xl font-semibold text-black mb-6 text-center">Log-in</h1>

            <!-- Form -->
            <form method="POST" class="space-y-6">
                
                <!-- Username -->
                <label class="block text-black">
                    <span class="block text-lg">Username</span>
                    <input class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg bg-gray-100 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="username" value="<?= $_POST["username"] ?? "" ?>" />
                </label>

                <!-- Password -->
                <label class="block text-black">
                    <span class="block text-lg">Password</span>
                    <div class="relative">
                        <input class="w-full px-4 py-2 mt-2 border border-gray-400 rounded-lg bg-gray-100 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" type="password" name="password" value="<?= $_POST["password"] ?? "" ?>" />
                        <button type="button" class="absolute top-2 right-2 px-4 py-2 text-white bg-black rounded-md" onclick="togglePassword()">Show</button>
                    </div>
                </label>

                <!-- Error Message for Password -->
                <?php if (isset($errors["password"])) { ?>
                    <p class="text-red-500 text-sm mt-2"><?= $errors["password"] ?></p>
                <?php } ?>

                <!-- Submit Button -->
                <button class="w-full px-4 py-2 mt-4 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Submit
                </button>
            </form>

            <!-- Register Link -->
            <div class="text-center mt-4">
                <a href="/register" class="text-blue-500 hover:text-blue-700 text-lg">Don't have an account? Register</a>
            </div>

            <!-- Flash Message -->
            <?php if(isset($_SESSION["flash"])) { ?>
                <p class="text-red-500 text-center mt-4"><?= $_SESSION["flash"] ?></p>
            <?php } ?>
        </div>
    </div>
</form>

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
/* Gradient Animation for Background */
@keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.animate-gradient-bg {
    background-size: 400% 400%;
    animation: gradientAnimation 15s ease infinite;
}

/* Flexbox layout */
form {
    display: flex;
    height: 100vh;
}

/* Left Image Styling */
.w-1/2 {
    width: 50%;
    background-size: cover;
    background-position: center;
}

/* Right Form Styling */
.bg-white {
    background-color: white; /* White background for the form */
}

.text-black {
    color: black; /* Text color for form */
}

/* Focus Ring on Inputs */
.focus\:ring-2:focus {
    outline: 2px solid #3B82F6; /* Blue outline when input is focused */
}

/* Form Input Fields */
input {
    background-color: #F3F4F6; /* Lighter background for inputs */
    border: 1px solid #E5E7EB; /* Light border for inputs */
}

input:focus {
    border-color: #4F46E5; /* Darker border on focus */
}

/* Error Message Styling */
.text-red-500 {
    color: red; /* Red for error messages */
}

/* Button styling */
button {
    background-color: #4F46E5; /* Dark blue for button */
}

button:hover {
    background-color: #3B82F6; /* Lighter blue on hover */
}

/* Register Link Styling */
.text-blue-500 {
    color: #3B82F6; /* Light blue for register link */
}

.text-blue-700:hover {
    color: #2563EB; /* Darker blue on hover */
}

/* Flash Message Styling */
.text-red-500 {
    color: #EF4444; /* Red for flash error message */
}
</style>
