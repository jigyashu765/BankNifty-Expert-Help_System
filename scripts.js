const container = document.getElementById('container');
const confrimbox = document.getElementById('confrim-box');
const confrimBoxText = document.getElementById('confrim-box-text');

document.getElementById('sendMessageBtn').addEventListener('click', sendMessageToTelegram);

function sendMessageToTelegram() {
    const stockType = document.getElementById('stockType').value;
    const stockInput = document.getElementById('stockInput').value;
    const CEPEType = document.getElementById('CEPEType').value;
    const costInput = document.getElementById('costInput').value;
    const lotInput = document.getElementById('lotInput').value;

    let text = '';

    if (costInput <= 100) {
        text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 3}/${parseFloat(costInput) + 6}/${parseFloat(costInput) + 9}++\nSTOP LOSS : OWN\nLOT SIZE : ${lotInput}`;
    } else if (costInput <= 200) {
        text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 15}/${parseFloat(costInput) + 30}/${parseFloat(costInput) + 45}++\nSTOP LOSS : ${parseFloat(costInput) - 30}\nLOT SIZE : ${lotInput}`;
    } else if (costInput <= 300) {
        text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 30}/${parseFloat(costInput) + 60}/${parseFloat(costInput) + 90}++\nSTOP LOSS : ${parseFloat(costInput) - 40}\nLOT SIZE : ${lotInput}`;
    } else {
        text = `BUY #${stockType} ${stockInput} ${CEPEType}\nAT PRICE : ${costInput}\nTARGET : ${parseFloat(costInput) + 30}/${parseFloat(costInput) + 60}/${parseFloat(costInput) + 90}++\nSTOP LOSS : ${parseFloat(costInput) - 30}\nLOT SIZE : ${lotInput}`;
    }

    confrimBoxText.innerHTML = '';
    confrimBoxText.innerHTML = `BUY #${stockType} ${stockInput} ${CEPEType}<br>AT PRICE : ${costInput}<br>TARGET : ${parseFloat(costInput) + 3}/${parseFloat(costInput) + 6}/${parseFloat(costInput) + 9}++<br>STOP LOSS : ${parseFloat(costInput) - 30}<br>LOT SIZE : ${lotInput}`;

    confrimBoxDisplay();

    document.getElementById('confrimBtnEdit').addEventListener('click', confrimBoxDisplay);
    document.getElementById('confrimBtnSend').addEventListener('click', () => confrimSend(text));
}

function confrimSend(text) {
    const apiToken = "6156404573:AAGEECRTXc_Pv9qLvoxL4KfCZV3mPKleIAw";
    //   const chatId = '@jrtradres';
    const chatId = "@Jrtestingchannel";
    const urlString = `https://api.telegram.org/bot${apiToken}/sendMessage?chat_id=${chatId}&text=${encodeURIComponent(text)}`;

    fetch(urlString)
        .then(response => response.json())
        .then(data => {
            console.log('Telegram API Response:', data);
            // You can perform any further actions with the Telegram API response here.
        })
        .catch(error => {
            console.error('Error:', error);
        });
    
    document.getElementById('stockType').value = '';
    document.getElementById('stockInput').value = '';
    document.getElementById('CEPEType').value = '';
    document.getElementById('costInput').value = '';
    document.getElementById('lotInput').value = '';

    confrimBoxDisplay();
}

container.addEventListener('click', function(event) {
    if (event.target === container) {
        if (condition) {
            
        }
        const textToCopy = confrimBoxText.innerText;

        navigator.clipboard.writeText(textToCopy)
            .then(() => {
                console.log('Text copied to clipboard:', textToCopy);
                // You can add any further actions or notifications here
            })
            .catch(error => {
                console.error('Error copying text:', error);
                // Handle the error if the text copy fails
            });
    }
});


container.addEventListener('dblclick', function(event) {
    if (event.target === container) {
        confrimBoxDisplay();
        confrimBoxText.innerHTML = '';
    }
});

function confrimBoxDisplay() {
    if (confrimbox.style.display === 'none') {
        confrimbox.style.display = 'block';
    } else {
        confrimbox.style.display = 'none';
    }
}

function toggleInputField() {
    const stockType = document.getElementById('stockType').value;
    const priceInput = document.getElementById('stockTypeInput');

    if (stockType === 'CUSTOM') {
        priceInput.style.display = 'block';
    } else {
        priceInput.style.display = 'none';
    }
}
