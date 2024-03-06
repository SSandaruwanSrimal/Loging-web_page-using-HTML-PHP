
<?php
session_start();

include('connection.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $user_email = $_POST["email"];
    $password = $_POST['password'];

    if(!empty($user_email) && !empty($password) && !is_numeric($user_email)){

        //read from database
        $query = "select *from users where email = '$user_email' limit 1";
        
        $result = mysqli_query($conn, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data["password"] === $password){

                    $_SESSION["id"] = $user_data["id"];
                    header("location: index.html");
                    die;
                }
        }
    }

    echo "Wrong usrname or password";
    }
    else{
        echo "Please enter some valid information";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type= "email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember me</label><br>
        <input type="submit" value="Login">
    </form>
    <p>Not a member? <a href="signup.php">Sign up now</a></p>
    <p>Or login with:</p>
    <div class="center-block">
    <button>Facebook</button>
    <button style="background-color: #be220d;">Google</button>
    </div>
</body>
</html>