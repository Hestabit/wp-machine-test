<div class="rebeccalite-post-author">
    <div class="post-author-image">
        <div class="author-img"><?php echo get_avatar( get_the_author_meta('email'), '100' ); ?></div>
    </div>
    <div class="post-author-content">
    	<div class="author-content">
            <h4 class="author-title"><?php the_author(); ?></h4>
    		<div class="author-bio"><?php the_author_meta('description'); ?></div>
    		<?php
                get_template_part( 'template-parts/social' );
            ?>
    	</div>
    </div>
</div>