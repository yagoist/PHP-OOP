<?php

/** @var array $category */

use App\View;

View::includeTemplate('layout/header.php', [
    'title' => 'Добавление машины',
    'pageTitle' => 'QSOFT учебный сайт - Добавление машины',
    'currentPage' => 'create']);
?>

<form action="/addCar" method="post">
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <div class="block">
                <label for="name" class="text-gray-700 font-bold">Название машины</label>
                <input id="name"
                       type="text"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       name="name"
                       placeholder="">
            </div>
            <div class="block">
                <label for="price" class="text-gray-700 font-bold">Цена</label>
                <input id="price"
                       type="text"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       name="price"
                       placeholder="">
            </div>

                <label for="category" class="text-gray-700 font-bold">Тип Кузова</label>
                <select id="category"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name='category'
                >
                   <?php
                    foreach ($category as $item) { ?>
                        <option><?=$item['name']?></option>
                    <?php } ?>
                </select>
        </div>
        <div class="block">
            <button type="submit" class="inline-block bg-red-600 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                Сохранить
            </button>
            <button type="reset" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                Отменить
            </button>
        </div>
    </div>
</form>

<?php View::includeTemplate('layout/footer.php');?>
