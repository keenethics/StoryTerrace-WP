<?php

/**
 * The template used for displaying team card in page.php
 *
 * @package unitedthemes
 */
?>

<div class="col-xs-12 col-sm-6 col-md-4">
    <div class="content-wrapper">
        <div class="inner-content-wrap">
            <?php echo get_team_content(150); ?>            
            <a target="_self" class="ut-btn dark small" href="<?php the_permalink(); ?>"><?php _e('Read more', 'storyterrace') ?></a>
        </div>
    </div>
</div>