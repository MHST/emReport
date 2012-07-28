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

$contents = "<br/>";

$xtpl = new XTemplate ( "view.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
$xtpl->assign('FULLNAME', $user_info['full_name']);
$xtpl->assign('GENDER', $user_info['gender']);
$xtpl->assign('BIRTHDAY', nv_date('d/m/Y', $user_info['birthday']));
$xtpl->assign('LOCATION', $user_info['location']);
$xtpl->assign('LINK', NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=examine");
$xtpl->parse('main');
$contents .= $xtpl->text('main');

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>