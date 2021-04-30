<?php get_header(); ?>
    <div class="row">
        <div class="col-md-12 col-lg-9">
        <?php
            while ( have_posts() ) {
                the_post();
                ?>
                <article <?php post_class( 'single-post-inner' ); ?>>
                    <div class="entry-header">
                        <h1 class="entry-title">
                            <?php the_title(); ?>
                        </h1>
                        <div class="entry-meta">
                            <div class="entry-date"><?php echo  get_the_date(); ?></div>
                            <div class="entry-categories"><?php the_category( '<span class="sep">/</span>' ); ?></div>
                        </div>
                    </div>
                    <?php if ( get_the_post_thumbnail() ) { ?>
                    <div class="entry-image" href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail( 'rebeccalite-post-full' ); ?>
                    </div>
                    <?php } ?>
                    <div class="entry-content clearfix">
                        <?php
                            the_content();
                            wp_link_pages();
                        ?>
                    </div>
                    <?php
                        if ( function_exists( 'rebecca_lite_share' ) ) {
                            rebecca_lite_share();
                        }
                    ?>
                    <?php if ( get_the_tags() ) { ?>
                    <div class="entry-tags">
                        <?php the_tags( '',' ' ); ?>
                    </div>
                    <?php } ?>
                    <?php get_template_part( 'template-parts/single-post', 'author' ); ?>
                    <?php comments_template( '', true );  ?>
                </article>
                <?php get_template_part( 'template-parts/single-post', 'related' ); ?>
                <?php
            }
        ?>
        </div>
        <?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
        <div class="col-lg-3 col-md-12 sidebar">
            <?php
                get_sidebar();
            ?>
        </div>
        <?php } ?>
    </div>
<?php get_footer(); ?>
