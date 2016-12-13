<script src="../../public/js/gallery.js"></script>

<div class="row">
    <?php $counter = 1;
    foreach ($images as $image) { ?>
    <div class="column">
        <img src="public/img/thumbs_small/<?php echo ($image['id'] . "." . $image['extension'])?>" id="index<?php echo $counter++ ?>)" class="hover-shadow" width="100" height="100" alt="<?php echo $image["title"] ?>">
    </div>
    <?php }?>
</div>

<div id="galleryModal" class="galleryModal">
    <span class="closeGalleryCursor">&times;</span>
    <div class="galleryContent">

        <?php $counter = 1;
        foreach ($images as $image) { ?>
            <div class="gallerySlides">
                <div class="numbertext"><?php echo $counter++; echo ' / ' . count($images) ?></div>
                <img src="public/img/originals/<?php echo ($image['id'] . "." . $image['extension'])?>"  style="width:100%">
            </div>
        <?php }?>

        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <?php $counter = 1;
        foreach ($images as $image) { ?>
            <div class="column">
                <img class="demo" src="public/img/thumbs_small/<?php echo ($image['id'] . "." . $image['extension'])?>" id="demo<?php echo $counter++ ?>" alt="<?php echo $image["title"] ?>">
            </div>
        <?php }?>
    </div>
</div>