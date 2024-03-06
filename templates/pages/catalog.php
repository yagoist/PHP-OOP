<?php

/** @var Collection $cars */

use App\View;
use Illuminate\Database\Eloquent\Collection;

View::includeTemplate('layout/header.php', [
        'title' => 'Каталог',
        'pageTitle' => 'QSOFT учебный сайт - Каталог',
        'currentPage' => 'catalog'
    ]);

View::includeTemplate('blocks/cars_catalog.php', ['cars' => $cars]);

View::includeTemplate('layout/footer.php');

