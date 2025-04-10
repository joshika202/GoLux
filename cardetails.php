<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Available Cars</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    /* --- Navbar Styles --- */
    .navbar {
      width: 100%;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 50px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .logo {
      font-size: 28px;
      font-weight: 700;
      color: #DDA853;
    }

    .menu ul {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 25px;
    }

    .menu ul li a {
      text-decoration: none;
      font-weight: 600;
      color: #333;
      transition: color 0.3s ease;
    }

    .menu ul li a:hover {
        color: #DDA853;
        
    }

    .nn {
           
            background-color: #DDA853;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    .nn a {
      text-decoration: none;
      color: white;
    }

    .circle {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .phello {
      font-weight: 600;
    }

    /* --- Hero Section --- */
    .hero {
      background: url("./images/carde.webp") no-repeat center center/cover;
      color: white;
      text-align: center;
      padding: 100px 20px 60px;
      position: relative;
    }

    .hero h1 {
      font-size: 48px;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 22px;
      margin-bottom: 20px;
    }

    .hero .btn {
      background-color:  #DDA853;;
      color: white;
      border: none;
      padding: 12px 30px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      text-decoration: none;
    }

    /* --- Features --- */
    .features {
      display: flex;
      justify-content: space-around;
      text-align: center;
      margin: 40px auto;
      max-width: 1000px;
    }

    .feature-item {
      max-width: 200px;
    }

    .feature-item h4 {
      margin-top: 10px;
      font-size: 16px;
      font-weight: 600;
    }

    /* --- Car Listing --- */
    .section-title {
      text-align: center;
      margin-top: 40px;
      font-size: 32px;
      font-weight: 700;
      color: #333;
    }

    .car-listing {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
      padding: 40px 60px;
    }

    .car-card {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      overflow: hidden;
      width: 300px;
    }

    .car-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .car-card .info {
      padding: 20px;
    }

    .car-card .info h3 {
      margin-bottom: 10px;
      font-size: 20px;
      color: #333;
    }

    .car-card .info p {
      font-size: 14px;
      margin-bottom: 5px;
    }

    .car-card .btn {
      margin-top: 15px;
      display: inline-block;
      padding: 10px 20px;
      background-color:  #DDA853;;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 6px;
    }

    @media (max-width: 768px) {
      .features {
        flex-direction: column;
        align-items: center;
        gap: 30px;
      }

      .car-listing {
        padding: 20px;
        gap: 20px;
      }
    }


    .navbar {
    background-color: #27548A;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 40px;
    font-family: sans-serif;
  }

  .logo {
    font-size: 28px;
    font-weight: bold;
    color: #DDA853;
  }

  .menu ul {
    display: flex;
    align-items: center;
    gap: 25px;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .menu ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: color 0.3s ease;
  }

  .menu ul li a:hover {
    color: #DDA853;
  }

  .nn {
    background-color: #DDA853;
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    font-weight: bold;
    cursor: pointer;
  }

  .nn a {
    color: #183B4E;
    text-decoration: none;
  }

  .nn:hover {
    background-color: #cda043;
  }

  .circle {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
  }

  .phello {
    font-size: 14px;
    font-weight: 500;
    color: #fff;
  }

  @media (max-width: 768px) {
    .navbar {
      flex-direction: column;
      align-items: flex-start;
    }

    .menu ul {
      flex-direction: column;
      align-items: flex-start;
      gap: 15px;
      margin-top: 10px;
    }
  }

  </style>
</head>
<body>

<?php 
require_once('connection.php');
session_start();
$value = $_SESSION['email'];
$_SESSION['email'] = $value;
$sql="SELECT * FROM users WHERE EMAIL='$value'";
$name = mysqli_query($con,$sql);
$rows = mysqli_fetch_assoc($name);
$sql2="SELECT * FROM cars WHERE AVAILABLE='Y'";
$cars = mysqli_query($con,$sql2);
?>

<!-- Navbar -->




<div class="navbar">
  <div class="logo">GoLux</div>
  <div class="menu">
    <ul>
      <li><a href="">GoLux</a></li>
      <li><a href="contactus2.html">CONTACT</a></li>
      <li><a href="./feedback.html">FEEDBACK</a></li>
      <li><button class="nn"><a href="index.php">LOGOUT</a></button></li>
      <li><img src="images/profile.jpeg" class="circle" alt="Profile"></li>
      <li><span class="phello">HELLO! <?php echo $rows['FNAME']." ".$rows['LNAME']; ?></span></li>
      <li><a href="bookinstatus.php">BOOKING STATUS</a></li>
    </ul>
  </div>
</div>

<!-- Hero Banner -->
<section class="hero">
  <h1>Available Cars For Rent</h1>
  <p>As Low as <strong>₹1000/Day</strong></p>
  
</section>

<!-- Features -->
<section class="features">
  <div class="feature-item">
    <h4>📱 Book Online, Phone, or In-Person</h4>
  </div>
  <div class="feature-item">
    <h4>🚗 Pick Up or Request Delivery</h4>
  </div>
  <div class="feature-item">
    <h4>📍 Unlimited Driving Miles</h4>
  </div>
  <div class="feature-item">
    <h4>📦 Easy Drop Off & Payment</h4>
  </div>
</section>

<!-- Car List -->
<h2 class="section-title" id="cars">Reserving a Car is Easy!</h2>
<section class="car-listing">
  <?php while($result = mysqli_fetch_assoc($cars)) { ?>
    <div class="car-card">
      <img src="data:image/jpeg\;base64,<?php echo base64_encode($result['CAR_IMG']); ?>" alt="<?php echo $result['CAR_NAME']; ?>">
      <div class="info">
        <h3><?php echo $result['CAR_NAME']; ?></h3>
        <p><strong>Fuel Type:</strong> <?php echo $result['FUEL_TYPE']; ?></p>
        <p><strong>Capacity:</strong> <?php echo $result['CAPACITY']; ?> People</p>
        <p><strong>Rent/Day:</strong> ₹<?php echo $result['PRICE']; ?>/-</p>
        <a href="booking.php?id=<?php echo $result['CAR_ID']; ?>" class="btn">Reserve Now</a>
      </div>
    </div>
  <?php } ?>
</section>

</body>
</html>


