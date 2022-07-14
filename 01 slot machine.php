<?php


$player = readline('Enter your name: ');
$wallet = (float) readline('How much money do you want to spend on gambling? ');
$symbols = explode( ' ', readline('Choose 5 symbols for your slot machine: '));

$screen = [
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

$winCombinations = [
    [
        [0, 0], [0, 1], [0, 2],[0, 3], [0, 4]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3], [1, 4]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3], [2, 4]
    ],
    [
        [0, 0], [1, 1], [2, 2], [1, 3], [0, 4]
    ],
    [
        [2, 0], [1, 1], [0, 2], [1, 3], [2, 4]
    ],
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [0, 1], [0, 2],[0, 3]
    ],
    [
        [0, 2],[0, 3], [0, 4]
    ],
    [
        [0, 1], [0, 2],[0, 3], [0, 4]
    ],
    [
        [0, 0], [0, 1], [0, 2],[0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [1, 1], [1, 2], [1, 3]
    ],
    [
        [1, 2], [1, 3], [1, 4]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [1, 1], [1, 2], [1, 3], [1, 4]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [2, 1], [2, 2], [2, 3]
    ],
    [
        [2, 2], [2, 3], [2, 4]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3]
    ],
    [
        [2, 1], [2, 2], [2, 3], [2, 4]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [1, 1], [2, 2], [1, 3]
    ],
    [
        [2, 2], [1, 3], [0, 4]
    ],
    [
        [0, 0], [1, 1], [2, 2], [1, 3]
    ],
    [
        [1, 1], [2, 2], [1, 3], [0, 4]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ],
    [
        [1, 1], [0, 2], [1, 3]
    ],
    [
        [0, 2], [1, 3], [2, 4]
    ],
    [
        [2, 0], [1, 1], [0, 2], [1, 3]
    ],
    [
        [1, 1], [0, 2], [1, 3], [2, 4]
    ],

];

function displayScreen(array $screen): void
{
    foreach ($screen as $item) {
        foreach ($item as $value) {
            echo "  $value  ";
        }
        echo PHP_EOL;
    }
}

function isWinning(array $winCombinations, array $screen): array
{
    $combinationCheck = [];
    foreach ($winCombinations as $key => $combination) {
        foreach ($combination as $value => $item) {
            [$row, $column] = $item;
            $combinationCheck[$key][$value] = $screen[$row][$column];
        }
    }
    $winning = [];
    foreach ($combinationCheck as $combination) {
        if (count(array_unique($combination)) === 1) {
            $winning[] = $combination[0];
        }
    }
    return $winning;
}

