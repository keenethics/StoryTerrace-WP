<?php
/** 
 * Banner column part
 */

$image_field = $args['image_field'] ?? '';
$image_size = $args['image_size'] ?? get_image_size();
$image_class = $args['image_class'] ?? '';

if ($image_field) {
    echo wp_get_attachment_image($image_field['id'], $image_size, '', array('class' => 'banner__art ' . $image_class));
}
