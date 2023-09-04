<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Online Book Shelf</title>
  <link rel="stylesheet" type="text/css" href="Request.css">
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
  </section>
  <div id="jagan">

    <section class="product"><br><br><br><br><br><br>
      <h2 class="head">Approve Requests</h2><br>
      <div class="box-container">
        <form class="box">
          <img src="image/Atomic_Habits.png" alt="Request">
          <h2>
            <center>Book title</center>
          </h2>
          <h4>Borrower name:</h4>
          <button class="approve-btn">Approve</button>
          <button class="reject-btn">Reject</button>
        </form>

      </div>
      <center>
        <p>Join our book rental </p><a href="">chatroom now </a>
        <p>and connect with others to share your love of books!</p>
      </center>
      <!-- repeat the  div for each pending request -->
    </section><br><br><br>

    <section class="product">
      <h2 class="head">Your Requests</h2><br>
      <div class="request-box-container">
        <form class="request-box">
          <h2>Book Title</h2><br>
          <h4>Lender's Name: ---</h4><br>
          <h4>Lender location: ---</h4><br>
          <h4>Status: Pending</h4>
        </form>
      </div>
      <!-- repeat the  div for each requested book -->
    </section><br><br><br>

    <!--<section id="add-request">
      <h2>Add Request</h2>
      <form>
        <label for="book-title">Book Title:</label>
        <input type="text" id="book-title" name="book-title"><br>

        <label for="book-author">Author:</label>
        <input type="text" id="book-author" name="book-author"><br>

        <label for="lender-name">Lender's Name:</label>
        <input type="text" id="lender-name" name="lender-name"><br>

        <input type="submit" value="Submit">
      </form>
    </section>-->

    <footer>
      <p>&copy; 2023 Online BookShelf. All rights reserved.</p>
      <nav>
        <ul>
          <li><a href="#terms">Terms of Service</a></li>
          <li><a href="#privacy">Privacy Policy</a></li>
        </ul>
      </nav>
    </footer>
  </div>
</body>

</html>