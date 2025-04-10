<?php

require_once('connection.php');
$carid=$_GET['id'];
$book_id=$_GET['bookid'];

// These lines retrieve the carid and book_id parameters from the URL using the $_GET superglobal. 
// These parameters are expected to be passed in the URL.

$sql2="SELECT *from booking where BOOK_Id=$book_id";
$result2=mysqli_query($con,$sql2);
$res2 = mysqli_fetch_assoc($result2);

// sql2: This SQL query selects all columns from the booking table where the BOOK_Id matches the book_id parameter from the URL.
// result2: Executes the query.
// res2: Fetches the result as an associative array, which stores the booking details.

$sql="SELECT *from cars where CAR_ID=$carid";
$result=mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);


// sql: This SQL query selects all columns from the cars table where the CAR_ID matches the carid parameter from the URL.
// result: Executes the query.
// res: Fetches the result as an associative array, which stores the car details.

if($res['AVAILABLE']=='Y')
{
    echo '<script>alert("ALREADY CAR IS RETURNED")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}
else{
    
    $sql4="UPDATE cars set AVAILABLE='Y' where CAR_ID=$res[CAR_ID]";
    $query2=mysqli_query($con,$sql4);
    $sql5="UPDATE booking set BOOK_STATUS='RETURNED' where BOOK_ID=$res2[BOOK_ID]";
    $query=mysqli_query($con,$sql5);
    echo '<script>alert("CAR RETURNED SUCCESSFULLY")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}  



?>


<!-- The script checks if a car is already returned based on its availability status.
If the car is already returned, it notifies the admin and redirects them to the booking management page.
If the car is not yet returned, it updates the car's availability status to 'Y' and sets the booking status to 'RETURNED'.
Notifications and redirections are handled using JavaScript alerts and window.location.href. -->