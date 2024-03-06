<?php

namespace computer;

class PowerfullComputer
{
    public function __construct(
        private readonly int $memory,
        private readonly int $frequency,
        private readonly string $lovelyProgram
    ) {
    }

    public function executeProgram(string $program): void
    {
        if ($program !== $this->lovelyProgram) {
            echo("Устройство {$this->memory}Gb и {$this->frequency}Ghz выполнил программу: \"$program\"") . PHP_EOL;
        } else {
            echo("Устройство {$this->memory}Gb и {$this->frequency}Ghz выполнил программу: \"$program\" и завис на долгое время...") . PHP_EOL;
        }
    }
}

$firstComputer = new PowerfullComputer(16, 2400, 'Умножение чисел');

$firstComputer->executeProgram('Деление чисел');
$firstComputer->executeProgram('Построение графов');
$firstComputer->executeProgram('Распознавание картинки');
$firstComputer->executeProgram('Рассчет маршрута');
$firstComputer->executeProgram('Умножение чисел');

$secondComputer = new PowerfullComputer(32, 3500, 'Конкатинация строк');


$secondComputer->executeProgram('Преобразование строк в массив');
$secondComputer->executeProgram('Предсказание погоды');
$secondComputer->executeProgram('Вычисление писла Пи');
$secondComputer->executeProgram('Вычисление чисел Фибоначчи');
$secondComputer->executeProgram('Конкатинация строк');
