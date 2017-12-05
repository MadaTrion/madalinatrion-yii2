<?php
use common\models\Slide;
$slides = Slide::findAllSlides();
?>

<!-- JS
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<script>
    $('body').vegas({
        preload:true,
        overlay:true,
        cover:true,
        transition: 'swirlRight',
        transitionDuration: 3000,
        slides: [
            <?php foreach ($slides as $slide): ?>
            { src: 'uploads/images/<?= $slide->image ?>' },
            <?php endforeach; ?>
        ]
    });
</script>