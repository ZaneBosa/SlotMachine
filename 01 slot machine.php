<?php

$player = readline('Enter your name: ');
$wallet = (int) readline('How much money in your bank account? ');
$symbols = explode( ' ', readline('Choose your slot machine symbols: '));

$board = [
    ['-', '-', '-', '-', '-'],
    ['-', '-', '-', '-', '-'],
    ['-', '-', '-', '-', '-'],
];

$coordinates = [
    [
        [0, 0], [0, 1], [0, 2], [0, 3], [0, 4]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3], [1, 4]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3], [2, 4]
    ],

];

function winnerCombinations(string $player, array $board): bool
{
    if ($board[0][0] === $player && $board[0][1] === $player && $board[0][2] === $player && $board[0][3] === $player && $board[0][4] === $player) {
        return true;
    }
    if ($board[1][0] === $player && $board[1][1] === $player && $board[1][2] === $player && $board[1][3] === $player && $board[1][4] === $player) {
        return true;
    }
    if ($board[2][0] === $player && $board[2][1] === $player && $board[2][2] === $player && $board[2][3] === $player && $board[2][4] === $player) {
        return true;
    }
    if ($board[0][0] === $player && $board[1][1] === $player && $board[2][2] === $player && $board[1][3] === $player && $board[0][4] === $player) {
        return true;
    }
    if ($board[2][0] === $player && $board[1][1] === $player && $board[0][2] === $player && $board[1][3] === $player && $board[2][4] === $player) {
        return true;
    }
    return false;
}

function showBoard(array $board): void
{
    foreach ($board as $item) {
        foreach ($item as $value) {
            echo "  $value  ";
        }
        echo PHP_EOL;
    }
}

while (true) {
    echo '1 - I want to place my bet' . PHP_EOL;
    echo '2 - I want to check my balance.' . PHP_EOL;
    echo '3 - I want to quit!' . PHP_EOL;

    $option = (int) readline('Select your choice: ');

    switch ($option) {
        case 1:
            echo "Thank you! Now it is time to play!" . PHP_EOL;
            echo "You have {$wallet} EUR in your wallet" . PHP_EOL;

            $bet = (int) readline("Enter your bet: ");
            if($bet == null || $bet <= 0){
                echo "Make your bet! " . PHP_EOL . PHP_EOL;
                break;
            }
            if($bet > $wallet){
                echo "You don't have that much money " . PHP_EOL . PHP_EOL;
                break;
            }
            readline("Good luck! Now press the enter to spin!");
            $wallet -= $bet;

            foreach ($board as $itemKey => $item) {
                foreach ($item as $valueKey => $value) {
                    $board[$itemKey][$valueKey] = $symbols[array_rand($symbols)];
                }
            }

            showBoard($board);

            for ($i = 0; $i < count($symbols); $i++) {
                foreach ($coordinates as $coordinate) {
                    foreach ($coordinate as $item) {
                        [$row, $column] = $item;

                        if ($board[$row][$column] !== $symbols[$i]) {
                            break;
                        }

                        if (end($coordinate) === $item) {
                            echo "You have a line of {$symbols[$i]}! {$player}, you have won" . $bet * 0.00032 * 5 . "EUR!!!" . PHP_EOL;
                            $wallet += ($bet * 0.00032 * 5);
                        }
                    }
                }
            };

            echo "{$player}, you didn't win, your current balance is {$wallet} EUR" . PHP_EOL . PHP_EOL;
            break;
        case 2:
            echo "Your current balance is {$wallet} EUR" . PHP_EOL . PHP_EOL;
            break;
        default:
            exit;
    };
}