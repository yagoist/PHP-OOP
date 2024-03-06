<?php

/** @var bool $isAuthorized */

$currentPage = $currentPage ?? 'home';

$menu = [
    'home' => [
        'title' => 'Главная',
        'href' => '/',
        'auth' => false
    ],
    'catalog' => [
        'title' => 'Каталог',
        'href' => '/catalog/',
        'auth' => false
    ],
    'admin' => [
        'title' => 'Административный раздел',
        'href' => '/admin/',
        'auth' => true
    ],
];
?>

<div class="border-b">
    <div class="container mx-auto overflow-hidden px-4 sm:px-6">
        <section class="bg-white py-4">
            <ul class="list-inside bullet-list-item flex flex-wrap -mx-5 -my-2">
                <?php foreach ($menu as $name => $item) {
                    if ($item['auth'] && ! $isAuthorized) {
                        continue;
                    }?>
                        <li class="px-5 py-2">
                            <a class="<?=$currentPage === $name ? 'text-red-600 cursor-default' : 'text-gray-600 hover:text-red-600'?> "
                               href="<?= htmlspecialchars($item['href']) ?>">
                                <?= htmlspecialchars($item['title']) ?>
                            </a>
                        </li>
                <?php } ?>
            </ul>
        </section>
    </div>
</div>
