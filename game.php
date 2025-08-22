<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Guessing Game</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-700 dark min-h-screen text-white">
<div class="w-full p-6 bg-gray-800">
    <h1 class="text-2xl font-bold text-center mb-4">Game Settings</h1>
    <div class="w-full flex gap-2 justify-center">
        <form id="settings-form">

            <div class="mb-3">
                <input type="radio" name="game-type-selector" id="game-type-mode" value="options-mode" class="disabled:opacity-50" checked>
                <label for="game-type-mode" class="mr-2">Mode</label>
                <input type="radio" name="game-type-selector" id="game-type-custom" value="options-custom" class="disabled:opacity-50">
                <label for="game-type-custom" class="mr-5">Custom</label>

                <input type="checkbox" name="allow-duplicates-checkbox" id="allow-duplicates-checkbox" class="disabled:opacity-50">
                <label for="allow-duplicates-checkbox">Allow duplicate guesses</label>

            </div>

            <div id="options-custom" class="hidden">
                <input id="input-title" type="text" placeholder="Game Title" class="border p-2 w-40 bg-gray-900 disabled:opacity-50">
                <input id="input-min-range" type="text" placeholder="Min Range" class="border p-2 w-24 bg-gray-900 disabled:opacity-50">
                <input id="input-max-range" type="text" placeholder="Max Range" class="border p-2 w-24 bg-gray-900 disabled:opacity-50">
                <input id="input-max-attempts" type="text" placeholder="Attempts" class="border p-2 w-24 bg-gray-900 disabled:opacity-50">
            </div>

            <div id="options-mode" class="inline">
                <select name="game-level" id="game-level" class="border p-2 w-40 bg-gray-900 disabled:opacity-50">
                    <option data-min-range="1" data-max-range="10" data-attempts="10" value="easy">Easy</option>
                    <option data-min-range="1" data-max-range="20" data-attempts="7" value="medium">Medium</option>
                    <option data-min-range="1" data-max-range="100" data-attempts="5" value="hard">Hard</option>
                </select>
            </div>


            <button name="play-game" id="play-game" class="bg-blue-500 hover:bg-blue-700 disabled:bg-blue-500 disabled:opacity-50 font-bold py-2 px-4">
                Play Game
            </button>
            <button name="clear-game" id="clear-game" class="bg-gray-500 hover:bg-gray-700 disabled:bg-gray-500 disabled:opacity-50 font-bold py-2 px-4">
                Clear
            </button>
        </form>
    </div>
</div>
<div id="game-area" class="w-full p-6 bg-gray-900 mt-6 hidden">
    <h2 class="text-xl font-bold text-center mb-4">Make a Guess</h2>

    <div class="flex justify-center items-center gap-2 mb-4">
        <input id="guess-input" type="number" class="border p-2 w-32 bg-gray-800" placeholder="Your guess">
        <button id="submit-guess" class="bg-blue-500 hover:bg-blue-700 disabled:bg-blue-500 disabled:opacity-50 font-bold py-2 px-4">
            Submit
        </button>
        <button id="end-game" class="bg-red-500 hover:bg-red-700 disabled:bg-red-500 disabled:opacity-50 font-bold py-2 px-4">
            Quit
        </button>
    </div>

    <div id="guess-feedback" class="text-center text-sm text-yellow-400 mb-2"></div>

    <div id="guesses-list" class="text-center">
        <h3 class="text-lg font-semibold mb-2">Your Guesses:</h3>
        <ul id="guess-history" class="list-disc list-inside text-sm text-gray-300">
        </ul>
    </div>
</div>

<script src="game.js" type="module"></script>
<script src="game-ui.js" type="module"></script>
<script src="game-listeners.js" type="module"></script>

</body>
</html>