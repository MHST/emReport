<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

include 'check.php';
if ( ! isDoctor($user_info['username']) ) die( 'Stop!!!' );

$page_title = $lang_module['user_add'];
$_user = array();
$error = "";
if ($nv_Request->isset_request('confirm', 'post'))
{
    $_user['username'] = filter_text_input('username', 'post', '', 1, NV_UNICKMAX);
    $_user['cmnd'] = filter_text_input('cmnd', 'post', '', 1, 255);
    $_user['password'] = filter_text_input('password', 'post', '', 0, NV_UPASSMAX);
    $_user['email'] = filter_text_input('email', 'post', '', 1, 100);
    $_user['full_name'] = filter_text_input('full_name', 'post', '', 1, 255);
    $_user['gender'] = filter_text_input('gender', 'post', '', 1, 1);
    $_user['location'] = filter_text_input('location', 'post', '', 1);
    $_user['birthday'] = filter_text_input('birthday', 'post', '', 1, 10);
    $_user['question'] = "";
    $_user['answer'] = "";
    $_user['view_mail'] = 0;
    
    if (($error_username = nv_check_valid_login($_user['username'], NV_UNICKMAX,
        NV_UNICKMIN)) != "")
    {
        $error = $error_username;
    } elseif ($_user['username'] != $db->fixdb($_user['username']))
    {
        $error = sprintf($lang_module['account_deny_name'], '<strong>' . $_user['username'] .
            '</strong>');
    } elseif ($_user['email'] != "" && ($error_xemail = nv_check_valid_email($_user['email'])) != "")
    {
        $error = $error_xemail;
    } elseif ($db->sql_numrows($db->sql_query("SELECT `userid` FROM `" .
    NV_USERS_GLOBALTABLE . "` WHERE `md5username`=" . $db->dbescape(md5($_user['username'])))) !=
        0)
    {
        $error = $lang_module['edit_error_username_exist'];
    } elseif ($_user['email'] != "" && $db->sql_numrows($db->sql_query("SELECT `userid` FROM `" .
    NV_USERS_GLOBALTABLE . "` WHERE `email`=" . $db->dbescape($_user['email']))) !=
        0)
    {
        $error = $lang_module['edit_error_email_exist'];
    } elseif ($_user['email'] != "" && $db->sql_numrows($db->sql_query("SELECT `userid` FROM `" .
    NV_USERS_GLOBALTABLE . "_reg` WHERE `email`=" . $db->dbescape($_user['email']))) !=
        0)
    {
        $error = $lang_module['edit_error_email_exist'];
    } elseif ($_user['email'] != "" && $db->sql_numrows($db->sql_query("SELECT `userid` FROM `" .
    NV_USERS_GLOBALTABLE . "_openid` WHERE `email`=" . $db->dbescape($_user['email']))) !=
        0)
    {
        $error = $lang_module['edit_error_email_exist'];
    } elseif (empty($_user['cmnd']))
    {
        $error = $lang_module['edit_error_cmnd_empty'];
    } elseif ($db->sql_numrows($db->sql_query("SELECT `id` FROM `" .
    NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `cmnd`=" . $db->dbescape(($_user['cmnd'])))) !=
        0)
    {
        $error = $lang_module['edit_error_cmnd_exist'];
    } elseif (empty($_user['full_name']))
    {
        $error = $lang_module['edit_error_full_name'];
    } elseif (empty($_user['birthday']))
    {
        $error = $lang_module['edit_error_birthday'];
    } elseif (empty($_user['location']))
    { 
        $error = $lang_module['edit_error_location'];
    }
    
    
    else
    {
        if ($_user['gender'] != "M" and $_user['gender'] != "F")
        {
            $_user['gender'] = "";
        }
        if (preg_match("/^([0-9]{1,2})\.([0-9]{1,2})\.([0-9]{4})$/", $_user['birthday'],
            $m))
        {
            $_user['birthday'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
        } else
        {
            $_user['birthday'] = 0;
        }
        $password = $crypt->hash($_user['password']);
        $sql = "INSERT INTO `" . NV_USERS_GLOBALTABLE . "` (
        	`userid`, `username`, `md5username`, `password`, `email`, `full_name`, `gender`, `birthday`, `regdate`,
        		`location`, `question`, `answer`, `passlostkey`, `view_mail`,
        	`remember`, `active`, `checknum`, `last_login`, `last_ip`, `last_agent`, `last_openid`)
        		VALUES(NULL, " . $db->dbescape($_user['username']) . "," . $db->dbescape(md5($_user['username'])) .
            "," . $db->dbescape($password) . "," . $db->dbescape($_user['email']) .
            	"," . $db->dbescape($_user['full_name']) . "," . $db->dbescape($_user['gender']) .
            "," . $_user['birthday'] . "," . NV_CURRENTTIME . "," . $db->dbescape($_user['location']) . 
            	"," . $db->dbescape($_user['question']) . "," . $db->dbescape($_user['answer']) . ",'', " . $_user['view_mail'] .
            ", 1, 1, '', 0, '', '', '')";
            	
        $userid = $db->sql_query_insert_id($sql);
        
        // them benh nhan
        $query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` (`cmnd`, `ten`) VALUES ('". $_user['cmnd'] . "', '" . $_user['username'] . "')";
		$db->sql_query($query);
        
        if ($userid)
        {
            nv_insert_logs(NV_LANG_DATA, $module_name, 'log_add_user', "userid " . $userid,
                $user_info['userid']);
            
            Header("Location: " . NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" .
                $module_name);
            exit();
        }
        $error = $lang_module['edit_add_error'];
    }
} else
{
    $_user['username'] = $_user['cmnd'] = $_user['email'] = $_user['question'] = $_user['answer'] = "";
    $_user['full_name'] = $_user['gender'] = $_user['location'] = $_user['birthday'] = "";
    $_user['view_mail'] = 0;
    $_user['password'] = nv_genpass($length = 8);
}

if($_user['birthday'] != "") 
	$_user['birthday'] = nv_date('d.m.Y', $_user['birthday']);
	
$genders = array(
    'N' => array(
        'key' => 'N',
        'title' => $lang_module['NA'],
        'selected' => ''),
    'M' => array(
        'key' => 'M',
        'title' => $lang_module['male'],
        'selected' => $_user['gender'] == "M" ? " selected=\"selected\"" : ""),
    'F' => array(
        'key' => 'F',
        'title' => $lang_module['female'],
        'selected' => $_user['gender'] == "F" ? " selected=\"selected\"" : ""));

$xtpl = new XTemplate("user_add.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] .
    "/modules/". $module_name);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('DATA', $_user);
$xtpl->assign('FORM_ACTION', NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=creuser");
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
if (!empty($error))
{
    $xtpl->assign('ERROR', $error);
    $xtpl->parse('main.error');
}

foreach ($genders as $gender)
{
    $xtpl->assign('GENDER', $gender);
    $xtpl->parse('main.add_user.gender');
}
$xtpl->parse('main.add_user');

$xtpl->parse('main');
$contents = $xtpl->text('main');
$my_head = "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL .
    "js/popcalendar/popcalendar.js\"></script>\n";

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>