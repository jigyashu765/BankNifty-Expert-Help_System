<?php
$PageTitle = 'Index';
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
            <form action="./Component/submit_form.php" method="post">
                <label for="myInput">Buy</label>
                <input list="options" id="type" name="type" placeholder="Buy BankNfty">
                <datalist id="options">
                    <option value="BankNifty">
                    <option value="Nifty">
                    <option value="MidcpNifty">
                    <option value="FinNifty">
                    <option value="Sensex">
                </datalist>

                <label for="myInput">Stock</label>
                <input type="number" name="number" id="number" placeholder="Eg. 44900">

                <label for="myInput">Side</label>
                <input list="option" id="side" name="side" placeholder="CE/PE">
                <datalist id="option">
                    <option value="CE">
                    <option value="PE">
                </datalist>

                <label for="myInput">At Price</label>
                <input type="number" name="level" id="level" placeholder="At Price">

                <label for="myInput">Target</label>
                <div>
                    <input class="target" type="number" name="target1" id="target1" placeholder="1st Target">/
                    <input class="target" type="number" name="target2" id="target2" placeholder="2nd Target">/
                    <input class="target" type="number" name="target3" id="target3" placeholder="3rd Target">+
                </div>

                <label for="myInput">Stop Loss</label>
                <input type="number" name="StopLoss" id="stopLoss" placeholder="Stop Loss">
                
                <label for="myInput">Message Id</label>
                <input type="number" name="MessageId" id="MessageId" placeholder="Message Id">

                <div>
                    <button type="submit" id="sendMessageBtn" class="button">Send to Telegram</button>
                    <button type="submit" id="sendMessageBtn" class="button">Save to DataBase</button>
                </div>
            </form>
            <div class="confrim-box" id="confrim-box" style="display: none;">
                <div class="confrim-box-text" id="confrim-box-text">
                </div>
                <!-- <div class="confrim-box-btn">
                    <button id="confrimBtnEdit" class="button">
                        Edit
                        <span></span>
                    </button>
                    <button id="confrimBtnSend" class="button">
                        Send
                        <span></span>
                    </button>
                    <p>Double click out side to exit</p>
                </div> -->
            </div>
        </div>
    </div>
</body>
<script>
    // Check if the 'refresh' query parameter is present
    const urlParams = new URLSearchParams(window.location.search);
    const shouldRefresh = urlParams.get('refresh');
    
    // If the 'refresh' parameter is present, reload the page
    if (shouldRefresh) {
        location.reload();
    }
    
//     // Example message
//     const message = `BankNifty 44000 pe
//     Above -365
//     SL -340
//     Target -385/400/430 +`;
    
//     // Split the message into lines
    
//     // Check if there are enough lines to fill the form
//     function fillFormFromMessage(message) {
//         const lines = message.split('\n');
//     if (lines.length === 5) {
//         // Extract values from the message
//       const type = lines[0].trim();
//       const number = lines[1].trim();
//       const side = lines[2].trim();
//       const level = lines[3].trim();
//       const targetValues = lines[4].trim().split('/');
//       // Fill the form fields
//       document.getElementById("type").value = type;
//       document.getElementById("number").value = number;
//       document.getElementById("side").value = side;
//       document.getElementById("level").value = level;
//       document.getElementById("target1").value = targetValues[0];
//       document.getElementById("target2").value = targetValues[1];
//       document.getElementById("target3").value = targetValues[2];
//     }
// }

// // Call the function to fill the form
// fillFormFromMessage(message);
</script>

<script src="scripts.js?vm=<?php echo time(); ?>"></script>
</html>