function reward(array $winCombinations, float $bet): float
{
    $wonAmount = 0;
    foreach ($winCombinations as $line) {
        switch ($line) {
            case $winCombinations[0]:
                $wonAmount += strlen($winCombinations[0]) * 1.50 * $bet;
                break;
            case $winCombinations[1]:
                $wonAmount += count($winCombinations[1]) * 1.50 * $bet;
                break;
            case $winCombinations[2]:
                $wonAmount += count($winCombinations[2]) * 1.50 * $bet;
                break;
            case $winCombinations[3]:
                $wonAmount += count($winCombinations[3]) * 1.50 * $bet;
                break;
            case $winCombinations[4]:
                $wonAmount += count($winCombinations[4]) * 1.50 * $bet;
                break;
            case $winCombinations[5]:
                $wonAmount += count($winCombinations[5]) * 1.30 * $bet;
                break;
            case $winCombinations[6]:
                $wonAmount += count($winCombinations[6]) * 1.30 * $bet;
                break;
            case $winCombinations[7]:
                $wonAmount += count($winCombinations[7]) * 1.30 * $bet;
                break;
            case $winCombinations[8]:
                $wonAmount += count($winCombinations[8]) * 1.40 * $bet;
                break;
            case $winCombinations[9]:
                $wonAmount += count($winCombinations[9]) * 1.40 * $bet;
                break;
            case $winCombinations[10]:
                $wonAmount += count($winCombinations[10]) * 1.30 * $bet;
                break;
            case $winCombinations[11]:
                $wonAmount += count($winCombinations[11]) * 1.30 * $bet;
                break;
            case $winCombinations[12]:
                $wonAmount += count($winCombinations[12]) * 1.30 * $bet;
                break;
            case $winCombinations[13]:
                $wonAmount += count($winCombinations[13]) * 1.40 * $bet;
                break;
            case $winCombinations[14]:
                $wonAmount += count($winCombinations[14]) * 1.40 * $bet;
                break;
            case $winCombinations[15]:
                $wonAmount += count($winCombinations[15]) * 1.30 * $bet;
                break;
            case $winCombinations[16]:
                $wonAmount += count($winCombinations[16]) * 1.30 * $bet;
                break;
            case $winCombinations[17]:
                $wonAmount += count($winCombinations[17]) * 1.30 * $bet;
                break;
            case $winCombinations[18]:
                $wonAmount += count($winCombinations[18]) * 1.40 * $bet;
                break;
            case $winCombinations[19]:
                $wonAmount += count($winCombinations[19]) * 1.40 * $bet;
                break;
            case $winCombinations[20]:
                $wonAmount += count($winCombinations[20]) * 1.30 * $bet;
                break;
            case $winCombinations[21]:
                $wonAmount += count($winCombinations[21]) * 1.30 * $bet;
                break;
            case $winCombinations[22]:
                $wonAmount += count($winCombinations[22]) * 1.30 * $bet;
                break;
            case $winCombinations[23]:
                $wonAmount += count($winCombinations[23]) * 1.40 * $bet;
                break;
            case $winCombinations[24]:
                $wonAmount += count($winCombinations[24]) * 1.40 * $bet;
                break;
            case $winCombinations[25]:
                $wonAmount += count($winCombinations[25]) * 1.30 * $bet;
                break;
            case $winCombinations[26]:
                $wonAmount += count($winCombinations[26]) * 1.30 * $bet;
                break;
            case $winCombinations[27]:
                $wonAmount += count($winCombinations[27]) * 1.30 * $bet;
                break;
            case $winCombinations[28]:
                $wonAmount += count($winCombinations[28]) * 1.40 * $bet;
                break;
            case $winCombinations[29]:
                $wonAmount += count($winCombinations[29]) * 1.40 * $bet;
                break;
            default:
                break;
        }
    }
    return $wonAmount;
}

while (true) {
    echo "1 = place my bet" . PHP_EOL;
    echo "2 = check my balance" . PHP_EOL;
    echo "3 = quit!" . PHP_EOL;

    $option = (float) readline('Select your choice: ');

    switch ($option) {
        case 1:
            echo "Thank you! Now it is time to play!" . PHP_EOL;
            echo "You have {$wallet} EUR in your wallet" . PHP_EOL;
            echo "Choose your bet:" . PHP_EOL;
            echo "0.10" . PHP_EOL;
            echo "0.15" . PHP_EOL;
            echo "0.20" . PHP_EOL;

            $bet = (float) readline("Enter your bet: ");
            if($bet == null || $bet <= 0){
                echo "Make your bet! " . PHP_EOL . PHP_EOL;
                break;
            }
            if($bet > $wallet){
                echo "You don't have that much money " . PHP_EOL . PHP_EOL;
                break;
            }
            readline("Now press the enter to spin!");
            $wallet -= $bet;

            foreach ($screen as $spinKey => $combination) {
                foreach ($combination as $spinValue => $item) {
                    $screen[$spinKey][$spinValue] = $symbols[array_rand($symbols)];
                }
            }

            displayScreen($screen);

            $result = isWinning($winCombinations, $screen);

            if ($result > 0) {
                $prize = reward($result, $bet);
                $wallet += $prize;
                echo "{$player}, you have won {$prize} EUR, your current balance is {$wallet} EUR" . PHP_EOL . PHP_EOL;
            }
            break;
        case 2:
            echo "Your current balance is {$wallet} EUR" . PHP_EOL . PHP_EOL;
            break;
        default:
            exit;
    };
}
