<?php
get_header(); ?>
<main id="primary-content">

<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'start' ); ?>>

         <?php kroppsam_post_categories( 'theme' ); ?>

        <?php get_template_part( 'template-parts/image-hero' ); ?>
            
        <?php get_template_part( 'template-parts/entry-header' ); ?>

        <?php the_excerpt(); ?> 

        </article>

    <?php endwhile; ?>

<?php endif; ?>
</main>
<?php get_footer(); ?>
