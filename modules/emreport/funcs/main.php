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
	$my_head .= "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL .
        "js/jquery/jquery.validate.js\"></script>\n";
    $my_head .= "<script type=\"text/javascript\">\n";
    $my_head .= "$(document).ready(function(){\n            $('#loginForm').validate();\n          });";
    $my_head .= "  </script>\n";
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('LOGIN', $link);
	$xtpl->assign('IMAGE', NV_BASE_SITEURL . "themes/" . $global_config['module_theme'] . "/images/doctor-red.png");
	$xtpl->assign('LOSTPASS', "" . NV_BASE_SITEURL . "index.php?" .
        NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=users&" . NV_OP_VARIABLE . "=lostpass");
    $xtpl->assign('REGISTER', "" . NV_BASE_SITEURL . "index.php?" .
        NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=users&" . NV_OP_VARIABLE . "=register");

    $array_login = array(
                "nv_login" => '',
                "nv_password" => '',);
    
    $xtpl->assign('DATA', $array_login);
    
	if (defined('NV_OPENID_ALLOWED'))
    {
        $xtpl->assign('OPENID_IMG_SRC', NV_BASE_SITEURL . "themes/" . $module_info['template'] .
            "/images/openid.gif");
        $xtpl->assign('OPENID_IMG_WIDTH', 150);
        $xtpl->assign('OPENID_IMG_HEIGHT', 60);
        $assigns = array();
        foreach ($openid_servers as $server => $value)
        {
            $assigns['href'] = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" .
                NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=users&" .
                NV_OP_VARIABLE . "=login&amp;server=" . $server;
            $assigns['title'] = ucfirst($server);
            $assigns['img_src'] = NV_BASE_SITEURL . "themes/" . $module_info['template'] .
                "/images/" . $server . ".gif";
            $assigns['img_width'] = $assigns['img_height'] = 24;
            $xtpl->assign('OPENID', $assigns);
            $xtpl->parse('main.openid.server');
        }
        $xtpl->parse('main.openid');
    }
    
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
			Header("Location: " . nv_url_rewrite($link, true));
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
		
		$action = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=doctor_info";
		$edit_action = NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=edit";
		
		$xtpl = new XTemplate ( "view.tpl", NV_ROOTDIR . "/themes/" . $global_config ['module_theme'] . "/modules/" . $module_name);
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('ACTION', $action);
		$xtpl->assign('EDIT_ACTION', $edit_action);
		$xtpl->assign('CMND', $row['cmnd']);
		$xtpl->assign('FULLNAME', $res['full_name']);
		$xtpl->assign('GENDER', gen($res['gender']));
		$xtpl->assign('BIRTHDAY', nv_date('d/m/Y', $res['birthday']));
		$xtpl->assign('LOCATION', $res['location']);
		if ( isDoctor($user_info['username'])){
			$xtpl->assign('LINK', NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=examine");	
			$xtpl->assign('NV_CURRENTTIME', nv_date('d/m/Y', NV_CURRENTTIME));
			$xtpl->parse('main.examine');
			$xtpl->parse('main.edit');
		}
		// list report
		$list = '';
		
		$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_kham` WHERE `cmnd` = '" . $row['cmnd'] . "'";
		$result = $db->sql_query ($query);
		
		while ($res = $db->sql_fetchrow($result)) {
			// get Doctor's cmnd
			$cmndDoctor = getDoctorCMND($res['nguoikham']);
			
			// get Doctor's full name
			$query = "SELECT * FROM `" . NV_USERS_GLOBALTABLE . "` WHERE `username` = '" . $res['nguoikham'] . "'";
			$resDoctor = $db->sql_query ($query);
			$rowDoctor = $db->sql_fetchrow($resDoctor);
			$nameDoctor = $rowDoctor['full_name'];
			
			if ($res['dinhkem'] == '') $file = "<td></td>";
			else $file = "<td><a href='" . NV_BASE_SITEURL . $res['dinhkem'] . "'>Download</a></td>";
			$forward_form = 'javascript:forward2Form(' . $cmndDoctor .')';
			$edit_form = 'javascript:forward2EditForm(' . $res['id'] .')';
			$list .= "<tr>
						<td>" . nv_date('d/m/Y', $res['ngaykham']) . "</td>
						<td>" . $res['khambenh'] . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['chandoan'])) . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['ketluan'])) . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['donthuoc'])) . "</td>
						<td>" . Markdown(nv_unhtmlspecialchars($res['ghichu'])) . "</td>"
						. $file .
						"<td><a href='". $forward_form ."'>" . $nameDoctor . "</a></td>";
			if ( isDoctor($user_info['username'])){
				$list .= "<td><a href='" . $edit_form . "'>" . $lang_module['edit'] . "</a></td>";
			}
			$list .=	"</tr>";
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