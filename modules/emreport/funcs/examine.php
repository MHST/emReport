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

$cmnd = filter_text_input('cmnd', 'post', 0);
$submit = $nv_Request->get_int('submit','post',0);

if( $submit == 0 ){
	$xtpl = new XTemplate ("examine.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('CMND', $cmnd);
	$xtpl->assign('NV_CURRENTTIME', nv_date('d/m/Y', NV_CURRENTTIME));
	$xtpl->assign('ACTION', NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=examine");
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
}else{	
	$ngaykham = NV_CURRENTTIME;
	$khambenh = filter_text_input('khambenh', 'post', '');
	$chandoan = filter_text_textarea('chandoan', '', NV_ALLOWED_HTML_TAGS);
	$ketluan = filter_text_textarea('ketluan', '', NV_ALLOWED_HTML_TAGS);
	$donthuoc = filter_text_textarea('donthuoc', 'post', '');
	$ghichu = filter_text_textarea('ghichu', 'post', '');
	$dinhkem = filter_text_input('dinhkem', 'post', '');
	$nguoikham = $user_info['full_name'];
	
	$chandoan = nv_htmlspecialchars(nv_nl2br($chandoan, "<br />"));
	$ketluan = nv_htmlspecialchars(nv_nl2br($ketluan, "<br />"));
	$donthuoc = nv_htmlspecialchars(nv_nl2br($donthuoc, "<br />"));
	$ghichu = nv_htmlspecialchars(nv_nl2br($ghichu, "<br />"));
	
	// Thêm vào CSDL
	$query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "_kham` (`cmnd`, `ngaykham`, `khambenh`,
	`chandoan`, `ketluan`, `donthuoc`, `ghichu`, `dinhkem`, `nguoikham`) 
	VALUES ('". $cmnd . "', '" . $ngaykham . "', '" . $khambenh . "', '" . $chandoan . "', '" . $ketluan . 
	"', '" . $donthuoc . "', '" . $ghichu . "', '" . $dinhkem . "', '" . $nguoikham . "')";
	
	$db->sql_query($query);
	$contents .= $lang_module['examine_success'];
	$my_head .= "<script type='text/javascript'>
        			function redirect(){
            			window.location = '" . NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=view-" . $cmnd . "';" .
        			"}
        			setTimeout('redirect()', 1000);
    			</script>";
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>