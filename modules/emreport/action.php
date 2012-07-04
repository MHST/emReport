<?php

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_emreport`";

$sql_create_module = $sql_drop_module;


$sql_create_module[] = "
CREATE TABLE IF NOT EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_emreport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmnd` int(11) NOT NULL DEFAULT,
  `ten` varchar(40) NOT NULL DEFAULT '',
  `benhan` varchar(255) NOT NULL DEFAULT '',  
  PRIMARY KEY (`id`)
)";

?>