<?php
/**
 * The Third Party integration with DIVI Theme.
 *
 * @since		2.9.8
 * @package		LiteSpeed_Cache
 * @subpackage	LiteSpeed_Cache/thirdparty
 * @author		LiteSpeed Technologies <info@litespeedtech.com>
 */
if ( ! defined( 'ABSPATH' ) ) {
	die() ;
}

LiteSpeed_Cache_API::hook_init( 'LiteSpeed_Cache_ThirdParty_Thrive_Builder::pre_load' ) ;

class LiteSpeed_Cache_ThirdParty_Thrive_Builder
{
	public static function pre_load()
	{
		if ( ! empty( $_GET[ 'tve' ] ) ) {
			LiteSpeed_Cache_API::disable_all( 'Thrive edit mode' ) ;
		}
	}
}
