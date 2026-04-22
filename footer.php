    <footer>
        <div class="footer-inner">
                <p class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></p>
                <p class="subtitle"><?php bloginfo( 'description' ); ?></p>
                <hr>
                <h2>Manifest?</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <hr>
                <?php
                    wp_nav_menu( array(
                    'theme_location' => 'footer-menu', 
                    'container'      => 'nav',         
                    'fallback_cb'    => false
                ) );
                ?>
                <hr>
                <aside aria-label="Juridisk information">
                    <p>© Rättigheter. Anvsvarig utgivare(?).</p>
                </aside>
        </div>
    </footer>
    <div class="end">
    </div>
    <?php wp_footer(); ?>

</body>
</html>