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
	$redirect = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "";
	$link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=users&" . NV_OP_VARIABLE . "=login&nv_redirect=" . nv_base64_encode( $redirect );	

	$xtpl = new XTemplate ( "login.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('LOGIN', $link);
	$xtpl->assign('IMAGE', NV_BASE_SITEURL . "themes/" . $global_config['module_theme'] . "/images/doctor-red.png");
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
}
else{
	$xtpl = new XTemplate ( "main.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('IMAGE', NV_BASE_SITEURL . "themes/" . $global_config['module_theme'] . "/images/doctor-red.png");
	$xtpl->assign('LOGOUT', NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=users&" . NV_OP_VARIABLE . "=logout");
	
	// Search func
	if ($Lfunc == 'search'){
		if (! isDoctor($user_info['username'])) die('Stop!!!');
		
		$cmnd = filter_text_input('q', 'post', '');
		
		if ($cmnd == "")
		{
		    $xtpl->assign('ERROR', $lang_module['search_null']);
		    $xtpl->parse('main.wrap.error');
		} elseif ($cmnd == 0 || !isValidCMND($cmnd)){
			$xtpl->assign('ERROR', $lang_module['edit_error_cmnd']);
			$xtpl->parse('main.wrap.error');
		} else{
			$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `cmnd` = '" . $cmnd . "'";
			$result = $db->sql_query ($query);
			$numrows = $db->sql_numrows($result);
			
			// If we have no results		
			if ($numrows == 0)
			{
			    $xtpl->assign('ERROR', $lang_module['cmnd_not_found']);
			    $xtpl->assign('CMND', $cmnd);
			    $xtpl->parse('main.wrap.error');
			}
			else{
				$row = $db->sql_fetchrow($result);
				Header("Location: " . NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=view-" . $row['cmnd']);
				exit();
			}
		}
	}
	
	$parse_wrap = 0;
	if (!isDoctor($user_info['username'])) {
		if (! isCreated($user_info['username'])){
			$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=crebook";
			$xtpl->assign('LINK', $link);
			$xtpl->parse('main.wrap.user');
			$parse_wrap = 1;
		}elseif ($Lfunc != 'view'){
			$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=view-" . getCMND($user_info['username']);
			Header("Location: " . $link);
			exit();		
		}	
	}else{
		$link = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=creuser";
		$action = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=search";
		$xtpl->assign('ACTION', $action);
		$xtpl->assign('LINK', $link);
		$xtpl->parse('main.wrap.doctor');
		$parse_wrap = 1;
	}
	
	if ($parse_wrap == 1) $xtpl->parse('main.wrap');
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
		
	// View func
	if ($Lfunc == 'view'){
		if (!isDoctor($user_info['username']) and $Lcmnd != getCMND($user_info['username'])) die('Stop!!!');
		include 'markdown.php';
		$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `cmnd` = '" . $Lcmnd . "'";
		$result = $db->sql_query ($query);
		$row = $db->sql_fetchrow($result);
		
		$query = "SELECT * FROM `" . NV_USERS_GLOBALTABLE . "` WHERE `username` = '" . $row['ten'] . "'";
		$result = $db->sql_query ($query);
		$res = $db->sql_fetchrow($result);
		
		$xtpl = new XTemplate ( "view.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('CMND', $row['cmnd']);
		$xtpl->assign('FULLNAME', $res['full_name']);
		$xtpl->assign('GENDER', $res['gender']);
		$xtpl->assign('BIRTHDAY', nv_date('d/m/Y', $res['birthday']));
		$xtpl->assign('LOCATION', $res['location']);
		if ( isDoctor($user_info['username'])){
			$xtpl->assign('LINK', NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=examine");	
			$xtpl->assign('NV_CURRENTTIME', nv_date('d/m/Y', NV_CURRENTTIME));
			$xtpl->parse('main.examine');
			$my_footer .= "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL .
    		"themes/" . $global_config ['module_theme'] . "/js/bootstrap.min.js\"></script>\n";
		}
		// list report
		$list = '';
		
		$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_kham` WHERE `cmnd` = '" . $row['cmnd'] . "'";
		$result = $db->sql_query ($query);
		
		while ($res = $db->sql_fetchrow($result)) {
			$list .= "<tr>
						<td>" . nv_date('d/m/Y', $res['ngaykham']) . "</td>
						<td>" . $res['khambenh'] . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['chandoan'])) . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['ketluan'])) . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['donthuoc'])) . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['ghichu'])) . "</td>
						<td>" . $res['dinhkem'] . "</td>
						<td>" . $res['nguoikham'] . "</td>
					</tr>";
		}
		$xtpl->assign('LIST', $list);
		$xtpl->parse('main');
		$contents .= $xtpl->text('main');
	}
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
?>