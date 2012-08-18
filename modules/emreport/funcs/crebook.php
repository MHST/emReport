<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

include 'check.php';

if ( isCreated($user_info['username']) ) die($lang_module['multi_error']);

$submit = $nv_Request->get_int('submit','post',0);
$xtpl = new XTemplate ("create.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);

if( $submit != 0 ){
	$cmnd = filter_text_input('cmnd', 'post', '');
	if (strcmp($cmnd, '') == 0 or !is_numeric($cmnd)){
		$xtpl->assign('ERROR', $lang_module['cmnd_not_numeric']);
	}else{
		// Thêm vào CSDL
		$query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` (`cmnd`, `ten`) VALUES ('". $cmnd . "', '" . $user_info['username'] . "')";
		$db->sql_query($query);
		$xtpl->assign('ERROR', $lang_module['create_success']);
		$my_head .= "<script type='text/javascript'>
        			function redirect(){
            			window.location = '" . NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=view-" . $cmnd . "';" .
        			"}
        			setTimeout('redirect()', 1000);
    			</script>";
	}
}

$xtpl->parse('main');
$contents .= $xtpl->text('main');

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>