<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F5EEDC;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .nav-bar {
            width: 100%;
            max-width: 800px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .nav-bar .name {
            font-size: 20px;
            font-weight: bold;
            color: #183B4E;
        }

        .nav-bar .home-button {
            background-color: #DDA853;
            color: #fff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .nav-bar .home-button:hover {
            background-color: #c8943d;
        }

        .card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            width: 100%;
        }

        .card h1 {
            font-size: 22px;
            color: #183B4E;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .highlight {
            color: #27548A;
        }

        @media (max-width: 768px) {
            .card {
                padding: 25px;
            }

            .nav-bar {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM booking WHERE EMAIL='$email' ORDER BY BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($name);

    if ($rows == null) {
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    } else {
        $sql2 = "SELECT * FROM users WHERE EMAIL='$email'";
        $name2 = mysqli_query($con, $sql2);
        $rows2 = mysqli_fetch_assoc($name2);

        $car_id = $rows['CAR_ID'];
        $sql3 = "SELECT * FROM cars WHERE CAR_ID='$car_id'";
        $name3 = mysqli_query($con, $sql3);
        $rows3 = mysqli_fetch_assoc($name3);
?>

<!-- Navbar -->
<div class="nav-bar">
    <a href="cardetails.php" class="home-button">Go to Home</a>
    <div class="name">Hello, <?php echo $rows2['FNAME'] . ' ' . $rows2['LNAME']; ?>!</div>
</div>

<!-- Booking Card -->
<div class="card">
    <h1>Car Name: <span class="highlight"><?php echo $rows3['CAR_NAME']; ?></span></h1>
    <h1>No. of Days: <span class="highlight"><?php echo $rows['DURATION']; ?></span></h1>
    <h1>Booking Status: <span class="highlight"><?php echo $rows['BOOK_STATUS']; ?></span></h1>
</div>

<?php } ?>

</body>
</html>
