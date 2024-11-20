<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change if you're using a different username
$password = ""; // Change if you're using a different password
$dbname = "nike"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO users (email, phone, address, city, zip, message) 
            VALUES ('$email', '$phone', '$address', '$city', '$zip', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Show success message pop-up
        echo "<script>alert('Form successfully submitted!'); window.location.href='thank_you_page.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
