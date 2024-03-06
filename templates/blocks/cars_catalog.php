<?php

/** @var Collection $cars */

use App\View;
use Illuminate\Database\Eloquent\Collection;

?>

<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
    <?php foreach ($cars as $car) {
        View::includeTemplate('blocks/car_item.php', ['car' => $car]);
    } ?>
</div>