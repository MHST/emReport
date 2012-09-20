<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

include 'check.php';

if ( ! isDoctor($user_info['username']) ) die( $lang_module['error_doctor_func'] );

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

$id = filter_text_input('id', 'post', 0);
$submit = $nv_Request->get_int('submit','post',0);

$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_kham` WHERE id='" . $id . "'";
$result = $db->sql_query ($query);
$res = $db->sql_fetchrow($result);

if( $submit == 0 ){
	$res['ngaykham'] = nv_date('d/m/Y', $res['ngaykham']);
		
	$xtpl = new XTemplate ("edit.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('DATA', $res);
	$xtpl->assign('MAIN', NV_BASE_SITEURL . $module_name . "/");
	$xtpl->assign('NV_CURRENTTIME', nv_date('d/m/Y', NV_CURRENTTIME));
	$xtpl->assign('ACTION', NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=edit");
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
}else{	
	$khambenh = filter_text_input('khambenh', 'post', '');
	$chandoan = filter_text_textarea('chandoan', '', NV_ALLOWED_HTML_TAGS);
	$ketluan = filter_text_textarea('ketluan', '', NV_ALLOWED_HTML_TAGS);
	$donthuoc = filter_text_textarea('donthuoc', 'post', '');
	$ghichu = filter_text_textarea('ghichu', 'post', '');
	$nguoikham = $user_info['username'];
	
	$chandoan = nv_htmlspecialchars(nv_nl2br($chandoan, "<br />"));
	$ketluan = nv_htmlspecialchars(nv_nl2br($ketluan, "<br />"));
	$donthuoc = nv_htmlspecialchars(nv_nl2br($donthuoc, "<br />"));
	$ghichu = nv_htmlspecialchars(nv_nl2br($ghichu, "<br />"));
	
	// Thêm vào CSDL
	$query = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_kham` SET khambenh = '" . $khambenh . "',
	chandoan = '" . $chandoan . "', ketluan = '" . $ketluan . "', donthuoc = '" . $donthuoc . "', ghichu = '" . $ghichu ."', 
	nguoikham = '" . $nguoikham . "' WHERE id = '" . $id . "'";
	
	$db->sql_query($query);
	
    Header("Location: " . NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=view-" . $res['cmnd']);    
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>