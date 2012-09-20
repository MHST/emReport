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
if ($cmnd == 0 || !isValidCMND($cmnd)) die('Stop!!!');

$submit = $nv_Request->get_int('submit','post',0);

if( $submit == 0 ){
	$xtpl = new XTemplate ("examine.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('MAIN', NV_BASE_SITEURL . $module_name . "/");
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
	$nguoikham = $user_info['username'];
	
	$chandoan = nv_htmlspecialchars(nv_nl2br($chandoan, "<br />"));
	$ketluan = nv_htmlspecialchars(nv_nl2br($ketluan, "<br />"));
	$donthuoc = nv_htmlspecialchars(nv_nl2br($donthuoc, "<br />"));
	$ghichu = nv_htmlspecialchars(nv_nl2br($ghichu, "<br />"));
	
	// Thêm vào CSDL
	$query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "_kham` (`cmnd`, `ngaykham`, `khambenh`,
	`chandoan`, `ketluan`, `donthuoc`, `ghichu`, `dinhkem`, `nguoikham`) 
	VALUES ('". $cmnd . "', '" . $ngaykham . "', '" . $khambenh . "', '" . $chandoan . "', '" . $ketluan . 
	"', '" . $donthuoc . "', '" . $ghichu . "', '', '" . $nguoikham . "')";
	
	$id = $db->sql_query_insert_id($query);
	
	if (isset($_FILES['dinhkem']) and is_uploaded_file($_FILES['dinhkem']['tmp_name']))
    {
        @require_once (NV_ROOTDIR . "/includes/class/upload.class.php");
        $upload = new upload(array('images', 'documents', 'archives', 'text', 'adobe'), $global_config['forbid_extensions'], $global_config['forbid_mimes'],
        NV_UPLOAD_MAX_FILESIZE, 3000, 3000);
        nv_renamefile($_FILES['dinhkem'], $cmnd . "_" . $id . "_" . $_FILES['dinhkem']['name']);
        $upload_info = $upload->save_file($_FILES['dinhkem'], NV_UPLOADS_REAL_DIR . '/' . $module_name, false);
        @unlink($_FILES['dinhkem']['tmp_name']);
        if (empty($upload_info['error']))
       	{
        	@chmod($upload_info['name'], 0644);
            $file_name = str_replace(NV_ROOTDIR . "/", "", $upload_info['name']);
            $sql = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_kham` SET `dinhkem`=" . $db->dbescape($file_name) .
            	" WHERE `id`=" . $id;
            $db->sql_query($sql);
        }
	}
	
    Header("Location: " . NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=view-" . $cmnd);
        
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>