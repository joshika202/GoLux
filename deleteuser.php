<?php

require_once('connection.php');
$email=$_GET['id'];

$sql="DELETE from users where EMAIL='$email'";
$result=mysqli_query($con,$sql);

echo '<script>alert("USER DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "adminusers.php";</script>';

?>

<!-- Connects to the database.
Retrieves the email of the user to be deleted from the URL parameters.
Executes a SQL DELETE query to remove the user from the database.
Displays a JavaScript alert to confirm the deletion.
Redirects the user to the adminusers.php page. -->