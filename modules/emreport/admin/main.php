<?php 

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_EMREPORT_ADMIN' ) ) die( 'Stop!!!' );
$page_title = "Trang chính";

// get doctor list
$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_bacsi`";
$result = $db->sql_query($query);

$list_doctor = "";

while ($res = $db->sql_fetchrow($result)) {
	$query = "SELECT * FROM `" . NV_USERS_GLOBALTABLE . "` WHERE username='" . $res['ten'] . "'";
	$result_temp = $db->sql_query($query);
	$row = $db->sql_fetchrow($result_temp);
	
	$list_doctor .= "<tr><td>" . $res['cmnd'] . "</td>
				<td>" . $res['ten'] . "</td>
				<td>" . $row['full_name'] . "</td>
				<td>" . $res['khoa'] . "</td>
				<td>" . $res['trinhdo'] . "</td>
				<td>" . nv_date('d/m/Y', $res['ngaycapbang']) . "</td>
				<td>" . $res['mabenhvien'] . "</td></tr>";
}

// get patient list
$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan`";
$result = $db->sql_query($query);

$list_patient = "";

while ($res = $db->sql_fetchrow($result)) {
	$query = "SELECT * FROM `" . NV_USERS_GLOBALTABLE . "` WHERE username='" . $res['ten'] . "'";
	$result_temp = $db->sql_query($query);
	$row = $db->sql_fetchrow($result_temp);
	
	
	$list_patient .= "<tr><td>" . $res['cmnd'] . "</td>
				<td>" . $res['ten'] . "</td>
				<td>" . $row['full_name'] . "</td>
				<td>" . gen($row['gender']) . "</td>
				<td>" . nv_date('d/m/Y', $row['birthday']) . "</td>
				<td>" . $row['location'] . "</td></tr>";
}

$xtpl = new XTemplate("main.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] .
    "/modules/" . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('LIST_DOCTOR', $list_doctor);
$xtpl->assign('LIST_PATIENT', $list_patient);
$xtpl->parse('main');
$contents = $xtpl->text('main');

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");

?>