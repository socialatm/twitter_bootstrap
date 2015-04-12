<?php
/**
 * twitter bootstrap plugin user settings.
 *
 * @version	elgg 1.10.2
 */

//	get the default theme 
$default = elgg_get_plugin_setting('bootstrap_style', 'twitter_bootstrap', 'default');
$current_style = elgg_get_plugin_user_setting('bootstrap_style', 0, 'twitter_bootstrap');
$styles = elgg_get_file_list('mod/twitter_bootstrap/vendors/graphics/');
$available = array();

foreach($styles as $style) {
	$path_parts = pathinfo($style);
	$available[] = $path_parts['filename'];
}

if (!$current_style) {$current_style = $default; }
$optvalues = array();
foreach($available as $style)
	$optvalues[$style] = ucwords($style);
?>
<p><?php echo elgg_echo('select:theme:blub'); ?></p>
<div>
	<div id="bootswtach_preview" class="clearfix"><?php
		$preview_dir = elgg_get_config('url').'mod/twitter_bootstrap/vendors/graphics/';
		foreach($available as $style) {
			?>
			<div class="col-xs-6 col-md-3">
				<div class="thumbnail">
					<img alt="<?php echo $style; ?>" src="<?php echo $preview_dir.$style.'.png' ?> " data-name="<?php echo $style; ?>" style="height: 100%; width: 100%; display: block;">
				</div>
			</div>
			<?php		
				}
			?>
	</div>
	<div>
		<?php
		echo elgg_echo('selected:theme').' ';
		echo elgg_view('input/dropdown', array(
			'name' => 'params[bootstrap_style]',
			'options_values' => $optvalues,
			'value' => $current_style,
		));
		?>
	</div>
</div>
<script type="text/javascript">
(function($) {
	$(document).ready(function() {
		$('#bootswtach_preview img').hover(
				function(){ $(this).css('outline', '2px solid blue') },
				function(){ $(this).css('outline', 'none')
		});
		$('#bootswtach_preview img').click(function() {
			val = $(this).data('name');
			if(<?php echo '[';foreach($available as $style) echo "'".$style."',";echo ']';?>.indexOf(val) != -1) {
				$("select[name='params[bootstrap_style]']").attr('value', val);
			}
		});
	})
})(jQuery);
</script>
