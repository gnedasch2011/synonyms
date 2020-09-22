<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <ul>

        <?php foreach ($items as $item): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <li>
                    <a title="<?= $item['name'] ?? ''; ?>" href="<?= $item['url'] ?? ''; ?>"
                       class="accent"><?= $item['name'] ?? ''; ?></a>
                </li>
            </div>
        <?php endforeach; ?>
    </ul>
</div>