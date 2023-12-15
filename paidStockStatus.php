<?php
$todayDate = date('d/m/y');
$PageTitle = $todayDate . ' - P&L List';

$dbDate = date('y-m-d');

include './Component/db_connect.php';

$sql = "SELECT * FROM premium_stock_list WHERE Date = '$dbDate'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$stockList['BankNifty'] = 15;
$stockList['Nifty'] = 50;
$stockList['MidcpNifty'] = 75;
$stockList['FinNifty'] = 40;
$stockList['Sensex'] = 10;

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

        <div class="container">
            <div class="main_container">
                <div class="box big-box">
                    <div class="textbox big-textbox">
                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {

                            $difference = $row['CurrentPrice'] - $row['Level'];

                            // echo "✅Trade No: " . $counter . "<br>✅" . $row['Type'] . ' ' . $row['Number'] . " " . $row['Side'];
                            // $randomNumber = rand($min, $max);
                            // if ($difference >= 100) {
                            //     echo "<br>✅[ &#8377;" . $row['Level'] . " To &#8377;" . $row['CurrentPrice'] . " ]";
                            //     echo "<br>✅Profit : " . $difference . "🔥🔥🔥";
                            //     echo "<br>✅All Target Done✅👍";
                                
                            //     if (array_key_exists($row['Type'], $stockList)) {
                            //         $lotSize = $stockList[$row['Type']];
                            //         $stockSize = $randomNumber * $lotSize;
                            //         echo "<br>✅Parchage Lot : " . $randomNumber." S(".$stockSize.")";
                            //         echo "<br>✅Amount : " . ($difference * $stockSize) ."💵💶💷";
                            //     }

                            //     echo "<br>✅#BigJackpot";

                            //     $totalProfit += ($difference * $stockSize);
                            // } elseif ($difference >= 1) {
                            //     echo "<br>✅[ &#8377;" . $row['Level'] . " To &#8377;" . $row['CurrentPrice'] . " ]";
                            //     echo "<br>✅Profit : " . $difference . "🔥";
                            //     echo "<br>✅Some Target Done✅👍";
                                
                            //     if (array_key_exists($row['Type'], $stockList)) {
                            //         $lotSize = $stockList[$row['Type']];
                            //         $stockSize = $randomNumber * $lotSize;
                            //         echo "<br>✅Parchage Lot : " . $randomNumber." S(".$stockSize.")";
                            //         echo "<br>✅Amount : " . ($difference * $stockSize) ."💵💶💷";
                            //     }

                            //     echo "<br>✅#Jackpot";

                            //     $totalProfit += ($difference * $stockSize);
                            // } else {
                            //     echo "<br>⛔[ &#8377;" . $row['Level'] . " To &#8377;" . $row['CurrentPrice'] . " ]";
                            //     echo "<br>⛔Loss : " . abs($difference);
                            //     echo "<br>⛔Stop Loss Trigger😔";
                                
                            //     if (array_key_exists($row['Type'], $stockList)) {
                            //         $lotSize = $stockList[$row['Type']];
                            //         $stockSize = $randomNumber * $lotSize;
                            //         echo "<br>⛔Parchage Lot : " . $randomNumber ." S(".$stockSize.")";
                            //         echo "<br>⛔Amount : " . ($difference * $stockSize);
                            //     }

                            //     $totalLoss += ($difference * $stockSize);
                            // }

                            // echo '<br>----------------------------------<br>';

                            // $counter++;
                        }
                        ?>
                    </div>
                    <?php
                    echo '<div class="btn">';
                    echo '<button class="button" role="button" onclick="handleButtonClick(this, \'paid\')">Paid</button>';
                    echo '<button class="button" role="button" onclick="handleButtonClick(this, \'free\')">Free</button>';
                    echo '<button class="button" role="button" onclick="handleButtonClick(this, \'both\')">Both</button>';
                    echo '</div>';
                    ?>
                </div>
            </div>

        </div>

    </div>
</body>
<script src=" script.js?vm=<?php echo time(); ?>"></script>

</html>