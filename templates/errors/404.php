<?php

use App\View;

View::includeTemplate('layout/header.php', [
    'title' => '404 - Страница не найдена',
    'pageTitle' => 'QSOFT учебный сайт - Страница не найдена',
    'currentPage' => '404'
]);
?>

<p>Запрошенная Вами страница не существует</p>

<?php View::includeTemplate('layout/footer.php'); ?>
