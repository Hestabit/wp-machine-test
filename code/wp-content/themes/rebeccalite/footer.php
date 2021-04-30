        </div>
    </div>
    <div class="site-footer">
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
        <div class="footer-ins">
            <?php dynamic_sidebar( 'footer-sidebar' ); ?>
        </div>
        <?php } ?>
        <div class="credits">
            <?php get_template_part( 'template-parts/social' ); ?>
            <div class="copyright">
                <?php echo wp_kses_post( get_theme_mod( 'rebeccalite_footer_copyright', 'Your copyright text here !' ) ); ?>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
