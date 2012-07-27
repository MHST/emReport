<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_MOD_EMREPORT' ) ) die( 'Stop!!!' );
$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];
$contents = "Đây là create func";

//if( ! defined('NV_IS_USER') ){
	//$contents .= $lang_module['loginalert'];
//}
//else{
	//$xtpl = new XTemplate ("create.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	//$xtpl->parse('main');
	//$contents .= $xtpl->text('main');
//}

	/*/ DOM PHP XML
	  
	$doc = new DOMDocument();
	$doc->formatOutput = true;
	
	$root = $doc->createElement( "HOSOBENHAN" );
	$doc->appendChild( $root );
	
	$benhnhan = $doc->createElement( "BENHNHAN" );
	
	$xcmnd = $doc->createElement( "CMND" );
	$xcmnd->appendChild(
	$doc->createTextNode( $cmnd )
	);
	$benhnhan->appendChild( $cmnd );
	
	
	$root->appendChild( $benhnhan );
	
	$doc->save($cmnd);  
*/

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>