<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_emreport`";

$sql_create_module = $sql_drop_module;


$sql_create_module[] = "
CREATE TABLE IF NOT EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_emreport` (
  `cmnd` int(11) NOT NULL DEFAULT,
  `ten` varchar(40) NOT NULL DEFAULT '',
  `benhan` varchar(255) NOT NULL DEFAULT '',  
  PRIMARY KEY (`cmnd`)
)";

?>