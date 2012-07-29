<?php

/**
 * @Author Minh Hoang (tinhocminhhoang@gmail.com)
 * @createdate 28/10/2010
 */


if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "`";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "` (
   `cmnd` int(20) NOT NULL,
   `ten` varchar(40) NOT NULL,
   PRIMARY KEY (`cmnd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

?>