<?php

/** @var Car $car */

use App\Models\Car;
use App\View;

?>

<div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
        <a class="block w-full h-40"
           href="/catalog/<?=htmlspecialchars($car->id)?>">
            <img
                class="w-full h-full hover:opacity-90 object-cover"
                src="<?=$car->image ? htmlspecialchars($car->image) : '/assets/images/no_image.png'?>"
                alt="<?=htmlspecialchars($car->name)?>">
        </a>
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2">
                <a class="hover:text-red-600"
                   href="/catalog/<?=htmlspecialchars($car->id)?>">
                    <?=htmlspecialchars($car->name)?>
                </a>
            </div>
            <p class="text-grey-darker text-base">
                <span class="inline-block">
                    <?php View::includeTemplate('blocks/price.php', ['price' => $car->price])?>
                </span>
                <?php if ($car->old_price) { ?>
                    <span class="inline-block line-through pl-6 text-gray-400">
                    <?php View::includeTemplate('blocks/price.php', ['price' => $car->old_price]) ?>
                    </span>
                <?php } ?>
            </p>
        </div>
    </div>