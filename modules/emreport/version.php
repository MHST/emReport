<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' )) die( 'Stop!!!' );
 
$module_version = array( 
	"name" => "Sổ y bạ", // Tieu de module
	"modfuncs" => "main,crebook,examine,creuser,edit,doctor_info",
	"is_sysmod" => 0,
	"virtual" => 1,
	"version" => "3.4.01",
	"date" => "Mon, 11 Jun 2012 8:34:27 GMT",
	"author" => "K55CA UET (DuNT;LocBH)",
	"note"=>"So y ba",
	"uploads_dir" => array(
		$module_name
	)
);
?>