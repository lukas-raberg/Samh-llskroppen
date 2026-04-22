<?php
get_header(); ?>
<main id="primary-content">
<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        
        <?php ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'start' ); ?>>

        <?php kroppsam_post_categories(); ?>
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-featured-image">
                <?php the_post_thumbnail('large'); // Options: 'thumbnail', 'medium', 'large', 'full' ?>
            </div>  

        <?php endif; ?>
            
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="article-header-link">
            <?php 
            echo get_the_tag_list('<span class="eyebrow">', ', ', '</span> '); 
            ?>
            <h2 class="entry-title"><?php the_title(); ?></h2>
       </a>

        <?php the_excerpt(); ?> 


        </article>

    <?php endwhile; ?>

<?php endif; ?>
</main>
<?php get_footer(); ?>
