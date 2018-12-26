<?php

/**
 * The Third Party integration with the YITH WooCommerce Wishlist plugin.
 *
 * @since		1.1.0
 * @package		LiteSpeed_Cache
 * @subpackage	LiteSpeed_Cache/thirdparty
 * @author		LiteSpeed Technologies <info@litespeedtech.com>
 */
if ( ! defined('ABSPATH') ) {
    die() ;
}

LiteSpeed_Cache_API::register('LiteSpeed_Cache_ThirdParty_Divi_Themebuilder') ;

class LiteSpeed_Cache_ThirdParty_Divi_Themebuilder
{
	const ESI_PARAM_ATTS = 'divi_themebuilder_atts' ;
	const ESI_PARAM_POSTID = 'divi_themebuilder_post_id' ;
	private static $atts = null ; // Not currently used. Depends on how YITH adds attributes

	/**
	 * Detects if YITH WooCommerce Wishlist and WooCommerce are installed.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public static function detect()
	{
		if ( ! defined('ET_CORE') ) {
			return ;
		}
		if ( LiteSpeed_Cache_API::esi_enabled() ) {
			// LiteSpeed_Cache_API::hook_tpl_not_esi('LiteSpeed_Cache_ThirdParty_Divi_Themebuilder::is_not_esi') ;
			LiteSpeed_Cache_API::hook_tpl_esi('yith-wcwl-add', 'LiteSpeed_Cache_ThirdParty_Divi_Themebuilder::esi_add_slash_for_js_var') ;
		}
	}

	/**
	 * Hooked to the litespeed_cache_is_not_esi_template action.
	 *
	 * If the request is not an ESI request, hook to the add to wishlist button
	 * filter to replace it as an esi block.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public static function esi_add_slash_for_js_var()
	{

	}
}
