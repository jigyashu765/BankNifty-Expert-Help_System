<?php
$PageTitle = 'Paid Stock';

include './Component/db_connect.php';

$dbDate = date('y-m-d');

$sql = "SELECT * FROM premium_stock_list WHERE Date = '$dbDate'";

$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<?php
include './Component/_head.php';
?>

<body>
  <div class="container">
    <?php
    include './Component/_header.php';
    ?>

    <div class="main_container">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="box small-box">';
          echo '<div>' . nl2br($row["MessageId"]) . '</div>';
          echo '<div class="textbox small-textbox"> Buy #' . nl2br($row["Type"]) . " " . nl2br($row["Number"]) . " " . nl2br($row["Side"]) . "<br> At Price " . nl2br($row['Level']) . "<br> Stop Loss : " . nl2br($row["StopLoss"]) . "<br> Target : " . nl2br($row["Target1"]) . "/" . nl2br($row["Target2"]) . "/" . nl2br($row["Target3"]) . "+" . '</div>';
          echo '<div>Current price : <input class="inputBox" type="number" name="currentPrice" id="currentPrice_' . $row['Id'] . '" placeholder="' . $row['CurrentPrice'] . '">'.'</div>';
          echo '<div class="btn">';
          echo '<button class="button" role="button" onclick="updateCurrentPrice(' . $row['Id'] . ')">Update Database</button>';
          // echo '<button class="button" role="button" onclick="handleButtonClick(this, \'paid\')">Paid</button>';
          // echo '<button class="button" role="button" onclick="handleButtonClick(this, \'free\')">Free</button>';
          // echo '<button class="button" role="button" onclick="handleButtonClick(this, \'both\')">Both</button>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "No records found";
      }
      ?>
    </div>
  </div>
</body>
<script src="script.js?vm=<?php echo time(); ?>"></script>

<script>
  function updateCurrentPrice(recordId) {
    // Get the updated current price from the input field
    const updatedPrice = document.getElementById("currentPrice_" + recordId).value;

    // Construct the data to send in the request
    const data = {
      id: recordId,
      currentPrice: updatedPrice,
    };

    // Send a fetch request to update the "CurrentPrice" in the database
    fetch('./Component/update_price.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.result === 'success') {
          // Update the UI or show a success message
          alert('Current Price updated successfully.');
        } else {
          // Handle errors
          alert('Failed to update Current Price.');
        }
      })
      .catch((error) => {
        // Handle network errors
        console.error('Error:', error);
      });
  }
</script>


</html>