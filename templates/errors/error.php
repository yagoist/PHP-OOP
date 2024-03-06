<?php

use App\View;

$code = $code ?? 500;
$message = $message ?? 'Опс, что-то пошло не так';

View::includeTemplate('layout/header.php', [
    'title' =>  $code . '- Возникла ошибка',
    'pageTitle' => 'QSOFT учебный сайт - Возникла ошибка',
    'currentPage' => 'error'
]);
?>

<p><?=htmlspecialchars($message)?></p>

<?php View::includeTemplate('layout/footer.php'); ?>

