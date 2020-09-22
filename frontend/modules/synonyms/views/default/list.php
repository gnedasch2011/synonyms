<h2>Поиск синонимов к слову <?= $searchQuery; ?></h2>
<?php

echo $this->render('@app/views/block/_output_block/_words_table.php', [
    'items' => $synonymsFindAll,
]);
?>

<h2>Синонимы с тем же началом <?= $searchQuery; ?></h2>
<?php
if ($synonymsWithTheSameStart) {
    echo $this->render('@app/views/block/_output_block/_words_table.php', [
        'items' => $synonymsWithTheSameStart,
    ]);
}
