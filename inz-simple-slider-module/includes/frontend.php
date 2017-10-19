<div class="inz-simple-slider">
    <?php
    $slides = $settings->form_field;
    foreach ($slides as $slide) : ?>
    <div class="inz-simple-slider__item-container" data-inz-lazy="<?php echo $slide->background_src; ?>">
        <div class="inz-simple-slider__item"  >
            <div class="inz-simple-slider__caption">
                <?php echo $slide->caption; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php //echo($settings->slide_styling); ?>
