<?php

$PageTitle = 'Advertisement';

include './Component/db_connect.php';

$sql = 'SELECT message FROM advertisement';

$result = mysqli_query($conn, $sql);

// Fetch Price Table

$priceListSql = 'SELECT duration, price FROM price_list';
$priceListResult = mysqli_query($conn, $priceListSql);

$priceList = array(); // Initialize an empty array for the price list

while ($row = mysqli_fetch_assoc($priceListResult)) {
    $priceList[] = $row; // Add each price list item to the array
}

// Fetch Price Table

// Fetch Link

$linkSql = 'SELECT name, link FROM our_link';
$linkResult = mysqli_query($conn, $linkSql);

$links = array(); // Initialize an empty array for the links

while ($row = mysqli_fetch_assoc($linkResult)) {
    $links[$row['name']] = $row['link']; // Store the link with its name as the key
}


// Fetch Link

function generateMessageWithPriceList($message, $priceList, $links)
{
    // Use str_replace to replace [PRICE_LIST] in the message with the actual price list content
    $messageWithPriceList = str_replace('[PRICE_LIST]', generatePriceListHTML($priceList), $message);
    
    // Loop through all available links
    foreach ($links as $linkName => $link) {
        // Use str_replace to replace the link placeholders with the actual links
        $messageWithPriceList = str_replace("[$linkName]", $link, $messageWithPriceList);
    }
    
    return $messageWithPriceList;
}


// Function to generate HTML for the message with the price list
// function generateMessageWithPriceList($message, $priceList)
// {
//     // Use str_replace to replace [PRICE_LIST] in the message with the actual price list content
//     $messageWithPriceList = str_replace('[PRICE_LIST]', generatePriceListHTML($priceList), $message);
//     return $messageWithPriceList;
// }

// Function to generate HTML for the price list
function generatePriceListHTML($priceList)
{
    if (is_array($priceList) && count($priceList) > 0) {
        $priceHTML = ''; // Initialize an empty string to store the HTML

        $count = count($priceList);
        foreach ($priceList as $index => $item) {
            // Concatenate each price item to the HTML string
            $priceHTML .= $item["duration"] . ' Just at ' . $item["price"] . '/-';

            // Add a <br> tag after all items except the last one
            if ($index < $count - 1) {
                $priceHTML .= '<br>';
            }
        }

        return $priceHTML;
    }
}


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
                    echo '<div class="box box-1">';
                    // Get the message from the database
                    $message = $row["message"];

                    // Display the modified message with the price list and line breaks
                    echo '<div class="textbox" style="white-space: pre-line;">' . nl2br(generateMessageWithPriceList($message, $priceList, $links)) . '</div>';

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