<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Shelf</title>
    <link rel="stylesheet" href="Chatroom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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
        <div class="Container">
            <form class="form">
                <h1>Chatroom</h1>
                <form class="inner_form">
                    <input type="text" name="Interaction" class="box" placeholder="Enter your queries" id="Message">
                </form>
            </form>
        </div>
</body>

</html>