<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h2>Поиск синонимов к слову <?= $searchQuery; ?></h2>
</div>
<?php

echo $this->render('@app/views/block/_output_block/_words_table.php', [
    'items' => $synonymsFindAll,
]);
?>

<?php if ($synonymsWithTheSameStart): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Синонимы с тем же началом</h3>
    </div>

    <?php
    if ($synonymsWithTheSameStart) {
        echo $this->render('@app/views/block/_output_block/_words_table.php', [
            'items' => $synonymsWithTheSameStart,
        ]);
    } ?>
<?php endif; ?>

<?php if ($synonymsWithTheSameFinal): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Синонимы с тем же окончанием</h3>
    </div>

    <?php
    if ($synonymsWithTheSameFinal) {
        echo $this->render('@app/views/block/_output_block/_words_table.php', [
            'items' => $synonymsWithTheSameFinal,
        ]);
    } ?>
<?php endif; ?>

<?php if (isset($synonymsInOneLine) && $synonymsInOneLine): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Синонимы в одну строку</h3>
    </div>

    <?php
    if ($synonymsInOneLine) {
        echo $synonymsInOneLine;
    } ?>
<?php endif; ?>

