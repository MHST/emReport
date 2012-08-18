<?php
if ( ! defined( 'NV_IS_MOD_EMREPORT' ) ) die( 'Stop!!!' );

if ( ! defined('NV_IS_USER') and ! defined('NV_IS_ADMIN')){
	Header("Location: " . NV_BASE_SITEURL . $module_name . "/");
	exit();
}
?>