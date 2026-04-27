<?php
/**
 * Template part för att visa bilder med suddig bakgrund (Aspect Ratio 16:9)
 * Används i index.php, page-all.php och single.php
 */
if ( has_post_thumbnail() ) : 
    $thumb_id = get_post_thumbnail_id();
    $meta = wp_get_attachment_metadata($thumb_id);
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
    
    // Hämta bildtexten (Caption) från mediabiblioteket
    $caption = get_post_field('post_excerpt', $thumb_id);
    
    // Kolla om bilden är stående
    $is_portrait = false;
    if ( isset($meta['width'], $meta['height']) && $meta['height'] > $meta['width'] ) {
        $is_portrait = true;
    }
    
    $container_class = $is_portrait ? 'glass-container is-portrait' : 'glass-container is-landscape';
    ?>

    <?php 
        // Skapa en extra klass om det finns text
        $caption_class = !empty($caption) ? 'has-text' : 'is-empty'; 
        ?>

        <figure class="hero-figure">
            <div class="<?php echo esc_attr($container_class); ?>">
                <div class="glass-background" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
                <?php the_post_thumbnail('large', ['class' => 'glass-foreground']); ?>
            </div>

            <figcaption class="hero-caption <?php echo $caption_class; ?>">
                <?php echo wp_kses_post($caption); ?>
            </figcaption>
        </figure>

<?php endif; ?>



