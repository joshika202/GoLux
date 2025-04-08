<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: url("images/i2.jpg") no-repeat center center fixed;
        background-size:100% 100%;
        
        height: 100vh;
        color: #333;
      }

      .options{
        display: flex;
        margin-left: 15px;
      }
      .main {
        position: relative;
        background: rgba(255, 255, 255, 0.7);
        /* padding: 50px; */
        height: 90vh;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 500px;
      }
      h1 {
        text-align: center;
        color: #262890;
      }
      .register {
        max-width: 400px;
        margin: auto;
      }
      .register h2 {
        text-align: center;
      }
      .register label {
        display: block;
        margin-bottom: 1px;
      }
      .register input[type="text"],
      .register input[type="email"],
      .register input[type="tel"],
      .register input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .register input[type="radio"] {
        margin: 0 10px 0 0;
      }
      .register input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: orange;
        color: white;
        font-size: 16px;
        cursor: pointer;
      }
      .register input[type="submit"]:hover {
        background-color: orange;
      }
      #message {
        display: none;
        background: #f1f1f1;
        color: #000;
        padding: 20px;
        position: absolute;
        top: 50%;
        right: -150px;
        transform: translate(-50%, -50%);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
      }
      #message p {
        padding: 10px 35px;
        font-size: 18px;
      }
      .valid {
        color: green;
      }
      .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
      }
      .invalid {
        color: red;
      }
      .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
      }
      header{
        position: absolute;
        margin: 20px;
        margin-top: 10px;
      }
      header .x a{
        text-decoration: none;
        font-size: larger;
      }
      
      .x1{
        padding-top: 50px;
        padding-bottom: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .x{
        padding: 15px;
        background-color: orange;
      }
    </style>
  </head>
  <body>
    <header>
      
      <button id="back" class="x"><a href="index.php">HOME</a></button>
    </header>
    
    <br>
    <div class="x1">
    <div class="main">
      <div class="register">
        <h2>Register Here</h2>
        <form id="register" action="register.php" method="POST">
          <label for="fname">First Name:</label>
          <input
            type="text"
            name="fname"
            id="fname"
            placeholder="Enter Your First Name"
            required
          />

          <label for="lname">Last Name:</label>
          <input
            type="text"
            name="lname"
            id="lname"
            placeholder="Enter Your Last Name"
            required
          />

          <label for="email">Email:</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter Valid Email"
            required
          />

          <label for="lic">License Number:</label>
          <input
            type="text"
            name="lic"
            id="lic"
            placeholder="Enter Your License Number"
            required
          />

          <label for="ph">Phone Number:</label>
          <input
            type="tel"
            name="ph"
            id="ph"
            maxlength="10"
            onkeypress="return onlyNumberKey(event)"
            placeholder="Enter Your Phone Number"
            required
          />

          <label for="psw">Password:</label>
          <input
            type="password"
            name="pass"
            maxlength="12"
            id="psw"
            placeholder="Enter Password"
            pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            required
          />

          <label for="cpsw">Confirm Password:</label>
          <input
            type="password"
            name="cpass"
            id="cpsw"
            placeholder="Re-enter the Password"
            required
          />

          <label>Gender:</label>
          <div class="options">
          <input
            type="radio"
            name="gender"
            value="male"
            id="male"
            required
          /><label for="male">Male</label>
          <input
            type="radio"
            name="gender"
            value="female"
            id="female"
            required
          /><label for="female">Female</label>
          </div>

          <input type="submit" value="REGISTER" name="regs" />
        </form>
      </div>
    </div>
    <div id="message">
      <h3>Password must contain the following:</h3>
      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
      <p id="number" class="invalid">A <b>number</b></p>
      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    <script>
      var myInput = document.getElementById("psw");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");

      myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
      };
      myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
      };
      myInput.onkeyup = function () {
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }

        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }

        if (myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      };
    </script>
    <script>
      function onlyNumberKey(evt) {
        var ASCIICode = evt.which ? evt.which : evt.keyCode;
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
        return true;
      }
    </script>
    </div>
  </body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>REGISTRATION</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #183B4E;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }

        #fam {
            font-size: 2.5rem;
            color: #DDA853;
            margin-bottom: 20px;
            font-weight: bold;
        }

        button#back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #DDA853;
            color: white;
            border: none;
            padding: 10px 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }

        button#back a {
            text-decoration: none;
            color: white;
        }

        .main {
            background-color: #27548A;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0px 8px 24px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 600px;
        }

        .register h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            border-bottom: 2px solid #D853;
            padding-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: none;
            border-radius: 8px;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
            font-size: 16px;
        }

        input[type="radio"] {
            margin-right: 8px;
            accent-color: #DDA853;
        }

        label {
            font-weight: bold;
        }

        .btnn {
            width: 100%;
            padding: 14px;
            border: none;
            background-color: #DDA853;
            color: white;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btnn:hover {
            background-color: #c6963b;
        }

        #message {
            display: none;
            position: absolute;
            top: 0;
            left: 105%;
            background: white;
            color: black;
            padding: 16px;
            border-radius: 10px;
            width: 280px;
            font-size: 14px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            z-index: 10;
        }

        .valid {
            color: green;
        }

        .invalid {
            color: red;
        }

        .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: #DDA853;
        color: white;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: background-color 0.3s;
        z-index: 999;
      }
      
      .back-button:hover {
        background-color: #183B4E;
      }
      
      .back-button i {
        margin-right: 6px;
      }
    </style>
