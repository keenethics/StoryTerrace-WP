<?php
/**
 * ZIP search form part
 */

$container_class = $args['container_class'] ?? '';
$form_id = $args['form_id'] ?? 'zipcode';
$data_redirect = $args['data_redirect'] ?? '';
$input_class = $args['input_class'] ?? 'zipc';
$search_placeholder = $args['search_placeholder'] ?? '';
$search_button_text = $args['search_button_text'] ?? '';
?>

<div class="writer-search <?php echo $container_class; ?>">
    <form id="<?php echo $form_id; ?>" class="writer-search-form" data-redirect="<?php echo $data_redirect; ?>">
        <div class="input-group">
            <input class="<?php echo $input_class; ?>" type="text" placeholder="<?php echo $search_placeholder; ?>">
            <input type="submit" value="<?php echo $search_button_text; ?>">
        </div>
    </form>
</div>