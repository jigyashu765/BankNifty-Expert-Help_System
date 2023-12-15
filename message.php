<?php
$PageTitle = 'Message';

include './Component/db_connect.php';

$sql = 'SELECT * FROM auto_message';

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
          echo '<div class="textbox small-textbox">' . nl2br($row["message"]) . '</div>';
          echo '<div class="btn">';
          echo '<button class="button" role="button" onclick="handleButtonClick(this, \'paid\')">Paid</button>';
          echo '<button class="button" role="button" onclick="handleButtonClick(this, \'free\')">Free</button>';
          echo '<button class="button" role="button" onclick="handleButtonClick(this, \'both\')">Both</button>';
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

</html>