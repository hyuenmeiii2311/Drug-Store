<div class="row mt-5">
    <div class="col-md-12 text-center">
        <div class="site-block-27">
            <ul>
                <?php if ($data['current_page'] != 1) : ?>
                    <li><a href="<?= ROOT ?>shop?page=<?= $data['current_page'] - 1 ?>">&lt;</a></li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $data['total_page']; $i++) { ?>
                    <li <?= ($data['current_page'] == $i) ? 'class="active"' : '' ?>><a href="<?= ROOT ?>shop?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <?php if ($data['total_page'] > $data['current_page']) : ?>
                    <li><a href="<?= ROOT ?>shop?page=<?= $data['current_page'] + 1 ?>">&gt;</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>