<?php 

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;LinhVT)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_MOD_EMREPORT' ) ) die( 'Stop!!!' );
$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

$contents = '<br/>';

if( ! defined('NV_IS_USER') ){
	$contents .= $lang_module['loginalert'];
}
else{
	$xtpl = new XTemplate ( "detail.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>