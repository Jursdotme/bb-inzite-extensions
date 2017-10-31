<dl class="inz-description-list <?php echo $settings->layout_style ?>">
    <?php
    $list_items = $settings->list_items;
    foreach ($list_items as $list_item) : ?>
    <dt><?php echo $list_item->term; ?></dt>
    <dd><?php echo $list_item->description; ?></dd>
    <?php endforeach; ?>
</dl>