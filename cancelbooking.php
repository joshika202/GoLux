<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cancel Booking</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(to right, #183B4E, #27548A);
      color: #fff;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    .cancel-container {
      background-color: #fff;
      color: #183B4E;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      max-width: 600px;
      width: 100%;
    }

    h1 {
      font-size: 28px;
      margin-bottom: 30px;
    }

    .btn-group {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 20px;
    }

    .btn {
      width: 200px;
      height: 45px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .cancel-btn {
      background-color: #C0392B;
      color: #fff;
    }

    .cancel-btn:hover {
      background-color: #A93226;
    }

    .payment-btn {
      background-color: #DDA853;
      color: #183B4E;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .payment-btn:hover {
      background-color: #c99b3a;
    }
  </style>
</head>
<body>
<?php
require_once('connection.php');
session_start();
$bid = $_SESSION['bid'];
if (isset($_POST['cancelnow'])) {
    $del = mysqli_query($con, "DELETE FROM booking WHERE BOOK_ID = '$bid' ORDER BY BOOK_ID DESC LIMIT 1");
    echo "<script>window.location.href='cardetails.php';</script>";
}
?>

<form class="cancel-container" method="POST">
  <h1>Are you sure you want to cancel your booking?</h1>
  <div class="btn-group">
    <input type="submit" class="btn cancel-btn" value="Cancel Now" name="cancelnow">
    <a href="payment.php" class="btn payment-btn">Go to Payment</a>
  </div>
</form>
</body>
</html>