<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');
?>
<script type="text/javascript">
jQuery(document).ready(function()
{
	var s1 = <?php echo $this->rendered; ?>;

	var plot = wplj.jqplot('chartdiv<?php echo $this->data['unique_chart_id']; ?>', s1,
	{
		<?php if(trim($this->chart_title) != '') echo "title: '".$this->chart_title."',"; ?>
		axesDefaults: {
			labelRenderer: wplj.jqplot.CanvasAxisLabelRenderer
		},
		seriesDefaults: {
		  rendererOptions: {
			  smooth: true
		  }
		},
		axes: {}
    });
});
</script>