<?php
get_header();
$col        = is_active_sidebar( 'sidebar' ) ? 'col-lg-9' : 'col-lg-12';
$image_size = is_active_sidebar( 'sidebar' ) ? 'rebeccalite-post-small-w-sidebar' : 'rebeccalite-post-small';
?>
<div class="row">
    <div class="<?php echo esc_attr( $col ); ?>">
    <?php
        if ( have_posts() ) {
            ?>
            <div class="rebeccalite-blog rebeccalite-blog-2cols-grid; ?>">
                <div class="row">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <article <?php post_class( 'col-sm-6 post-small' ); ?>>
                            <?php if ( get_the_post_thumbnail() ) { ?>
                            <a class="entry-image" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( $image_size ); ?>
                            </a>
                            <?php } ?>
                            <div class="entry-meta">
                                <div class="entry-date">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_date(); ?>
                                    </a>
                                </div>
                                <div class="entry-categories">
                                    <?php the_category( '<span class="sep">/</span>' ); ?>
                                </div>
                            </div>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="entry-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?>
                            </div>
                        </article>
                        <?php
                    }
                ?>
                </div>
            </div>
            <?php
            the_posts_pagination();
        }
    ?>
    </div>
    <?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
    <div class="col-lg-3 sidebar">
        <?php
            get_sidebar();
        ?>
    </div>
    <?php } ?>
</div>
<?php
get_footer();
