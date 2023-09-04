<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

if(isset($_POST['products'])){

    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $author = $_POST['author'];
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $genre = $_POST['genre'];
    $genre = filter_var($genre, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);
 
    $BookImg = $_FILES['BookImg']['name'];
    $BookImg = filter_var($BookImg, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['BookImg']['size'];
    $image_tmp_name = $_FILES['BookImg']['tmp_name'];
    $image_folder = 'image/'.$BookImg;
 
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE title = ?");
    $select_products->execute([$title]);

   if($select_products->rowCount() > 0){
      $message[] = 'product name already exist!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `products`(title, author, genre, description, BookImg) VALUES(?,?,?,?,?)");
      $insert_products->execute([$title, $author, $genre, $description, $BookImg]);

      if($insert_products){
         if($image_size > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'new product added!';
         }

      }

   }

};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Shelf</title>
    <link rel="stylesheet" href="add_book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

    <section>

        <nav>

            <div class="logo">
                <img src="image/logo.png">
            </div>

            <ul>
                <li><a href="HomePage.php">Home</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="Request.php">My Request</a></li>
                <li><a href="shared.php">Shared</a></li>
                <li><a href="borrowed.php">Borrowed</a></li>
                <li><a href="login.php">Log Out</a></li>
            </ul>

            <div class="social_icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-heart"></i>
            </div>


        </nav>

        <div class="container" style="background-image: url(image/book1.jpg);">
            <form class="form" action="" method="post" enctype="multipart/form-data">
                <center>
                    <h1>Add your book</h1><br><br>
                    <label for="title">Book Title *</label><br>
                    <input type="text" id="title" name="title" class="box" placeholder="Enter the book title" required><br><br>

                    <label for="author">Author Name *</label><br>
                    <input type="text" id="author" name="author" class="box" placeholder="Enter the author name" required><br><br>

                    <label for="Book Image">Book Image</label><br>
                    <input type="file" id="BookImg" name="BookImg" class="Jags" placeholder="Choose your file" required><br><br>

                    <label for="genre">Genre or Category</label><br>
                    <input type="text" id="genre" name="genre" class="box" placeholder="Enter the genre or category (optional)"><br><br>

                    <label for="description">Book Description or Summary</label><br>
                    <textarea id="description" name="description" class="box" placeholder="Enter the book description or summary (optional)"></textarea><br><br>

                    <button type="submit" class="btn" name="products">Add Book</button>
                </center>
            </form>
        </div>