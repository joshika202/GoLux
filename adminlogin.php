
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
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
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      background: #fff;
      border-radius: 16px;
      padding: 40px;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .form-container h2 {
      color: #183B4E;
      margin-bottom: 24px;
      text-align: center;
      font-weight: 700;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #DDA853;
      color: #183B4E;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #b4883e;
    }

    .back-button {
      margin-top: 20px;
      text-align: center;
    }

    .back-button a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #27548A;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      transition: background-color 0.3s;
      font-weight: 600;
    }

    .back-button a:hover {
      background-color: #183B4E;
    }

    .greeting {
      margin-bottom: 40px;
      text-align: center;
    }

    .greeting h1 {
      font-size: 36px;
      color: #fff;
      font-weight: 700;
    }
  </style>
  <script type="text/javascript">
    function preventBack() {
      window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function () { null };
  </script>
</head>
<body>

<?php
require_once('connection.php');
if (isset($_POST['adlog'])) {
  $id = $_POST['adid'];
  $pass = $_POST['adpass'];

  if (empty($id) || empty($pass)) {
    echo '<script>alert("Please fill in all fields")</script>';
  } else {
    $query = "SELECT * FROM admin WHERE ADMIN_ID='$id'";
    $res = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($res)) {
      $db_password = $row['ADMIN_PASSWORD'];
      if ($pass == $db_password) {
        echo '<script>alert("Welcome ADMINISTRATOR!");</script>';
        header("location: admindash.php");
      } else {
        echo '<script>alert("Incorrect password")</script>';
      }
    } else {
      echo '<script>alert("Admin ID not found")</script>';
    }
  }
}
?>

<div class="greeting">
  <h1>Hello Admin!</h1>
</div>

<div class="form-container">
  <form method="POST">
    <h2>Admin Login</h2>
    <input type="text" name="adid" placeholder="Enter admin user ID">
    <input type="password" name="adpass" placeholder="Enter admin password">
    <input type="submit" name="adlog" value="LOGIN">
  </form>
</div>

<div class="back-button">
  <a href="index.php">Go To Home</a>
</div>

</body>
</html>

<!-- 
JavaScript: Prevents the user from navigating back using browser history.
CSS Styling: Provides a visually appealing layout with a background image and styled form.
PHP: Handles form submission, validates input, checks credentials against the database, and redirects on successful login.
HTML Form: Allows admins to enter their credentials and log in.
The overall functionality ensures that only admins with valid credentials can access the admin dashboard,
 and it provides basic security measures like input validation and feedback via alerts. -->


