<?php

/** @var array $messages */

?>

<?php if (! empty($messages ?? [])) {?>
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg"
             role="alert">
            <?php foreach ($messages as $message) {?>
                <p><?=htmlspecialchars($message)?></p>
            <?php }?>
        </div>
    </div>
<?php }?>
