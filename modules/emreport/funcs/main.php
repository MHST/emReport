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

if( ! defined('NV_IS_USER') ){
	$contents .= $lang_module['loginalert'];
}
else{
	$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "` WHERE `ten` = '" . $user_info['username'] . "'";
	$result = $db->sql_query ($query);
	$numrows = $db->sql_numrows($result);
	
	if($numrows == 0){
		$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=crebook";
		$value = "Tạo sổ cá nhân";
	}else{
		$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=view-" . $user_info['username'];
		$value = "Xem sổ cá nhân";
	}
	
	$action = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=search";
	$xtpl = new XTemplate ( "main.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('ACTION', $action);
	$xtpl->assign('LINK', $link);
	$xtpl->assign('VALUE', $value);
	
	if (NV_IS_SPADMIN){
		$link_admin = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=create_for_user";
		$xtpl->assign('ADMIN', '<input type="button" value="Tạo sổ cho bệnh nhân" onclick="window.location.href=' . $link_admin . '">');
	}
	
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
	
	// Search func
	if ($Lfunc == 'search'){
		$var = filter_text_input('q', 'post', '');
		
		if ($var == "")
		{
		    $contents .= "<p align='center'>" . $lang_module['search_null'] . "</p>";
		}else{
			$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "` WHERE `cmnd` = '" . $var . "'";
			$result = $db->sql_query ($query);
			$numrows = $db->sql_numrows($result);
			
			// If we have no results		
			if ($numrows == 0)
			{
			    $contents .= "<p align='center'>Không tìm thấy bệnh nhân nào với số CMND <b>" . $var . "</b></p>";
			}
			else{
				// now you can display the results returned
				$row = $db->sql_fetchrow($result);
				$name = $row["ten"];
				Header("Location: " . NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=view-" . $name);
			}
		}
	}
	
	// View func
	if ($Lfunc == 'view'){
		$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "` WHERE `ten` = '" . $Lname . "'";
		$result = $db->sql_query ($query);
		$row = $db->sql_fetchrow($result);
		
		$query = "SELECT * FROM `" . NV_USERS_GLOBALTABLE . "` WHERE `username` = '" . $Lname . "'";
		$result = $db->sql_query ($query);
		$res = $db->sql_fetchrow($result);
		
		$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=examine";
		$xtpl = new XTemplate ( "view.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
		$xtpl->assign('CMND', $row['cmnd']);
		$xtpl->assign('FULLNAME', $res['full_name']);
		$xtpl->assign('GENDER', $res['gender']);
		$xtpl->assign('BIRTHDAY', nv_date('d/m/Y', $res['birthday']));
		$xtpl->assign('LOCATION', $res['location']);
		if (NV_IS_SPADMIN){
			$xtpl->assign('ADMIN', '<input type="button" value="Khám mới" onclick="window.location.href=' . $link . '">');
		}
		$xtpl->parse('main');
		$contents .= $xtpl->text('main');
	}
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
?>