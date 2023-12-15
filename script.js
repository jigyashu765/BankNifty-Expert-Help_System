const messageIdToRespondTo = '';

const responseMessage = 'This is your response message.';

function handleButtonClick(button, action) {
    const box = button.closest('.box');
    const textbox = box.querySelector('.textbox'); 

    const message = textbox.innerHTML.replace(/<br\s*\/?>/g, '\n');
    
    // const modifiedText = textbox.innerHTML.replace(/\n/, '');
    console.log('Message:', message);


    let apiToken = "";
    let chatId = "";
    let messageId = '';

    switch (action) {
        case 'paid':
            apiToken = "6611873192:AAFn2MS3pBT2wRCC7Kb9ACpd8x-9ZCsoTC8";
            chatId = "-1001949644695";
            sendToTelegram(apiToken, chatId, messageId, message);
            break;
        case 'free':
            apiToken = "6499918820:AAEsPB4Ts69RZPv3728h1jV3FnpJ8ZIiSl4";
            chatId = "@bank_nifty765";
            // const apiToken = "6156404573:AAGEECRTXc_Pv9qLvoxL4KfCZV3mPKleIAw";
            // //   const chatId = '@jrtradres';
            // const chatId = "@Jrtestingchannel";
            sendToTelegram(apiToken, chatId, messageId, message);
            break;
        case 'both':
            // Set chatId for both channels
            const apiTokenBoth1 = "6611873192:AAFn2MS3pBT2wRCC7Kb9ACpd8x-9ZCsoTC8";
            const chatIdChannel1 = "-1001949644695";

            const apiTokenBoth2 = "6499918820:AAEsPB4Ts69RZPv3728h1jV3FnpJ8ZIiSl4";
            const chatIdChannel2 = "@bank_nifty765";

            // Send the same message to both channels
            sendToTelegram(apiTokenBoth1, chatIdChannel1, messageId, message);
            sendToTelegram(apiTokenBoth2, chatIdChannel2, messageId, message);
            break;
        default:
            // Handle the default case appropriately, e.g., show an error message
            console.error('Unknown action:', action);
    }
}

function sendToTelegram(apiToken, chatId, messageId, message) {
    // URL-encode the message
    const encodedMessage = encodeURIComponent(message);

    const urlString = `https://api.telegram.org/bot${apiToken}/sendMessage?chat_id=${chatId}&text=${encodedMessage}&reply_to_message_id=${messageId}`;

    fetch(urlString)
    .then(response => {
        if (!response.ok) {
            throw new Error(`Telegram API Error: ${response.status} ${response.statusText}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Telegram API Response:', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


messageIdToRespondTo = "";


let level = 10;
let Target = 20;

function printNumber() {
    if (Target <= level) {
        console.log(Target);
        Target += 5;
    } else {
        clearInterval(interval);
    }
}

const interval = setInterval(printNumber, 15000);

// Remove this line, as the numbers will be printed by the interval
// printNumber();





function updateSelectedOption() {
    const selectedOption = document.getElementById('dropdown').value;
    document.getElementById('selectedOption').value = selectedOption;
}







// const container = document.getElementById('container');
// const confrimbox = document.getElementById('confrim-box');
// const confrimBoxText = document.getElementById('confrim-box-text');

// document.getElementById('sendMessageBtn').addEventListener('click', sendMessageToTelegram);



// function sendMessageToTelegram() {
//     const stockType = document.getElementById('stockType').value;
//     const stockInput = document.getElementById('stockInput').value;
//     const CEPEType = document.getElementById('CEPEType').value;
//     const costInput = document.getElementById('costInput').value;
//     const lotInput = document.getElementById('lotInput').value;

//     let text = '';

//     if (costInput <= 100) {
//         text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 3}/${parseFloat(costInput) + 6}/${parseFloat(costInput) + 9}++\nSTOP LOSS : OWN\nLOT SIZE : ${lotInput}`;
//     } else if (costInput <= 200) {
//         text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 15}/${parseFloat(costInput) + 30}/${parseFloat(costInput) + 45}++\nSTOP LOSS : ${parseFloat(costInput) - 30}\nLOT SIZE : ${lotInput}`;
//     } else if (costInput <= 300) {
//         text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 30}/${parseFloat(costInput) + 60}/${parseFloat(costInput) + 90}++\nSTOP LOSS : ${parseFloat(costInput) - 40}\nLOT SIZE : ${lotInput}`;
//     } else {
//         text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 30}/${parseFloat(costInput) + 60}/${parseFloat(costInput) + 90}++\nSTOP LOSS : ${parseFloat(costInput) - 30}\nLOT SIZE : ${lotInput}`;
//     }

//     confrimBoxText.innerHTML = '';
//     confrimBoxText.innerHTML = `BUY #${stockType} ${stockInput} ${CEPEType}<br>AT PRICE : ${costInput}<br>TARGET : ${parseFloat(costInput) + 3}/${parseFloat(costInput) + 6}/${parseFloat(costInput) + 9}++<br>STOP LOSS : ${parseFloat(costInput) - 30}<br>LOT SIZE : ${lotInput}`;

//     confrimBoxDisplay();

//     document.getElementById('confrimBtnEdit').addEventListener('click', confrimBoxDisplay);
//     document.getElementById('confrimBtnSend').addEventListener('click', () => confrimSend(text));
// }

// function confrimSend(text) {
//     const apiToken = "6156404573:AAGEECRTXc_Pv9qLvoxL4KfCZV3mPKleIAw";
//     //   const chatId = '@jrtradres';
//     const chatId = "@Jrtestingchannel";
//     const urlString = `https://api.telegram.org/bot${apiToken}/sendMessage?chat_id=${chatId}&text=${encodeURIComponent(text)}`;

//     fetch(urlString)
//         .then(response => response.json())
//         .then(data => {
//             console.log('Telegram API Response:', data);
//             // You can perform any further actions with the Telegram API response here.
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
    
//     document.getElementById('stockType').value = '';
//     document.getElementById('stockInput').value = '';
//     document.getElementById('CEPEType').value = '';
//     document.getElementById('costInput').value = '';
//     document.getElementById('lotInput').value = '';

//     confrimBoxDisplay();
// }

// container.addEventListener('click', function(event) {
//     if (event.target === container) {
//         if (condition) {
            
//         }
//         const textToCopy = confrimBoxText.innerText;

//         navigator.clipboard.writeText(textToCopy)
//             .then(() => {
//                 console.log('Text copied to clipboard:', textToCopy);
//                 // You can add any further actions or notifications here
//             })
//             .catch(error => {
//                 console.error('Error copying text:', error);
//                 // Handle the error if the text copy fails
//             });
//     }
// });


// container.addEventListener('dblclick', function(event) {
//     if (event.target === container) {
//         confrimBoxDisplay();
//         confrimBoxText.innerHTML = '';
//     }
// });

// function confrimBoxDisplay() {
//     if (confrimbox.style.display === 'none') {
//         confrimbox.style.display = 'block';
//     } else {
//         confrimbox.style.display = 'none';
//     }
// }

// function toggleInputField() {
//     const stockType = document.getElementById('stockType').value;
//     const priceInput = document.getElementById('stockTypeInput');

//     if (stockType === 'CUSTOM') {
//         priceInput.style.display = 'block';
//     } else {
//         priceInput.style.display = 'none';
//     }
// }
