<?php

/** @var Car $car */

use App\Models\Car;
use App\View;

View::includeTemplate('layout/header.php', [
        'title' => "$car->name",
        'pageTitle' => 'QSOFT учебный сайт - Каталог - ' . $car->name,
        'currentPage' => 'catalog'
    ]);
?>

<img
        class="w-full h-full"
        src="<?=$car->image ? htmlspecialchars($car->image) : '/assets/images/no_image.png'?>"
        alt="<?=htmlspecialchars($car->name)?>">
<div class="px-6 py-4 space-y-2">
    <div class="text-black font-bold text-xl">Цена:</div>
    <p class="text-grey-darker text-base">
        <span
            class="inline-block">
            <?php View::includeTemplate('blocks/price.php', ['price' => $car->price])?>
        </span>
        <?php if ($car->old_price) { ?>
            <span
                class="inline-block line-through pl-6 text-gray-400">
                <?php View::includeTemplate('blocks/price.php', ['price' => $car->old_price])?>
            </span>
        <?php } ?>
    </p>
    <div class="mb-2">
        <span class="text-black font-bold text-xl">
            Категория:
        </span>
        <?=htmlspecialchars($car->category->name)?>
    </div>
    <div class="mb-2">
        <span class="text-black font-bold text-xl">
            Доступные цвета:
        </span>
        <?=htmlspecialchars($car->colors->pluck('name')->implode(','))?>
    </div>
    <form class="block">
        <button type="submit" class="inline-block bg-red-600 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
            Купить
        </button>
    </form>
</div>

<?php View::includeTemplate('layout/footer.php');?>

