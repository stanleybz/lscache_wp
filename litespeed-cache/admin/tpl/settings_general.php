<?php
if (!defined('WPINC')) die;

?>
<h3 class="litespeed-title"><?php echo __('General', 'litespeed-cache'); ?></h3>

<table class="form-table"><tbody>
	<tr>
		<th><?php echo __('Enable LiteSpeed Cache', 'litespeed-cache'); ?></th>
		<td>
			<?php
				$id = LiteSpeed_Cache_Config::OPID_ENABLED_RADIO;
				//IF multisite: Add 'Use Network Admin' option,
				//ELSE: Change 'Enable LiteSpeed Cache' selection to 'Enabled' if the 'Use Network Admin' option was previously selected.
				//		Selection will not actually be changed unless settings are saved.
				if(!is_multisite() && intval($_options[$id]) === 2){
					$_options[$id] = 1;
				}
			?>
			<div class="litespeed-row">
				<div class="litespeed-switch litespeed-label-info">
					<input type="radio" 
						name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" 
						id="conf_<?php echo $id; ?>_enable" value="1" <?php if( $_options[$id]==1 ) echo 'checked'; ?>
					/>
					<label for="conf_<?php echo $id; ?>_enable"><?php echo __('Enable', 'litespeed-cache'); ?></label>

					<input type="radio" 
						name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" 
						id="conf_<?php echo $id; ?>_disable" value="0" <?php if( $_options[$id]==0 ) echo 'checked'; ?>
					/>
					<label for="conf_<?php echo $id; ?>_disable"><?php echo __('Disable', 'litespeed-cache'); ?></label>

					<?php if (is_multisite()): ?>
					<input type="radio" 
						name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" 
						id="conf_<?php echo $id; ?>_notset" value="2" <?php if( $_options[$id]==2 ) echo 'checked'; ?>
					/>
					<label for="conf_<?php echo $id; ?>_notset"><?php echo __('Use Network Admin Setting', 'litespeed-cache'); ?></label>
					<?php endif; ?>
				</div>
			</div>
			<div class="litespeed-desc">
				<?php echo sprintf(__('Please visit the <a %s>Information</a> page on how to test the cache.', 'litespeed-cache'),
					'href="'.get_admin_url().'admin.php?page=lscache-info"'); ?>

				<strong><?php echo __('NOTICE', 'litespeed-cache'); ?>: </strong><?php echo __('When disabling the cache, all cached entries for this blog will be purged.', 'litespeed-cache'); ?>
				<?php if (is_multisite()): ?>
				<br><?php echo __('The network admin setting can be overridden here.', 'litespeed-cache'); ?>
				<?php endif; ?>
			</div>
		</td>
	</tr>

	<tr>
		<th><?php echo __('Default Public Cache TTL', 'litespeed-cache'); ?></th>
		<td>
			<?php $id = LiteSpeed_Cache_Config::OPID_PUBLIC_TTL; ?>
			<input type="text" class="regular-text" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" value="<?php echo esc_textarea($_options[$id]); ?>" /> <?php echo __('seconds', 'litespeed-cache'); ?>
			<div class="litespeed-desc">
				<?php echo __('Specify how long, in seconds, public pages are cached. Minimum is 30 seconds.', 'litespeed-cache'); ?>
			</div>
		</td>
	</tr>

	<tr>
		<th><?php echo __('Default Front Page TTL', 'litespeed-cache'); ?></th>
		<td>
			<?php $id = LiteSpeed_Cache_Config::OPID_FRONT_PAGE_TTL; ?>
			<input type="text" class="regular-text" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" value="<?php echo esc_textarea($_options[$id]); ?>" /> <?php echo __('seconds', 'litespeed-cache'); ?>
			<div class="litespeed-desc">
				<?php echo __('Specify how long, in seconds, the front page is cached. Minimum is 30 seconds.', 'litespeed-cache'); ?>
			</div>
		</td>
	</tr>

	<tr>
		<th><?php echo __('Default Feed TTL', 'litespeed-cache'); ?></th>
		<td>
			<?php $id = LiteSpeed_Cache_Config::OPID_FEED_TTL; ?>
			<input type="text" class="regular-text" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" value="<?php echo esc_textarea($_options[$id]); ?>" /> <?php echo __('seconds', 'litespeed-cache'); ?>
			<div class="litespeed-desc">
				<?php echo __('Specify how long, in seconds, feeds are cached.', 'litespeed-cache'); ?>
				<?php echo __('If this is set to a number less than 30, feeds will not be cached.', 'litespeed-cache'); ?>
			</div>
		</td>
	</tr>

	<tr>
		<th><?php echo __('Default 404 Page TTL', 'litespeed-cache'); ?></th>
		<td>
			<?php $id = LiteSpeed_Cache_Config::OPID_404_TTL; ?>
			<input type="text" class="regular-text" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" value="<?php echo esc_textarea($_options[$id]); ?>" /> <?php echo __('seconds', 'litespeed-cache'); ?>
			<div class="litespeed-desc">
				<?php echo __('Specify how long, in seconds, 404 pages are cached.', 'litespeed-cache'); ?>
				<?php echo __('If this is set to a number less than 30, 404 pages will not be cached.', 'litespeed-cache'); ?>
			</div>
		</td>
	</tr>

	<tr>
		<th><?php echo __('Default 403 Page TTL', 'litespeed-cache'); ?></th>
		<td>
			<?php $id = LiteSpeed_Cache_Config::OPID_403_TTL; ?>
			<input type="text" class="regular-text" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" value="<?php echo esc_textarea($_options[$id]); ?>" /> <?php echo __('seconds', 'litespeed-cache'); ?>
			<div class="litespeed-desc">
				<?php echo __('Specify how long, in seconds, 403 pages are cached.', 'litespeed-cache'); ?>
				<?php echo __('If this is set to a number less than 30, 403 pages will not be cached.', 'litespeed-cache'); ?>
			</div>
		</td>
	</tr>

	<tr>
		<th><?php echo __('Default 500 Page TTL', 'litespeed-cache'); ?></th>
		<td>
			<?php $id = LiteSpeed_Cache_Config::OPID_500_TTL; ?>
			<input type="text" class="regular-text" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" value="<?php echo esc_textarea($_options[$id]); ?>" /> <?php echo __('seconds', 'litespeed-cache'); ?>
			<div class="litespeed-desc">
				<?php echo __('Specify how long, in seconds, 500 pages are cached.', 'litespeed-cache'); ?>
				<?php echo __('If this is set to a number less than 30, 500 pages will not be cached.', 'litespeed-cache'); ?>
			</div>
		</td>
	</tr>

	<tr>
		<th><?php echo __('Enable Cache for Commenters', 'litespeed-cache'); ?></th>
		<td>
			<?php $id = LiteSpeed_Cache_Config::OPID_CACHE_COMMENTERS; ?>
			<div class="litespeed-row">
				<div class="litespeed-switch litespeed-label-info">
					<input type="radio" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" id="conf_<?php echo $id; ?>_enable" value="1" <?php if( $_options[$id] ) echo 'checked'; ?> />
					<label for="conf_<?php echo $id; ?>_enable"><?php echo __('Enable', 'litespeed-cache'); ?></label>

					<input type="radio" name="<?php echo LiteSpeed_Cache_Config::OPTION_NAME . '[' . $id . ']'; ?>" id="conf_<?php echo $id; ?>_disable" value="0" <?php if( !$_options[$id] ) echo 'checked'; ?> />
					<label for="conf_<?php echo $id; ?>_disable"><?php echo __('Disable', 'litespeed-cache'); ?></label>
				</div>
			</div>
			<div class="litespeed-desc">
				<?php echo __('When enabled, commenters will not be able to see their comments awaiting moderation.', 'litespeed-cache'); ?>
				<?php echo __('Disabling this option will display those types of comments, but the cache will not perform as well.', 'litespeed-cache'); ?>
			</div>
		</td>
	</tr>

	<?php if (!is_multisite()): ?>
		<?php require LSWCP_DIR . 'admin/tpl/settings_inc.purge_on_upgrade.php'; ?>
		<?php require LSWCP_DIR . 'admin/tpl/settings_inc.mobile_view.php'; ?>
	<?php endif; ?>

</tbody></table>
