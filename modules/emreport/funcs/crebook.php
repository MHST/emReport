<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_MOD_EMREPORT' ) ) die( 'Stop!!!' );

if ( isCreated($user_info['username']) ) die($lang_module['multi_error']);

$submit = $nv_Request->get_int('submit','post',0);

if( $submit == 0 ){
	$xtpl = new XTemplate ("create.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
}else{
	$cmnd = filter_text_input('cmnd', 'post', '');
	if (strcmp($cmnd, '') == 0 or !is_numeric($cmnd)){
		$contents = '<p>'. $lang_module['cmnd_not_numeric'] .'</p>';
		$contents .= '<input type="button" value="Quay lại" onclick="window.history.back()" />';
	}else{
		// Thêm vào CSDL
		$query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` (`cmnd`, `ten`) VALUES ('". $cmnd . "', '" . $user_info['username'] . "')";
		$db->sql_query($query);
		$contents .= $lang_module['create_success'];
	}
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>