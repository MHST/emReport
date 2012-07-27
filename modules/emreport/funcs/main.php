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

if( ! defined('NV_IS_USER') ){
	$contents .= $lang_module['loginalert'];
}
else{
	$query = "SELECT ten FROM " . NV_PREFIXLANG . "_" . $module_data . "_emreport WHERE ten = '%" . $user_info['username'] . "%'";
	$result = $db->sql_query ($query);
	$numrows = $db->sql_numrows($result);
	
	if($numrows != 0){
		$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=create";
		$value = "Tạo sổ cá nhân";
	}else{
		$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=view";
		$value = "Xem sổ cá nhân";
	}
	
	$action = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=search";
	$xtpl = new XTemplate ( "main.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('ACTION', $action);
	$xtpl->assign('LINK', $link);
	$xtpl->assign('VALUE', $value);
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
?>