<?php
# Enabled Extensions. Most extensions are enabled by including the base extension file here
# but check specific extension documentation for more details
# The following extensions were automatically enabled:

require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );
require_once( "$IP/extensions/Gadgets/Gadgets.php" );
require_once( "$IP/extensions/Nuke/Nuke.php" );
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );
require_once( "$IP/extensions/Renameuser/Renameuser.php" );
require_once( "$IP/extensions/Vector/Vector.php" );
require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );
require_once( "$IP/extensions/EmbedVideo/EmbedVideo.php" );
require_once( "$IP/extensions/CharInsert/CharInsert.php" );
require_once( "$IP/extensions/Poem/Poem.php" );
require_once( "$IP/extensions/Cite/Cite.php" );
require_once( "$IP/extensions/Cite/SpecialCite.php" );
require_once( "$IP/extensions/ImageMap/ImageMap.php" );
require_once( "$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php" );
require_once( "$IP/extensions/CategoryTree/CategoryTree.php" );
require_once( "$IP/extensions/CheckUser/CheckUser.php" );
require_once( "$IP/extensions/Interwiki/Interwiki.php" );
// To grant sysops permissions to edit interwiki data
# $wgGroupPermissions['sysop']['interwiki'] = true;
require_once( "$IP/extensions/TemplateSandbox/TemplateSandbox.php" );
require_once( "$IP/extensions/AntiSpoof/AntiSpoof.php" );
$wgSharedTables[] = 'spoofuser';
require_once( "$IP/extensions/AntiBot/AntiBot.php" );
require_once( "$IP/extensions/SimpleAntiSpam/SimpleAntiSpam.php" );
require_once( "$IP/extensions/SpamBlacklist/SpamBlacklist.php" );
require_once( "$IP/extensions/TitleBlacklist/TitleBlacklist.php" );
// Apply to all, not just anonymous users.
$wgGroupPermissions['sysop']['tboverride'] = false; 
$wgTitleBlacklistSources = array(
  array(
    'type' => TBLSRC_LOCALPAGE,
    'src'  => 'MediaWiki:Titleblacklist'
  )
);
require_once( "$IP/extensions/TorBlock/TorBlock.php" );
require_once( "$IP/extensions/PostEdit/PostEdit.php" );
require_once( "$IP/extensions/AddThis/AddThis.php" );
$wgAddThispubid = 'ra-517d2fef778f35ed';
if (isset($wikiconf['addThisSB'])) {
	$wgAddThisSBServ = $wikiconf['addThisSB'];
}
if (isset($wikiconf['addThisH'])) {
	$wgAddThisHServ = $wikiconf['addThisH'];
}

require_once( "$IP/extensions/ContactPage/ContactPage.php" );
$wgContactUser = 'Wiki';
$wgContactSenderName = 'Contact Form on ' . $wgSitename;
$wgCaptchaTriggers['contactpage'] = true;
require_once( "$IP/extensions/InputBox/InputBox.php" );

require_once( "$IP/extensions/UploadWizard/UploadWizard.php" );
$wgExtensionFunctions[] = function() {
        $GLOBALS['wgUploadNavigationUrl'] = SpecialPage::getTitleFor( 'UploadWizard' )->getLocalURL();
        return true;
};
$wgUploadWizardConfig['altUploadForm'] = 'Special:Upload';