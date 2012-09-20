<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if (!defined('NV_IS_MOD_EMREPORT'))
    die('Stop!!!');

$page_title = $lang_module['doctor_info'];

$cmnd = filter_text_input('cmndDoctor', 'post', 0);
//if ($cmnd == 0 || !isValidCMND($cmnd)) die('Stop!!!');

$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_bacsi` WHERE `cmnd` = '" . $cmnd . "'";
$res = $db->sql_query ($query);
$row = $db->sql_fetchrow($res);

$query = "SELECT * FROM `" . NV_USERS_GLOBALTABLE . "` WHERE `username` = '" . $row['ten'] . "'";
$res1 = $db->sql_query ($query);
$row1 = $db->sql_fetchrow($res1);

$data = array();

$data = array(
	'full_name' => $row1['full_name'],
	'gender' => gen($row1['gender']),
	'email' => $row1['email'],
	'khoa' => $row['khoa'],
	'trinhdo' => $row['trinhdo'], 
	'ngaycapbang' => nv_date('d/m/Y', $row['ngaycapbang']),
	'mabenhvien' => $row['mabenhvien'],
);


$xtpl = new XTemplate("doctor_info.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] .
    "/modules/" . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('LOGOUT', NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=users&" . NV_OP_VARIABLE . "=logout");
$xtpl->assign('MAIN', NV_BASE_SITEURL . $module_name . "/");
$xtpl->assign('DATA', $data);
$xtpl->parse('main');
$contents = $xtpl->text('main');
    
include (NV_ROOTDIR . "/includes/header.php");
echo nv_site_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");

?>