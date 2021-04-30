<?php get_header(); ?>
<div class="search-page-inner">
    <div class="search-header">
  		<h1><span><?php esc_html_e( 'Search results for', 'rebeccalite' ); ?>:&nbsp;</span><?php echo get_search_query(); ?></h1>
    </div>
    <?php
        if ( have_posts() ) {
            ?>
            <div class="rebeccalite-blog blog-3cols-grid">
                <div class="row">
                    <?php
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <article <?php post_class( 'col-sm-6 col-md-4 post-small' ); ?>>                
                            <?php if ( get_the_post_thumbnail() ) { ?>
                            <a class="entry-image" href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>                    
                            <?php } ?>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink() ?>">
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
        } else {
            get_template_part( 'template-parts/content', 'none' );
        }
    ?>
</div>
<?php get_footer(); ?>
