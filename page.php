<?php
get_header(); ?>
<main id="primary-content">

<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><?php the_title(); ?></h2>
            <?php if ( is_page('integritetspolicy') ) : ?>
                <p class="last-updated">
                    Senast uppdaterad: <?php the_modified_date('Y-m-d'); ?>
                </p>
            <?php endif; ?>
            <?php the_content(); ?>
            <?php
            wp_link_pages( array(
                'before' => '<nav aria-label="' . esc_attr__( 'Page' ) . '">',
                'after'  => '</nav>',
            ) );
            ?>
        </article>

    <?php endwhile;
endif; ?>
</main>
<?php get_footer(); ?>