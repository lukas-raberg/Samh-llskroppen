<?php
/*
Template Name: Lista alla inlägg
*/
get_header(); ?>

<main id="primary-content">
    <ul class="all-posts-list">
        <?php
        $args = array(
            'post_type'          => 'post',
            'post_status'        => 'publish',
            'posts_per_page'     => -1, 
            'orderby'            => 'menu_order', 
            'order'              => 'ASC',
            'ignore_custom_sort' => false,
        );

        $all_posts_query = new WP_Query($args);

        if ($all_posts_query->have_posts()) :
            while ($all_posts_query->have_posts()) : $all_posts_query->the_post(); ?>
                
                <li class="list-all">
                    
                    <?php 
                    kroppsam_post_categories(); 
                    ?>

                    <?php
                    $tags = get_the_tags();
                    if ( ! empty( $tags ) ) {
                        echo '<span class="category-wrapper-small">'; 
                            $tag_output = array();
                            foreach ( $tags as $tag ) {
                                $tag_output[] = esc_html( $tag->name );
                            }
                            echo implode( ', ', $tag_output );
                        echo '</span>';
                    }
                    ?>

                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="article-header-link">
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                    </a>

                </li>

            <?php endwhile;
            wp_reset_postdata(); 
        else : ?>
            <p>Inga inlägg hittades.</p>
        <?php endif; ?>
    </ul>
</main>

<?php get_footer(); ?>