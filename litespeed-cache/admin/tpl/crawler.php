<?php
if (!defined('WPINC')) die;

$_options = LiteSpeed_Cache_Config::get_instance()->get_options();

?>

<div class="wrap">
	<h2><?php echo __('LiteSpeed Cache Crawler', 'litespeed-cache'); ?></h2>
</div>
<div class="wrap">
	<div class="litespeed-cache-welcome-panel">
		<h3 class="litespeed-title"><?php echo __('Crawler File', 'litespeed-cache'); ?></h3>
		<a href="<?php echo LiteSpeed_Cache_Admin::build_lscwpctrl_url(LiteSpeed_Cache::ACTION_CRAWLER_GENERATE_FILE); ?>" class="litespeed-btn litespeed-btn-success">
			<?php echo __('Generate Crawler File', 'litespeed-cache'); ?>
		</a>
		<div class="litespeed-desc">
			<?php echo __('This will create a Crawler file in plugin folder', 'litespeed-cache'); ?>
		</div>

<?php
	$id = LiteSpeed_Cache_Config::CRWL_CRON_INTERVAL;
	$seconds = $_options[$id];
	if($seconds > 0):
		$hours = floor($seconds / 3600);
		$act = LiteSpeed_Cache_Config::CRWL_CRON_ACTIVE;
		$active = $_options[$act];
		if($active > 0){
			$active = 0;
			$active_text = __('Deactivate','litespeed-cache');		
		}else{
			$active = 1;
			$active_text = __('Activate','litespeed-cache');
		}
		?>
		<h3 class="litespeed-title"><?php echo __('Crawler Cron', 'litespeed-cache'); ?></h3>
		<table class="widefat striped">
			<thead><tr>
				<th scope="col"><?php echo __('Cron Name', 'litespeed-cache'); ?></th>
				<th scope="col"><?php echo __('Recurrence', 'litespeed-cache'); ?></th>
				<th scope="col"><?php echo __('Actions', 'litespeed-cache'); ?></th>
			</tr></thead>
			<tbody>
				<tr>
					<td><?php echo __('LiteSpeed Cache Crawler','litespeed-cache'); ?></td>
					<td>
						<?php echo sprintf(__('%d hour(s)','litespeed-cache'), $hours); ?>
					</td>
					<td><?php echo $active_text; ?></td>
				</tr>
			</tbody>
		</table>
		<div class="litespeed-desc">
			<?php echo __('Recurrence is calculated when you set Cron interval in seconds','litespeed-cache'); ?>
		</div>
<?php endif; ?>


		<h3 class="litespeed-title"><?php echo __('Start Crawler manually', 'litespeed-cache'); ?></h3>

		<input type="button" id="litespeedcache-button-crawl-url" name="litespeedcache-button-crawl-url" value="<?php echo __('Let It Go', 'litespeed-cache'); ?>" class="litespeed-btn litespeed-btn-success"/>

		<div class="litespeed-shell-wrap litespeed-hide">
			<?php require LSWCP_DIR . 'admin/tpl/snowman.inc.php'; ?>
			<ul class="litespeed-shell-body"></ul>
		</div>


	</div>
</div>