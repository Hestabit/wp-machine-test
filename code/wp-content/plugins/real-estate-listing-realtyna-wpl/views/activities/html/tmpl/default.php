<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');

$HTML = isset($params['html']) ? __($params['html'], 'real-estate-listing-realtyna-wpl') : '';

/** return **/
if(!trim($HTML)) return NULL;
?>
<div class="wpl_html_activity" id="wpl_html_activity<?php echo $this->activity_id; ?>">
    <?php echo do_shortcode(stripslashes($HTML)); ?>
</div>