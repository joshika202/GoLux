<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Bookings</title>
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
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: #27548A;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .logo {
      font-size: 28px;
      font-weight: 700;
      color: #DDA853;
    }

    .menu ul {
      list-style: none;
      display: flex;
      gap: 30px;
    }

    .menu ul li a,
    .menu ul li button {
      text-decoration: none;
      color: #fff;
      font-weight: 600;
      font-size: 14px;
      background: none;
      border: none;
      
      cursor: pointer;
      transition: color 0.3s;
    }

    .menu ul li a:hover,
    .menu ul li button:hover {
      color: #DDA853;
    }

    .container {
      padding: 60px 40px;
    }

    h1 {
      text-align: center;
      margin-bottom: 40px;
      color: #fff;
      font-size: 36px;
      font-weight: 700;
    }

    .content-table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      background-color: #fff;
    }

    .content-table thead {
      background-color: #DDA853;
      color: #183B4E;
      font-size: 16px;
    }

    .content-table th,
    .content-table td {
      padding: 14px 18px;
      text-align: left;
      color:black;
    }

    .content-table tbody tr:nth-child(even) {
      background-color: #f4f4f4;
    }

    .content-table tbody tr:nth-child(odd) {
      background-color: #ffffff;
    }

    .content-table tbody tr:hover {
      background-color: #f0e1c2;
    }

    .btn-action {
      padding: 8px 16px;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      background-color: #C0392B;
      color: white;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .btn-action:hover {
      background-color: #A93226;
    }
  </style>

<?php

require_once('connection.php');
$query="SELECT *from booking ORDER BY BOOK_ID DESC";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>
</head>
<body>
<?php
require_once('connection.php');
$query = "SELECT * FROM booking ORDER BY BOOK_ID DESC";
$queryy = mysqli_query($con, $query);
?>
<div class="navbar">
  <div class="logo">GoLux</div>
  <div class="menu">
    <ul>
      <li><a href="adminvehicle.php">Vehicle Management</a></li>
      <li><a href="adminusers.php">Users</a></li>
      <li><a href="admindash.php">Feedbacks</a></li>
      <li><a href="adminbook.php">Booking Request</a></li>
      <li><button onclick="window.location.href='index.php'">Logout</button></li>
    </ul>
  </div>
</div>
<div class="container">
  <h1>Cars</h1>
  <table class="content-table">
    <thead>
      <tr>
        <th>CAR ID</th>
        <th>EMAIL</th>
        <th>BOOK PLACE</th>
        <th>BOOK DATE</th>
        <th>DURATION</th>
        <th>PHONE NUMBER</th>
        <th>DESTINATION</th>
        <th>RETURN DATE</th>
        <th>BOOKING STATUS</th>
        <th>APPROVE</th>
        <th>CAR RETURNED</th>
      </tr>
    </thead>
    <tbody>
      <?php while($res = mysqli_fetch_array($queryy)) { ?>
      <tr>
        <td><?php echo $res['CAR_ID']; ?></td>
        <td><?php echo $res['EMAIL']; ?></td>
        <td><?php echo $res['BOOK_PLACE']; ?></td>
        <td><?php echo $res['BOOK_DATE']; ?></td>
        <td><?php echo $res['DURATION']; ?></td>
        <td><?php echo $res['PHONE_NUMBER']; ?></td>
        <td><?php echo $res['DESTINATION']; ?></td>
        <td><?php echo $res['RETURN_DATE']; ?></td>
        <td><?php echo $res['BOOK_STATUS']; ?></td>
        <td><a class="btn-action" href="approve.php?id=<?php echo $res['BOOK_ID']; ?>">Approve</a></td>
        <td><a class="btn-action" href="adminreturn.php?id=<?php echo $res['CAR_ID']; ?>&bookid=<?php echo $res['BOOK_ID']; ?>">Returned</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
