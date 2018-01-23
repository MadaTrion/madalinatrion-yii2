<?php
use common\models\Slide;
$slides = Slide::findAllSlides();
?>

<!-- JS
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php if (count($slides)): ?>

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

<?php endif; ?>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker12').datetimepicker({
            inline: true,
            sideBySide: true
        });
    });
</script>
