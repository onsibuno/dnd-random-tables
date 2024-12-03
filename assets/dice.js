console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

let rollButton = document.querySelector('#diceRoll');
let chosenDice = document.querySelector('#chosenDice').innerHTML;

console.log(chosenDice);

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
};

function rollClick() {
    let dice = 1;

    if (document.querySelector('#chosenDice').innerHTML === 'd10') {
        dice = 10;
    } else if (document.querySelector('#chosenDice').innerHTML === '2d10/4') {
        dice = 25;
    } else if (document.querySelector('#chosenDice').innerHTML === '2d10/2') {
        dice = 50;
    } else if (document.querySelector('#chosenDice').innerHTML === '2d10') {
        dice = 100;
    } else if (document.querySelector('#chosenDice').innerHTML === 'd20') {
        dice = 20;
    } else if (document.querySelector('#chosenDice').innerHTML === 'd12') {
        dice = 12;
    } else if (document.querySelector('#chosenDice').innerHTML === 'd8') {
        dice = 8;
    } else if (document.querySelector('#chosenDice').innerHTML === 'd6') {
        dice = 6;
    } else if (document.querySelector('#chosenDice').innerHTML === 'd4') {
        dice = 4;
    }

    let result = getRandomInt(dice) + 1
    console.log('Le résultat du lancé du dé est :' + result);
    choiceSelection(result);
};

function diceTextInput() {

};

function choiceSelection(tableRow) {
    if(document.querySelector(".selectedRow") === null){
        console.log("if")
        let selectedRow = document.querySelector('#ligne' + tableRow);
        selectedRow.className = "selectedRow";
    } else {
        console.log("else")

        let previousRow = document.querySelector(".selectedRow");
        previousRow.classList.remove('selectedRow');
        let selectedRow = document.querySelector('#ligne' + tableRow);
        selectedRow.className = "selectedRow";
    }

}

if (rollButton != null) {
    rollButton.addEventListener('click', rollClick); // On passe notre fonction en référence, c’est pourquoi c’est sans parenthèses
};