</head>
<body>

<?php
require_once('connection.php');
if(isset($_POST['regs'])) {
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $lic=mysqli_real_escape_string($con,$_POST['lic']);
    $ph=mysqli_real_escape_string($con,$_POST['ph']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $Pass=md5($pass);

    if(empty($fname)|| empty($lname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass) || empty($gender)) {
        echo '<script>alert("Please fill all fields")</script>';
    } else {
        if($pass==$cpass) {
            $sql2="SELECT * FROM users WHERE EMAIL='$email'";
            $res=mysqli_query($con,$sql2);
            if(mysqli_num_rows($res)>0){
                echo '<script>alert("Email already exists! Redirecting to login.")</script>';
                echo '<script> window.location.href = "index.php";</script>';
            } else {
                $sql="INSERT INTO users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER)
                      VALUES('$fname','$lname','$email','$lic',$ph,'$Pass','$gender')";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo '<script>alert("Registration successful! Redirecting to login.")</script>';
                    echo '<script> window.location.href = "index.php";</script>';       
                } else {
                    echo '<script>alert("Database error, please try again.")</script>';
                }
            }
        } else {
            echo '<script>alert("Passwords do not match!")</script>';
            echo '<script> window.location.href = "register.php";</script>';
        }
    }
}
?>

<button id="back"><a href="index.php">HOME</a></button>
<h1 id="fam">JOIN OUR FAMILY!</h1>

<div class="main">
    <div class="register">
        <h2>Register Here</h2>
        <form id="register" action="register.php" method="POST">    
            <label>First Name : </label>
            <input type="text" name="fname" placeholder="Enter Your First Name" required><br>

            <label>Last Name : </label>
            <input type="text" name="lname" placeholder="Enter Your Last Name" required><br>

            <label>Email : </label>
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="example@example.com" placeholder="Enter Valid Email" required><br>

            <label>Your License number : </label>
            <input type="text" name="lic" placeholder="Enter Your License number" required><br>

            <label>Phone Number : </label>
            <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
                placeholder="Enter Your Phone Number" required><br>

            <label>Password : </label>
            <div style="position: relative; display: inline-block; width: 100%;">
                <input type="password" name="pass" maxlength="12" id="psw"
                    placeholder="Enter Password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number, one uppercase and lowercase letter, and be at least 8 characters"
                    required>

                <div id="message">
                    <h4 style="margin-top:0;">Password must contain:</h4>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>
            <br><br>

            <label>Confirm Password : </label>
            <input type="password" name="cpass" placeholder="Re-enter the password" required><br>

            <label>Gender : </label><br>
            <label for="one">Male</label>
            <input type="radio" id="one" name="gender" value="male">
            <label for="two">Female</label>
            <input type="radio" id="two" name="gender" value="female"><br><br>

            <input type="submit" class="btnn" value="REGISTER" name="regs" style="background-color:  #DDA853; color: white;">
        </form>
    </div> 
</div>
<a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i> Home</a>

<script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    myInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        letter.classList.toggle("valid", myInput.value.match(lowerCaseLetters));
        letter.classList.toggle("invalid", !myInput.value.match(lowerCaseLetters));

        var upperCaseLetters = /[A-Z]/g;
        capital.classList.toggle("valid", myInput.value.match(upperCaseLetters));
        capital.classList.toggle("invalid", !myInput.value.match(upperCaseLetters));

        var numbers = /[0-9]/g;
        number.classList.toggle("valid", myInput.value.match(numbers));
        number.classList.toggle("invalid", !myInput.value.match(numbers));

        length.classList.toggle("valid", myInput.value.length >= 8);
        length.classList.toggle("invalid", myInput.value.length < 8);
    }

    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
        return !(ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57));
    }
</script>
</body>
</html>
