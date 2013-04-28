<?php
/**
 * Hooks for PostEdit extension
 *
 * @file
 * @ingroup Extensions
 */

class PostEditHooks {

	public static $isPostEdit = false;

	/**
	 * MakeGlobalVariablesScript hook.
	 * Add config vars to mw.config.
	 *
	 * @param $vars array
	 * @param $out OutputPage output page
	 * @return bool
	 */
	public static function onMakeGlobalVariablesScript( &$vars, $out ) {
		global $wgCookiePath;

		if ( $out->getRequest()->getCookie( 'showPostEdit' ) ) {
			$vars[ 'wgCookiePath' ] = $wgCookiePath;
		}

		return true;
	}

	/**
	 * BeforePageDisplay hook.
	 *
	 * Adds the modules to the page.
	 *
	 * @param $out OutputPage output page
	 * @param $skin Skin current skin
	 * @return bool
	 */
	public static function onBeforePageDisplay( $out ) {
		if ( $out->getRequest()->getCookie( 'showPostEdit' ) ) {
			$out->addModules( 'ext.postEdit' );
		}
		return true;
	}


	/**
	 * ArticleSaveComplete hook handler.
	 * @return bool
	 */
	public static function onArticleSaveComplete( $article, $user, $text, $summary, $minoredit, $watchthis, $sectionanchor, $flags, $revision, $status, $baseRevId ) {
		if ( isset( $revision ) ) {
			self::$isPostEdit = true;
		}
		return true;
	}

	/**
	 * BeforePageRedirect hook.
	 * @return bool
	 */
	public static function onBeforePageRedirect() {
		global $wgCookiePrefix, $wgCookiePath, $wgCookieDomain;

		if ( self::$isPostEdit ) {
			// The cookie we set here must be clearable by JavaScript code, so
			// it must not be marked HttpOnly. Since WebRequest::setcookie
			// has no way to guarantee this behavior, we have to use PHP's
			// setcookie() directly.
			setcookie(
				$wgCookiePrefix . 'showPostEdit',
				1,
				0,
				$wgCookiePath,
				$wgCookieDomain
			);
		}

		return true;
	}

}
