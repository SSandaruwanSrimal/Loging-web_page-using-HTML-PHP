<?php
// Connect to the database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'logindb';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$password =$_POST['password'];
$confirm_password = $_POST['confirm-password'];


// Password validation
if (empty($password) || strlen($password) < 8) {
    echo "Password must be at least 8 characters long.";
    exit();
}

if ($password != $confirm_password) {
    echo "Passwords do not match.";
    exit();
}
// Insert the user into the database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful! You can now log in.";
        header('Location: login.html');
        exit();
    } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
//}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Sign Up</h1>
    </header>
    <main>
        <form action="signup.php" method="post">
            <fieldset>
                <legend>Create an Account</legend>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>

                <input type="submit" value="Sign Up">
            </fieldset>
        </form>
        <p>Already a member? <a href="login.php">Log in here</a></p>
    </main>
    <footer>
        <p>Or sign up with:</p>
        <div class="center-block">
        <button>Facebook</button>
        <button style="background-color: #be220d;">Google</button>
        </div>
    </footer>
</body>
</html>
