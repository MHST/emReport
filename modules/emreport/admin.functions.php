<?php 

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' ); 

define( 'NV_IS_EMREPORT_ADMIN', true );

$submenu['user_add']=$lang_module['user_add'];
$submenu['doctor_add']=$lang_module['doctor_add'];

$allow_func = array(
    'main',
    'del',
    'user_add',
    'edit',
    'doctor_add');

function groupList()
{
    global $db;
    $query = "SELECT * FROM `" . NV_GROUPS_GLOBALTABLE . "` ORDER BY `weight`";
    $result = $db->sql_query($query);
    $groups = array();
    while ($row = $db->sql_fetchrow($result))
    {
        $groups[$row['group_id']] = $row;
    }
    return $groups;
}

?>