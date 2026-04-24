<?php
/*
Template Name: Lista alla inlägg
*/
get_header(); ?>

<main id="primary-content">
    <ul class="all-posts-grid"> 
        <?php
        $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        );

        $all_posts_query = new WP_Query($args);

        if ($all_posts_query->have_posts()) :
            while ($all_posts_query->have_posts()) : $all_posts_query->the_post(); ?>
                
                <li class="post-card"> 
<!--
                    <div class="card-image">
                        <?php /* get_template_part( 'template-parts/image-hero' ); */ ?> 
                    </div>
-->
                <div class="card-content">
                    <div class="card-meta"> <?php kroppsam_post_categories( 'theme-small' ); ?>

                        <?php
                        $tags = get_the_tags();
                        if ( ! empty( $tags ) ) {
                            echo '<span class="category-wrapper-small">'; 
                            echo implode( ', ', wp_list_pluck( $tags, 'name' ) );
                            echo '</span>';
                        }
                        ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="article-header-link">
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                    </a>
                </div>

                </li>

            <?php endwhile;
            wp_reset_postdata(); 
        endif; ?>
    </ul>
</main>

<?php get_footer(); ?>