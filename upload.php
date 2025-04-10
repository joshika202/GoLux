<?php
if (isset($_POST['upload'])) {
    require_once('connection.php');

    // Print file information for debugging
    echo "<pre>";
    print_r($_FILES['carImage']);
    echo "</pre>";

    $img_name = $_FILES['carImage']['name'];
    $tmp_name = $_FILES['carImage']['tmp_name'];
    $error = $_FILES['carImage']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png", "webp", "svg");
        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'images/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $carname = mysqli_real_escape_string($con, $_POST['carName']);
            $ftype = mysqli_real_escape_string($con, $_POST['fuelType']);
            $capacity = mysqli_real_escape_string($con, $_POST['capacity']);
            $price = mysqli_real_escape_string($con, $_POST['price']);
            $available = "Y";

            $query = "INSERT INTO cars(CAR_NAME, FUEL_TYPE, CAPACITY, PRICE, AVAILABLE) VALUES ('$carname', '$ftype', '$capacity', '$price', '$available')";
            $res = mysqli_query($con, $query);

            if ($res) {
                echo '<script>alert("New Car Added Successfully!!")</script>';
                echo '<script>window.location.href = "adminvehicle.php";</script>';
            } else {
                echo '<script>alert("Failed to add the car to the database.")</script>';
                echo '<script>window.location.href = "addcar.php";</script>';
            }
        } else {
            echo '<script>alert("Cannot upload this type of image.")</script>';
            echo '<script>window.location.href = "addcar.php";</script>';
        }
    } else {
        echo '<script>alert("An unknown error occurred.")</script>';
        echo '<script>window.location.href = "addcar.php";</script>';
    }
} else {
    echo "Invalid request.";
}
?>
