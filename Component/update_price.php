<?php
include 'db_connect.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);

    $recordId = $data['id'];
    $updatedPrice = $data['currentPrice'];

    $sql = "UPDATE premium_stock_list SET CurrentPrice = '$updatedPrice' WHERE Id = '$recordId'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['result' => 'success']);
    } else {
        echo json_encode(['result' => 'error']);
    }
} else {
    echo json_encode(['result' => 'error']);
}
?>
