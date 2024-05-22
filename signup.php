<?php
// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize variables to store form data and error messages
$name = $email = $password = "";
$nameErr = $emailErr = $passwordErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = false;
    } else {
        $name = sanitize_input($_POST["name"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = false;
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $valid = false;
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $valid = false;
    } else {
        $password = sanitize_input($_POST["password"]);
    }

    // If validation is successful, save the data (this is a placeholder for actual database logic)
    if ($valid) {
        // Example: Save data to a file (replace this with database logic)
        $data = "$name, $email, $password\n";
        file_put_contents("users.txt", $data, FILE_APPEND);

        // Redirect to a thank you page
        header("Location: thankyou.html");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Shohor Krishi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1 class="project-name">Shohor Krishi</h1>
        <button class="login-button" onclick="loginWithGoogle()">Login with Google</button>
    </header>
    <nav>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="guides.html">Guides</a>
        <a href="products.html">Products</a>
        <a href="videos.html">Videos</a>
        <a href="community.html">Community</a>
    </nav>
    <main>
        <section class="login-container">
            <h2>Sign Up</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name;?>">
                    <span class="error"><?php echo $nameErr;?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email;?>">
                    <span class="error"><?php echo $emailErr;?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo $password;?>">
                    <span class="error"><?php echo $passwordErr;?></span>
                </div>
                <button type="submit">Sign Up</button>
                <div class="google-login">
                    <h3>Or sign up with</h3>
                    <button onclick="loginWithGoogle()">Google</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Shohor Krishi. All rights reserved.</p>
    </footer>
    <script src="firebase.js"></script>
</body>
</html>
