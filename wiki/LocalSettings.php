<?php
# This file was automatically generated by the MediaWiki 1.20.4
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

require_once( "$IP/config/WikiSubdomains.php" );

if ( preg_match( '/^(.*)\.yourdomain.net$/', $server, $matches ) ) {
	 $wikiconf = $wikiSubdomains[strtolower($matches[1])];	 
} 

if (isset($wikiconf)) {
	# Site name
	$wgSitename = $wikiconf["sitename"];
	# The protocol and server name to use in fully-qualified URLs
	$wgServer = $wikiconf["server"];
	# Database name
	$wgDBname = $wikiconf["db"];
	# Site language code, should be one of the list in ./languages/Names.php
	$wgLanguageCode = $wikiconf["language"];
} else {
     die( "Invalid host name, can't determine wiki name" );
     // You could also redirect to a nicer "No such wiki" page.
}

# Shared configuration
require_once( "$IP/config/PrivateSettings.php" );
require_once( "$IP/config/WikiFamilySettings.php" );
require_once( "$IP/config/ExtensionSettings.php" );


# End of automatically generated settings.
# Add more configuration options below.

