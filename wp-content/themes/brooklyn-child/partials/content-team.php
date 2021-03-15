<?php

/**
 * The template used for displaying team card in page.php
 *
 * @package unitedthemes
 */

?>

<div class="col-xs-12 col-sm-6 col-md-4">
    <div class="content-wrapper">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>">
            <?php echo '<img class="alignnone size-full" width="300" height="220" src="' . catch_first_image() . '" alt="' . get_the_title() . '" />';?>
        </a>
        <div class="inner-content-wrap">
            <h2><?php the_title(); ?></h2>
            <h3><?php echo catch_team_member_role() ?></h3>
            <?php the_excerpt(); ?>
            <a target="_self" class="ut-btn dark small" href="<?php the_permalink(); ?>"><?php _e('Read more', 'storyterrace') ?></a>
        </div>
    </div>
</div>