<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email, $password]);
    $rowCount = $stmt->rowCount();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rowCount > 0) {
        if ($row['user_type'] == 'user') {
            $_SESSION['user_id'] = $row['id'];
            header('location:HomePage.php');
        } else {
            $message[] = 'no user found!';
        }
    } else {
        $message[] = 'incorrect email or password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Website</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
        }
    }

    ?>

    <section>

        <nav>

            <div class="logo">
                <img src="image/logo.png" alt="Book Shelf">
            </div>

            <ul>
                <li><a href="#Home">Login Page</a></li>
            </ul>
        </nav>
        <div class="container">
            <form class="form" action="" method="POST">
                <h2>Sign In</h2>
                <span>Username</span>
                <input type="text" name="email" class="box" placeholder="Enter your email">
                <span>Password</span>
                <input type="password" name="password" class="box" placeholder="Enter your password">
                <div class="checkbox">
                    <input type="checkbox" name="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <input type="submit" value="Sign In" class="btn" name="submit">
                <h4>Don't have a account ?<a href="Registeration.php">Sign Up</a></h4>
            </form>
        </div>