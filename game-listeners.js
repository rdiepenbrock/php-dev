// Modules
import { ui, init } from './game-ui.js';

await init();

document.addEventListener('game:over', function(e) {
    const secretNumber = e.detail.secretNumber;

    ui.showFeedback(`Game over! The secret number is ${secretNumber}.`);
    ui.settings.disabled = false;
    ui.gameArea.disabled = true;
});

document.addEventListener('game:guess', function(e) {
    const {guess, result, remainingAttempts} = e.detail;

    const json = JSON.stringify(e.detail);

    const obj = JSON.parse(json);

    ui.updateHistory(`${guess} is ${result}`);
    ui.showFeedback(`You have ${remainingAttempts} remaining attempts.`);
});

document.addEventListener('ui:submit-guess', async function(e) {
    const {guess, game} = e.detail;

    if (isNaN(guess) || guess < game.minRange || guess > game.maxRange) {
        ui.showFeedback(`Please enter a valid number from 
            ${game.minRange} and ${game.maxRange}`);

        ui.resetGuess();
        return;
    }

    await game.checkGuess(guess);

    ui.resetGuess();
});

document.addEventListener('ui:end-game', function() {
    ui.settings.disabled = false;
});