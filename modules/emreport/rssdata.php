<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 01 Jul 2012 09:38:33 GMT
 */

if ( ! defined( 'NV_IS_MOD_RSS' ) ) die( 'Stop!!!' );

$rssarray = array();

/*$result2 = $db->sql_query( "SELECT catid, parentid, title, alias, numsubcat, subcatid FROM `" . NV_PREFIXLANG . "_" . $module_data . "_cat` ORDER BY weight,`order`" );
while ( list( $catid, $parentid, $title, $alias, $numsubcat, $subcatid ) = $db->sql_fetchrow( $result2 ) )
{
    $rssarray[$catid] = array( 
        'catid' => $catid, 'parentid' => $parentid, 'title' => $title, 'alias' => $alias, 'numsubcat' => $numsubcat, 'subcatid' => $subcatid, 'link' => NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_title . "&amp;" . NV_OP_VARIABLE . "=rss/" . $alias 
    );
}*/

?>