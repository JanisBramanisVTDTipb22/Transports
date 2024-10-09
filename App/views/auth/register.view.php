<?php require "../App/views/components/head.php"; ?>
<link rel="stylesheet" href="register.css">

<div class="center">
    <main class="auth-main-reg">
        <div class="auth-div">
            <h1 class="auth-h1" style="color: #000000;">Register</h1> <!-- Changed to black -->
            <form method="POST" class="auth-form">
                <label class="auth-label" style="color: black;"> <!-- Changed to black -->
                    Username
                    <input class="auth-input" name="username" value="<?= $_POST["username"] ?? "" ?>"/>
                </label>
                <?php if (isset($errors["username"])) { ?>
                    <p class="invalid-data"> <?= $errors["username"] ?> </p>
                <?php } ?>
                
                <label class="auth-label" style="color: black;"> <!-- Changed to black -->
                    Email
                    <input class="auth-input" type="email" name="email" value="<?= $_POST["email"] ?? "" ?>"/>
                </label>
                <?php if (isset($errors["email"])) { ?>
                    <p class="invalid-data"> <?= $errors["email"] ?> </p>
                <?php } ?>
                
                <label class="auth-label" style="color: black;"> <!-- Changed to black -->
                    Password
                    <br>
                    <div class="password-container">
                        <input class="auth-input" id="password" type="password" name="password" value="<?= $_POST["password"] ?? "" ?>" />
                        <button type="button" class="show-btn" onclick="togglePassword()">
                            <span class="show-text">Show</span>
                        </button>
                    </div>
                </label>
                <?php if (isset($errors["password"])) { ?>
                    <p class="invalid-data"> <?= $errors["password"] ?> </p>
                <?php } ?>
                <span style="font-size: 12px; color: black;">(8 chars: 1 uppercase, 1 number, 1 symbol)</span> <!-- Changed to black -->
                <button class="auth-button">
                    <span class="submit-text">Submit</span>
                </button>
            </form>
            <a href="/login" class="register-link">Log-in</a>
        </div>
    </main>
</div>

<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var showButton = document.querySelector(".show-btn");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        showButton.innerHTML = '<span class="show-text">Hide</span>'; // Change to "Hide"
    } else {
        passwordField.type = "password";
        showButton.innerHTML = '<span class="show-text">Show</span>'; // Change back to "Show"
    }
}
</script>

<?php require "../App/views/components/footer.php"; ?>

<style>
body {
    background-color: #000000; /* Black background */
}

.auth-main-reg {
    display: flex;
    justify-content: center; /* Center the form horizontally */
    align-items: center; /* Center the form vertically */
    height: 100vh; /* Full viewport height */
}

.auth-div {
    background-color: #ffffff; /* White background for the login box */
    border-radius: 10px; /* Rounded corners for the login box */
    padding: 20px; /* Reduced padding for compactness */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Slight shadow for depth */
}

.auth-label {
    display: block;
    margin-bottom: 5px; /* Reduced space between labels */
}

.auth-input {
    width: 100%; /* Full width input fields */
    padding: 8px; /* Slightly reduced padding for compactness */
    border: 2px solid #000; /* Black border */
    border-radius: 5px; /* Slightly rounded corners */
    margin-bottom: 15px; /* Space below input fields */
    background-color: #f5f5f5; /* Light gray background for input fields */
}

.password-container {
    display: flex;
    align-items: center;
}

.show-btn {
    background-color: #000; /* Black background for show button */
    border: none;
    color: white; /* White text */
    padding: 8px; /* Slightly reduced padding */
    cursor: pointer;
    border-radius: 5px; /* Slightly rounded corners */
    margin-left: 5px; /* Less margin for compactness */
    transition: color 1.5s; /* Transition for text color */
}

.show-btn:hover .show-text {
    color: red; /* Red text on hover */
    animation: colorChange 1.5s infinite; /* Animation for color change */
}

/* Button styles with red-green text effect */
.auth-button {
    background-color: #000; /* Black background for submit button */
    border: none;
    padding: 10px 20px; /* More square-like button */
    cursor: pointer;
    border-radius: 5px; /* Slightly rounded corners */
    margin-top: 10px; /* Space above the button */
    width: 100%; /* Full width for button */
    position: relative; /* For positioning */
}

.submit-text {
    display: inline-block; /* Make the text inline-block */
    color: white; /* Initially white */
    transition: color 1.5s; /* Slower transition for text color */
}

.auth-button:hover .submit-text {
    color: red; /* Red on hover */
    animation: colorChange 1.5s infinite; /* Animation for color change */
}

/* Color change animation for the buttons */
@keyframes colorChange {
    0% { color: red; }
    50% { color: yellow; }
    100% { color: green; }
}

.register-link {
    color: black; /* Black for the register link */
    text-decoration: none; /* No underline */
    display: block; /* Block display for better spacing */
    margin-top: 10px; /* Space above the register link */
    text-align: center; /* Center the text */
}

.register-link:hover {
    color: gray; /* Gray color on hover for the register link */
}

.invalid-data {
    color: red; /* Red for error messages */
}
</style>
