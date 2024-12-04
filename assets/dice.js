// console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

let rollButton = document.querySelector('#diceRoll');
let textButton = document.querySelector('#textButton');
let chosenDice = document.querySelector('#chosenDice').innerHTML;
let tableDice = document.querySelector('#chosenDice').innerHTML;

// to avoid the script to try loading the events if the inputs aren't on page

if (rollButton != null) {
    rollButton.addEventListener('click', rollClick); // On passe notre fonction en référence, c’est pourquoi c’est sans parenthèses
};

if(textButton != null) {
    textButton.addEventListener('click', diceTextInput);
}

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
};


// funtion to simullate a dice roll

function rollClick() {
    let dice = Number(tableDice.replace(/\D/g, ""));

    let result = getRandomInt(dice) + 1
    console.log('the dice rolled number is :' + result);
    choiceSelection(result);
};

// funtion to input result of a player roll

function diceTextInput() {
    let textInput = document.getElementById('textRoll').value;
    let result = textInput.replace(/\D/g, "");

    let highLimit = Number(tableDice.replace(/\D/g, ""));

    if(result > highLimit) {
        console.log("the result input is higher than the table allows")
        return "wrong input"
    } else if (result < 1) {
        console.log("the result input is lower than the table allows")
        return "wrong input"
    }
    console.log('the dice rolled number is :' + result);
    choiceSelection(result);
};

// function to showcase on the table which row as been roll by either text input or button click

function choiceSelection(tableRow) {
    if (document.querySelector(".selectedRow") === null) {
        let selectedRow = document.querySelector('#ligne' + tableRow);
        selectedRow.className = "selectedRow";
    } else {
        let previousRow = document.querySelector(".selectedRow");
        previousRow.classList.remove('selectedRow');
        let selectedRow = document.querySelector('#ligne' + tableRow);
        selectedRow.className = "selectedRow";
    }
}