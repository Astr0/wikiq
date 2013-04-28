<?php
/**
 * PostEdit Extension for MediaWiki.
 *
 * @file
 * @ingroup Extensions
 *
 * @license GPL v2 or later
 * @version 0.2
 */

$wgExtensionCredits[ 'other' ][] = array(
	'path' => __FILE__,
	'name' => 'PostEdit',
	'version' => '0.3',
	'url' => 'https://www.mediawiki.org/wiki/Extension:PostEdit',
	'author' => array(
		'Munaf Assaf',
		'Ori Livneh',
	),
	'descriptionmsg' => 'postedit-desc'
);

/* Setup */

$dir = dirname( __FILE__ );

// Register files
$wgAutoloadClasses[ 'PostEditHooks' ] = $dir . '/PostEdit.hooks.php';
$wgExtensionMessagesFiles[ 'PostEdit' ] = $dir . '/PostEdit.i18n.php';

// Register modules
$wgResourceModules[ 'ext.postEdit' ] = array(
	'scripts' => 'resources/ext.postEdit.js',
	'styles' => 'resources/ext.postEdit.css',
	'dependencies' => array(
		'jquery.cookie',
	),
	'messages' => array(
		'postedit-confirmation',
	),
	'position' => 'top',

	'localBasePath' => $dir,
	'remoteExtPath' => 'PostEdit',
);

// Register hooks
$wgHooks[ 'ArticleSaveComplete' ][] = 'PostEditHooks::onArticleSaveComplete';
$wgHooks[ 'BeforePageDisplay' ][] = 'PostEditHooks::onBeforePageDisplay';
$wgHooks[ 'BeforePageRedirect' ][] = 'PostEditHooks::onBeforePageRedirect';
$wgHooks[ 'MakeGlobalVariablesScript' ][] = 'PostEditHooks::onMakeGlobalVariablesScript';
