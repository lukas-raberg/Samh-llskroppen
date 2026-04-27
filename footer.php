    <footer>
        <div class="coming-edition">
            <div class="footer-inner">
                Kommande nummer:<br />
                <strong><span class="orange">Rasism, migration och hälsa, 1/11 2026</span></strong>
            </div>
        </div>

        <div class="footer-inner">
                <p class="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></p>
                <p class="subtitle"><?php bloginfo( 'description' ); ?></p>
                <hr>
                <h2>Manifest</h2>
                <p>Samhällskroppen är en progressiv tidskrift för vårdpolitisk debatt som tar sjukvårdspolitikens ödesfrågor till ett tillräckligt djup för att argument ska vässas på riktigt. Tilltalet ska vara tillgängligt för att nå den breda krets av patienter och vårdpersonal som måste ingå en politisk allians om den behovsstyrda och solidariskt finansierade vården ska finnas kvar. Samhällskroppen görs av vårdpersonal och forskare för patienter, vårdarbetare, och allmänhet med engagemang i vårdfrågor.</p>
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