<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator - Users</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #183B4E;
      color: #ffffff;
      min-height: 100vh;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 60px;
      background-color: #27548A;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .logo {
      font-size: 28px;
      color: #DDA853;
      font-weight: 700;
    }

    .menu ul {
      list-style: none;
      display: flex;
      gap: 30px;
    }

    .menu ul li a,
    .menu ul li button a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      padding: 8px 16px;
      transition: background 0.3s;
      border-radius: 6px;
    }

    .menu ul li a:hover,
    .menu ul li button a:hover {
      background-color: #DDA853;
      color: #183B4E;
    }

    .menu ul li button {
      background: none;
      border: none;
    }

    .header {
      text-align: center;
      margin-top: 40px;
      font-size: 32px;
      color: #ffffff;
      font-weight: bold;
    }

    .content-table {
      margin: 40px auto;
      width: 95%;
      max-width: 1200px;
      border-collapse: collapse;
      background-color: #ffffff;
      color: #333;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .content-table thead {
      background-color: #DDA853;
      color: #183B4E;
    }

    .content-table th, .content-table td {
      padding: 16px;
      text-align: left;
    }

    .content-table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .content-table tbody tr:hover {
      background-color: #ddd;
    }

    .delete-btn a {
      color: #fff;
      background-color: #C0392B;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s;
    }

    .delete-btn a:hover {
      background-color: #A93226;
    }
  </style>
</head>
<body>
<?php
require_once('connection.php');
$query = "SELECT * FROM users";
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
      <li><button><a href="index.php">Logout</a></button></li>
    </ul>
  </div>
</div>

<h1 class="header">Users</h1>

<table class="content-table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>License Number</th>
      <th>Phone Number</th>
      <th>Gender</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($res = mysqli_fetch_array($queryy)) { ?>
    <tr>
      <td><?php echo $res['FNAME'] . ' ' . $res['LNAME']; ?></td>
      <td><?php echo $res['EMAIL']; ?></td>
      <td><?php echo $res['LIC_NUM']; ?></td>
      <td><?php echo $res['PHONE_NUMBER']; ?></td>
      <td><?php echo $res['GENDER']; ?></td>
      <td class="delete-btn"><a href="deleteuser.php?id=<?php echo $res['EMAIL']; ?>">Delete User</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</body>
</html>


<!-- HTML Structure: The page structure includes a navigation bar and a main content area with a table displaying user details.
CSS Styling: Inline CSS is used to style the elements, including the navigation bar, table, and buttons.
PHP Integration: PHP is used to fetch user data from the database and dynamically populate the table with user details.
 It also includes a delete button for each user, linking to a separate script (deleteuser.php) to handle user deletion.
Interactivity: JavaScript could be added to enhance interactivity, such as confirming user deletions.
This code provides a functional admin dashboard for managing users in a car rental system, allowing the admin to view user details and delete users as needed.




 -->