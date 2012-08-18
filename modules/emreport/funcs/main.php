<?php 

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_MOD_EMREPORT' ) ) die( 'Stop!!!' );
$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

if( ! defined('NV_IS_USER') ){
	$xtpl = new XTemplate ( "login.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
}
else{
	$action = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=search";
	$xtpl = new XTemplate ( "main.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('ACTION', $action);
	
	if (!isDoctor($user_info['username'])) {
		$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `ten` = '" . $user_info['username'] . "'";
		$result = $db->sql_query ($query);
		$numrows = $db->sql_numrows($result);
		
		if($numrows == 0){
			$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=crebook";
			$value = $lang_module['create_emreport'];
		}else{
			$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=view-" . getCMND($user_info['username']);
			$value = $lang_module['view_emreport'];
		}	
	}else{
		$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=creuser";
		$value = $lang_module['create_emreport_admin'];
	}
	
	$xtpl->assign('LINK', $link);
	$xtpl->assign('VALUE', $value);
	$xtpl->parse('main.button');
	
	// Search func
	if ($Lfunc == 'search'){
		$var = filter_text_input('q', 'post', '');
		
		if ($var == "")
		{
		    $xtpl->assign('ERROR', $lang_module['search_null']);
		    $xtpl->parse('main.error');
		} elseif ($var == 0){
			$xtpl->assign('ERROR', $lang_module['edit_error_cmnd']);
			$xtpl->parse('main.error');
		} else{
			$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `cmnd` = '" . $var . "'";
			$result = $db->sql_query ($query);
			$numrows = $db->sql_numrows($result);
			
			// If we have no results		
			if ($numrows == 0)
			{
			    $xtpl->assign('ERROR', $lang_module['cmnd_not_found']);
			    $xtpl->assign('CMND', $var);
			    $xtpl->parse('main.error');
			}
			else{
				$row = $db->sql_fetchrow($result);
				Header("Location: " . NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=view-" . $row['cmnd']);
			}
		}
	}
	
	$xtpl->parse('main');
	$contents .= $xtpl->text('main');
	
	// View func
	if ($Lfunc == 'view'){
		$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `cmnd` = '" . $Lcmnd . "'";
		$result = $db->sql_query ($query);
		$row = $db->sql_fetchrow($result);
		
		$query = "SELECT * FROM `" . NV_USERS_GLOBALTABLE . "` WHERE `username` = '" . $row['ten'] . "'";
		$result = $db->sql_query ($query);
		$res = $db->sql_fetchrow($result);
		
		$xtpl = new XTemplate ( "view.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
		$xtpl->assign('CMND', $row['cmnd']);
		$xtpl->assign('FULLNAME', $res['full_name']);
		$xtpl->assign('GENDER', $res['gender']);
		$xtpl->assign('BIRTHDAY', nv_date('d/m/Y', $res['birthday']));
		$xtpl->assign('LOCATION', $res['location']);
		if ( isDoctor($user_info['username'])){
			$xtpl->assign('LINK', NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=examine");	
			$xtpl->assign('NV_CURRENTTIME', nv_date('d/m/Y', NV_CURRENTTIME));
			$xtpl->parse('main.examine');
		}
		// list report
		$list = '';
		
		$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_kham` WHERE `cmnd` = '" . $row['cmnd'] . "'";
		$result = $db->sql_query ($query);
		
		while ($res = $db->sql_fetchrow($result)) {
			$list .= "<tr>
						<td>" . nv_date('d/m/Y', $res['ngaykham']) . "</td>
						<td>" . $res['khambenh'] . "</td>
						<td>" . nv_unhtmlspecialchars($res['chandoan']) . "</td>
						<td>" . nv_unhtmlspecialchars($res['ketluan']) . "</td>
						<td>" . nv_unhtmlspecialchars($res['donthuoc']) . "</td>
						<td>" . nv_unhtmlspecialchars($res['ghichu']) . "</td>
						<td>" . $res['dinhkem'] . "</td>
						<td>" . $res['nguoikham'] . "</td>
					</tr>";
		}		
		$xtpl->assign('LIST', $list);
		$xtpl->parse('main');
		$contents .= $xtpl->text('main');
	}
}

$my_footer = "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL .
    "themes/them_emreport_nuke/js/bootstrap.js\"></script>\n";

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
?>