<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GoLux - Car Rental</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Include new layout styles directly or move to your external CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: Arial, sans-serif;
    background-color:rgb(226, 245, 220);
    color: #183B4E;
}


        .navbar {
            background-color:#27548A;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width:100%;
        }

        .logo {
            color: #DDA853;
            font-size: 28px;
            font-weight: bold;
        }

        .menu ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        .menu ul li a {
            color: #F5EEDC;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .menu ul li a:hover {
            color: #DDA853;
        }
        .hero {
    background: url("images/carind.jpg.webp") no-repeat center center;
    background-size: cover;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 90px 100px;
    color: white;
}



       

        .hero-content {
            max-width: 50%;
        }

        .hero-content h1 {
            font-size: 48px;
        }

        .hero-content h1 span {
            color: #DDA853;
        }

        .hero-content p {
            font-size: 18px;
            margin: 20px 0;
        }

        .hero-content a {
            display: inline-block;
            padding: 12px 25px;
            background-color: #DDA853;
            color: #183B4E;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .hero-content {
            background-color: rgba(241, 172, 45, 0.1);
    
    
}


        .form-box {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 10px;
            width: 300px;
        }

        .form-box h2 {
            text-align: center;
            color: #DDA853;
            margin-bottom: 20px;
        }

        .form-box input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-bottom: 2px solid #DDA853;
            background: transparent;
            color: white;
        }

        .form-box input::placeholder {
            color: white;
        }

        .form-box .btnn {
            background-color: #DDA853;
            border: none;
            color: #183B4E;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-box .link {
            color: #fff;
            text-align: center;
            margin-top: 10px;
        }

        .form-box .link a {
            color: #DDA853;
            text-decoration: none;
        }

        .admin-button a {
    background-color: #DDA853;
    color: #183B4E;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.admin-button a:hover {
    background-color: #fff;
    color: #183B4E;
}

    </style>
</head>
<body>

<?php
require_once('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (empty($email) || empty($pass)) {
        echo '<script>alert("Please fill in all fields.")</script>';
    } else {
        $query = "SELECT * FROM users WHERE EMAIL='$email'";
        $res = mysqli_query($con, $query);
        if ($row = mysqli_fetch_assoc($res)) {
            $db_password = $row['PASSWORD'];
            if (md5($pass) == $db_password) {
                session_start();
                $_SESSION['email'] = $email;
                header("Location: cardetails.php");
            } else {
                echo '<script>alert("Incorrect password.")</script>';
            }
        } else {
            echo '<script>alert("Email not found.")</script>';
        }
    }
}
?>

<div class="navbar">
    <div class="logo">GoLux</div>
    <div class="menu">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="aboutus.html">ABOUT</a></li>
            <li><a href="./contactus.html">CONTACT</a></li>
            
        </ul>

        </div>
    <div class="admin-button">
    <a href="adminlogin.php">Admin</a>

    </div>
</div>
    </div>
</div>

<div class="hero">
    <div class="hero-content">
        <h1>Rent Your <span>Dream Car</span></h1>
        <p>Live the life of luxury. Just rent a car from our vast collection and enjoy every moment with your family. Join us and become part of our community.</p>
        <a href="register.php">JOIN US</a>
    </div>

    <div class="form-box">
        <h2>Login Here</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="pass" placeholder="Enter Password" required>
            <input type="submit" value="Login" name="login" class="btnn">
        </form>
        <div class="link">
            Don't have an account? <a href="register.php">Sign up here</a>
        </div>
    </div>
</div>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
