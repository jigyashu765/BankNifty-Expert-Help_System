<?php
// Include your database connection configuration here
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $type = $_POST["type"];
    $number = $_POST["number"];
    $side = $_POST["side"];
    $level = $_POST["level"];
    $stopLoss = $_POST["StopLoss"];
    $target1 = $_POST["target1"];
    $target2 = $_POST["target2"];
    $target3 = $_POST["target3"];
    $messageId = $_POST["MessageId"];

    // Sanitize the data (prevent SQL injection)
    $type = mysqli_real_escape_string($conn, $type);
    $number = mysqli_real_escape_string($conn, $number);
    $side = mysqli_real_escape_string($conn, $side);
    $level = mysqli_real_escape_string($conn, $level);
    $stopLoss = mysqli_real_escape_string($conn, $stopLoss);
    $target1 = mysqli_real_escape_string($conn, $target1);
    $target2 = mysqli_real_escape_string($conn, $target2);
    $target3 = mysqli_real_escape_string($conn, $target3);
    $messageId = mysqli_real_escape_string($conn, $messageId);

    // Define and set the price and time variables
    $price = 0; // Replace with the actual price
    $time = date('Y-m-d'); // Use the current timestamp

    // Insert data into the database
    $sql = "INSERT INTO premium_stock_list (type, number, side, level, stopLoss, target1, target2, target3, messageId, date)
            VALUES ('$type', '$number', '$side', '$level', '$stopLoss', '$target1', '$target2', '$target3', '$messageId', '$time')";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully. Redirect to index.php with a refresh parameter.
        header("Location: /index.php?refresh=true");
        exit(); // Important to stop further script execution
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
