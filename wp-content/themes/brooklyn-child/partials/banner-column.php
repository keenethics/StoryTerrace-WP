<?php
/** 
 * Banner column image part
 */

$image_field = $args['image_field'] ?? '';
$image_size = $args['image_size'] ?? get_image_size();
$image_class = $args['image_class'] ?? '';
?>

<div class="banner__col">
    <div class="banner__cell">
        <?php 
            get_template_part( 
                'partials/banner', 'column-image', 
                array( 
                    'image_field' => $image_field,
                    'image_size' => $image_size,
                    'image_class' => $image_class
                ) 
            ); 
        ?>
    </div>
</div>