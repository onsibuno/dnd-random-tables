console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

let rollButton = document.querySelector('#diceRoll');
let chosenDice = document.querySelector('#chosenDice').innerHTML;

console.log(chosenDice);

function rollClick() {
    let dice = 1;
    if (document.querySelector('#chosenDice').innerHTML === 'd12') {
        dice = 12;
    } else if (document.querySelector('#chosenDice').innerHTML === 'd10') {
        dice = 10;
    }

    console.log('Le résultat du lancé du dé est :' + dice);
}

function diceTextInput() {

}

if (rollButton != null) {
    rollButton.addEventListener('click', rollClick); // On passe notre fonction en référence, c’est pourquoi c’est sans parenthèses
}