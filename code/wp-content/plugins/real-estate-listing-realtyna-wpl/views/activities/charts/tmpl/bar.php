<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');

wpl_extensions::import_javascript((object) array('param1'=>'wpl-jqplot-barrenderer', 'param2'=>'packages/jqplot/plugins/jqplot.barRenderer.min.js'));
wpl_extensions::import_javascript((object) array('param1'=>'wpl-jqplot-categoryAxisRenderer', 'param2'=>'packages/jqplot/plugins/jqplot.categoryAxisRenderer.min.js'));

$this->data = $params;

$this->chart_background = (isset($this->data['chart_background']) and trim($this->data['chart_background']) != '') ? $this->data['chart_background'] : '';
$this->chart_title = (isset($this->data['chart_title']) and trim($this->data['chart_title']) != '') ? $this->data['chart_title'] : '';
$this->rendered = $this->render_data($this->data['data'], 'bar');

/** importing js codes **/
$this->_wpl_import($this->tpl_path.'.scripts.bar', true, true);
?>
<div id="chartdiv<?php echo $this->data['unique_chart_id']; ?>" style="width: <?php echo $params['chart_width']; ?>; height: <?php echo $params['chart_height']; ?>;"></div>