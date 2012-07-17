<?php 

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_EMREPORT_ADMIN' ) ) die( 'Stop!!!' );
$page_title = "Trang chính";

$contents = "Xin chào các bạn";

include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme($contents);
include (NV_ROOTDIR . "/includes/footer.php");
?>