<?php

/**
 * The Third Party integration with the plugin - Redirection
 *
 * @since		2.9.8.7
 * @package		LiteSpeed_Cache
 * @subpackage	LiteSpeed_Cache/thirdparty
 * @author		LiteSpeed Technologies <info@litespeedtech.com>
 */
if ( ! defined('ABSPATH') ) {
    die() ;
}
LiteSpeed_Cache_API::register('LiteSpeed_Cache_ThirdParty_Redirection') ;

class LiteSpeed_Cache_ThirdParty_Redirection
{
	/**
	 * Detect if bbPress is installed and if the page is a bbPress page.
	 *
	 * @since 1.0.5
	 * @access public
	 */
	public static function detect()
	{
		if ( ! defined( 'REDIRECTION_DB_VERSION' ) ) return ;

		add_action( 'redirection_create_redirect', 'LiteSpeed_Cache_ThirdParty_Redirection::redirection_purge_cache' ) ;
		add_action( 'redirection_update_redirect', 'LiteSpeed_Cache_ThirdParty_Redirection::redirection_purge_cache' ) ;
	}

	public static function redirection_purge_cache( $data ) {
		$hash = LiteSpeed_Cache_Tag::get_uri_tag( $data[ 'url' ] ) ;
		LiteSpeed_Cache_API::purge( $hash ) ;

		return $data ;
	}
}

