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

$submit = $nv_Request->get_int('submit','post',0);

if( $submit == 0 ){
	$xtpl = new XTemplate ("create.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
}else{
	$cmnd = filter_text_input('cmnd', 'post', '');  
	if ($cmnd == '' || !nv_num_check($cmnd)){
		$contents = '<p>Số CMND chưa được nhập đúng. Quay lại để thực hiện !</p>';
		$contents .= '<input type="button" value="Quay lại" onclick="window.history.back()" />';
	}else{
		// Thêm vào CSDL
		$query = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_emreport (cmnd, ten) VALUE (". $cmnd . "," . $user_info['username'] . ")";
		$db->sql_query($query);
		// DOM PHP XML
		$doc = new DOMDocument('1.0', 'UTF-8');
		$doc->formatOutput = true;
		
		$root = $doc->createElement( "HOSOBENHAN" );
		$doc->appendChild( $root );
		
		$benhnhan = $doc->createElement( "BENHNHAN" );
		
		$xcmnd = $doc->createElement( "CMND" );
		$xcmnd->appendChild(
			$doc->createTextNode( $cmnd )
		);
		
		$hoten = $doc->createElement( "HOTEN" );
		$hoten->appendChild(
			$doc->createTextNode( $user_info['full_name'] )
		);
		
		$gioitinh = $doc->createElement( "GIOITINH" );
		$gioitinh->appendChild(
			$doc->createTextNode( $user_info['gender'] )
		);
		
		$ngaysinh = $doc->createElement( "NGAYSINH" );
		$ngaysinh->appendChild(
			$doc->createTextNode( nv_date('d/m/Y', $user_info['birthday']) )
		);
		
		$quequan = $doc->createElement( "QUEQUAN" );
		$quequan->appendChild(
			$doc->createTextNode( $user_info['location'] )
		);
		
		$benhnhan->appendChild( $xcmnd );
		$benhnhan->appendChild( $hoten );
		$benhnhan->appendChild( $gioitinh );
		$benhnhan->appendChild( $ngaysinh );
		$benhnhan->appendChild( $quequan );
		
		
		$root->appendChild( $benhnhan );
		
		$doc->save($cmnd . '.xml');
		$contents .= $lang_module['create_success'];
	}
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>