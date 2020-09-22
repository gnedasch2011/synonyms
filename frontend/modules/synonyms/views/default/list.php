<?php

echo $this->render('@app/views/block/_output_block/_words_table.php', [
    'synonymsFindAll' => $synonymsFindAll,
]);