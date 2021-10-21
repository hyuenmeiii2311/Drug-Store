<div class="float-left" style="width:20%;">
    <div class="filter-sidebar-left">
        <!--Categories-->
        <div class="title-left">
            <h3>Categories</h3>
        </div>
        <?php $id = 0; ?>
        <?php if (isset($data['product_mix']) && is_array($data['product_mix'])) : ?>
            <?php foreach ($data['product_mix'] as $mix) : ?>
                <?php $id++; ?>
                <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                    <div class="list-group-collapse sub-men">
                        <?php if (isset($data['category']) && is_array($data['category'])) { ?>
                        <?php $children = array_column($data['category'], "product_mix_id");
                        } ?>
                        <a class="list-group-item list-group-item-action" href="<?= in_array($mix->id, $children) ? '#sub-men'.$mix->id: ROOT. "shop/category/".$mix->id?>"  <?= in_array($mix->id, $children) ? 'data-toggle="collapse"' : '' ?> aria-expanded="false" aria-controls="sub-men<?= $mix->id ?>" id="font-unicode">
                            <?= $mix->name ?>
                            <?php if (in_array($mix->id, $children)) { ?>
                                <span class="badge pull-right" style="float: right;">
                                    <i class="fas fa-caret-down"></i>
                                </span>
                            <?php } ?>
                        </a>
                        <?php foreach ($data['category'] as $cate) : ?>
                            <?php if ($mix->id == $cate->product_mix_id) { ?>
                                <div class="collapse" id="sub-men<?= $mix->id ?>" data-parent="#list-group-men">
                                    <div class="list-group">
                                        <a href="<?= ROOT . "shop/subcategory/". $cate->id?>" class="list-group-item list-group-item-action" id="font-unicode"><?= $cate->name ?> </a>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- //Categories-->

        <br>

        <!--Brands-->
        <div class="title-left">
            <h3>Brand</h3>
        </div>
        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
            <?php if (isset($data['brand']) && is_array($data['brand'])) : ?>
                <?php foreach ($data['brand'] as $item) : ?>
                    <a href="<?= ROOT . "shop/brand/". $item->id?>" class="list-group-item list-group-item-action" id="font-unicode"> <?= $item->name ?> </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!--//Brands-->

    </div>
</div>