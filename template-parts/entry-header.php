<?php
/**
 * Template part för titeln och taggar (eyebrow)
 */
$title_tag = is_singular() ? 'h2' : 'h2';
?>

<div class="entry-header-content">
    <?php if ( ! is_singular() ) : ?>
        <a href="<?php the_permalink(); ?>" class="article-header-link">
    <?php endif; ?>

        <?php echo get_the_tag_list('<span class="eyebrow">', ', ', '</span> '); ?>
        
        <<?php echo $title_tag; ?> class="entry-title">
            <?php the_title(); ?>
        </<?php echo $title_tag; ?>>

    <?php if ( ! is_singular() ) : ?>
        </a>
    <?php endif; ?>
</div>