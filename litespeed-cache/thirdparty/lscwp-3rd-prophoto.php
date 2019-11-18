<?php

/**
 * The Third Party integration with the bbPress plugin.
 *
 * @since		2.9.8.8
 * @package		LiteSpeed_Cache
 * @subpackage	LiteSpeed_Cache/thirdparty
 * @author		LiteSpeed Technologies <info@litespeedtech.com>
 */
if ( ! defined( 'ABSPATH' ) ) {
	die() ;
}

LiteSpeed_Cache_API::hook_init( 'LiteSpeed_Cache_ThirdParty_Prophoto::pre_load' ) ;

class LiteSpeed_Cache_ThirdParty_Prophoto
{
	public static function pre_load()
	{
		if ( isset( $_GET[ 'pp-visual' ] ) && $_GET[ 'pp-visual' ] === '1' ) {
			LiteSpeed_Cache_API::disable_all( 'Pro Photo edit mode' ) ;
		}
	}
}
