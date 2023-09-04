<?php
@include 'config.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Shelf</title>
    <link rel="stylesheet" href="style.css">
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

        <div class="main">

            <div class="main_tag">
                <h1>WELCOME TO<br><span>BOOK SHELF</span></h1>

                <p>
                    your one-stop destination for buying and renting books. With our vast collection of titles, you can explore new stories or revisit old favorites. Happy reading!
                </p>
                <a href="add_book.php" class="main_btn">Share your reads</a>

            </div>

            <div class="main_img">
                <img src="image/table.png">
            </div>

        </div>
    </section>
    <section class="lend">
        <h1>Rent a Book</h1>
        <div class="box-container">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" class="box" method="POST">
               <img src="image/<?= $fetch_products['BookImg']; ?>" alt="">
                  <div class="name"><?= $fetch_products['title']; ?></div>
                  <input type="hidden" name="title" value="<?= $fetch_products['title']; ?>">
                  <input type="hidden" name="author" value="<?= $fetch_products['author']; ?>">
                  <input type="hidden" name="description" value="<?= $fetch_products['description']; ?>">
                  <input type="hidden" name="genre" value="<?= $fetch_products['genre']; ?>">
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">No Books Added Yet!</p>';
         }
         ?>
    </section>
</body>

</html>