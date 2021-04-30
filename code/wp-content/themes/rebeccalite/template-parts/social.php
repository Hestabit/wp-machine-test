<?php
$show = true;

$facebook   = get_theme_mod('rebeccalite_facebook');
$twitter    = get_theme_mod('rebeccalite_twitter');
$instagram  = get_theme_mod('rebeccalite_instagram');
$pinterest  = get_theme_mod('rebeccalite_pinterest');
$bloglovin  = get_theme_mod('rebeccalite_bloglovin');
$tumblr     = get_theme_mod('rebeccalite_tumblr');
$youtube    = get_theme_mod('rebeccalite_youtube');
$dribbble   = get_theme_mod('rebeccalite_dribbble');
$soundcloud = get_theme_mod('rebeccalite_soundcloud');
$vimeo      = get_theme_mod('rebeccalite_vimeo');
$linkedin   = get_theme_mod('rebeccalite_linkedin');

if ( !$facebook && !$twitter && !$instagram && !$pinterest && !$bloglovin && !$tumblr && !$youtube && !$dribbble && !$soundcloud && !$vimeo && !$linkedin ) {
    $show = false;
}

if ( $show ) { ?>
<div class="social-icons">
    <?php if($facebook) : ?><a class="social-icon" href="<?php echo esc_url($facebook); ?>" ><i class="fab fa-facebook-f"></i></a><?php endif; ?>
    <?php if($twitter) : ?><a class="social-icon" href="<?php echo esc_url($twitter); ?>" ><i class="fab fa-twitter"></i></a><?php endif; ?>
	<?php if($instagram) : ?><a class="social-icon" href="<?php echo esc_url($instagram); ?>" ><i class="fab fa-instagram"></i></a><?php endif; ?>
	<?php if($pinterest) : ?><a class="social-icon" href="<?php echo esc_url($pinterest); ?>" ><i class="fab fa-pinterest-p"></i></a><?php endif; ?>
	<?php if($bloglovin) : ?><a class="social-icon" href="<?php echo esc_url($bloglovin); ?>" ><i class="fa fa-heart"></i></a><?php endif; ?>
	<?php if($tumblr) : ?><a class="social-icon" href="<?php echo esc_url($tumblr); ?>" ><i class="fab fa-tumblr"></i></a><?php endif; ?>
	<?php if($youtube) : ?><a class="social-icon" href="<?php echo esc_url($youtube); ?>" ><i class="fab fa-youtube"></i></a><?php endif; ?>
	<?php if($dribbble) : ?><a class="social-icon" href="<?php echo esc_url($dribbble); ?>" ><i class="fab fa-dribbble"></i></a><?php endif; ?>
	<?php if($soundcloud) : ?><a class="social-icon" href="<?php echo esc_url($soundcloud); ?>" ><i class="fab fa-soundcloud"></i></a><?php endif; ?>
	<?php if($vimeo) : ?><a class="social-icon" href="<?php echo esc_url($vimeo); ?>" ><i class="fab fa-vimeo-square"></i></a><?php endif; ?>
    <?php if($linkedin) : ?><a href="<?php echo esc_url($linkedin); ?>" ><i class="fab fa-linkedin"></i></a><?php endif; ?>
</div>
<?php
}