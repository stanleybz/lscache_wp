<?php
/**
 * The Third Party integration with Wpdiscuz.
 *
 * @since		2.9.5
 * @package		LiteSpeed_Cache
 * @subpackage	LiteSpeed_Cache/thirdparty
 * @author		LiteSpeed Technologies <info@litespeedtech.com>
 */
if ( ! defined('ABSPATH') ) {
	die() ;
}

LiteSpeed_Cache_API::register( 'LiteSpeed_Cache_ThirdParty_Wpdiscuz' ) ;

class LiteSpeed_Cache_ThirdParty_Wpdiscuz
{
	public static function detect()
	{
		if ( ! defined( 'WPDISCUZ_DS' ) ) return ;

		if ( LiteSpeed_Cache_API::esi_enabled() ) {
			LiteSpeed_Cache_API::hook_tpl_not_esi('LiteSpeed_Cache_ThirdParty_Wpdiscuz::is_not_esi') ;
			LiteSpeed_Cache_API::hook_tpl_esi('wpdiscuz-comment-form', 'LiteSpeed_Cache_ThirdParty_Wpdiscuz::load_wpdiscuz_comment_form') ;
		}
	}

	public static function is_not_esi()
	{
		add_filter('wpdiscuz_comment_form_render', 'LiteSpeed_Cache_ThirdParty_Wpdiscuz::sub_add_to_wishlist', 2, 999) ;
	}

	public static function sub_add_to_wishlist( $template, $commentsCount, $currentUser )
	{
		$params = array(
			'commentsCount' => $commentsCount,
			'currentUser' => $currentUser
		) ;
		return LiteSpeed_Cache_API::esi_url( 'wpdiscuz-comment-form', 'WPDiscuz comment form', $params ) ;
	}

	public static function load_wpdiscuz_comment_form($params)
	{
		$wpdiscuz = wpDiscuz();
		$wpdiscuz->wpdiscuzForm->renderFrontForm($params['commentsCount'], $params['currentUser']);
		LiteSpeed_Cache_API::set_cache_private();
		LiteSpeed_Cache_API::set_cache_no_vary();
	}
}
