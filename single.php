<?php
get_header(); ?>
<main id="primary-content">

<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <?php kroppsam_post_categories(); ?>

            <?php get_template_part( 'template-parts/image-hero' ); ?>

            <div class="entry-header-single">
                <?php 
                echo get_the_tag_list('<span class="eyebrow">', ', ', '</span> '); 
                ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php
            wp_link_pages( array(
                'before' => '<nav aria-label="' . esc_attr__( 'Sidor', 'samkropp' ) . '">',
                'after'  => '</nav>',
            ) );
            ?>
        </article>
        
        <nav class="navigation post-navigation">
            <?php if ( get_previous_post() ) : ?>
                <div class="nav-previous">
                    <span class="nav-subtitle"><?php esc_html_e( '← Föregående artikel', 'samkropp' ); ?></span>
                    <h2 class="nav-title"><?php previous_post_link( '%link', '%title' ); ?></h2>
                </div>
            <?php endif; ?>

            <?php if ( get_next_post() ) : ?>
                <div class="nav-next">
                    <span class="nav-subtitle"><?php esc_html_e( 'Nästa artikel →', 'samkropp' ); ?></span>
                    <h2 class="nav-title"><?php next_post_link( '%link', '%title' ); ?></h2>
                </div>
            <?php endif; ?>
        </nav>

    <?php endwhile;
endif; ?>
</main>
<?php get_footer(); ?>