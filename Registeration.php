<?php

include 'config.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $cpassword = md5($_POST['cpassword']);
    $cpassword = filter_var($cpassword, FILTER_SANITIZE_STRING);

    $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select->execute([$email]);

    if ($select->rowCount() > 0) {
        $message[] = 'user email already exist!';
    } else {
        if ($password != $cpassword) {
            $message[] = 'confirm password not matched!';
        } else {
            $insert = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
            $insert->execute([$name, $email, $password]);
            $message[] = 'registered successfully!';
            header('location:login.php');
        }
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
    <link rel="stylesheet" href="Registeration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <li><a href="#Home">Registration Page</a></li>
            </ul>
        </nav>
        <div class="container">
            <form class="form" action="" enctype="multipart/form-data" method="POST">
                <h2>Create your account</h2>
                <label>Name</label>
                <input type="text" name="name" class="box" placeholder="Name" required>
                <label>Gmail</label>
                <input type="text" name="email" class="box" placeholder="Your Email ID" required>
                <label>Password</label>
                <input type="password" name="password" class="box" placeholder="Enter your password" required>
                <label>Confirm Password</label>
                <input type="password" name="cpassword" class="box" placeholder="Re-enter your password" required>
                <input type="submit" value="Create Account" class="btn" name="submit">
                <h4><a href="login.php">I already have an account</a></h4>
            </form>
        </div>