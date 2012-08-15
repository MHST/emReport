<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_benhnhan`";
$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bacsi`";
$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_benhan`";
$sql_drop_module[] = "DROP TABLE IF EXISTS `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_kham`";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_benhnhan` (
   `cmnd` int(20) NOT NULL,
   `ten` varchar(40) NOT NULL,
   PRIMARY KEY (`cmnd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

$sql_create_module[] = "CREATE TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_bacsi` (
   `cmnd` int(20) NOT NULL,
   `ten` varchar(40) NOT NULL,
   `khoa` varchar(40) NOT NULL,
   `trinhdo` varchar(20) NOT NULL,
   `ngaycapbang` int(15) NOT NULL,
   `mabenhvien` varchar(10) NOT NULL,
   PRIMARY KEY (`cmnd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

$sql_create_module[] = "CREATE TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_kham` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `cmnd` int(20) NOT NULL,
   `ngaykham` int(15) NOT NULL,
   `khambenh` varchar(100) NOT NULL,
   `chandoan` text,
   `ketluan` text,
   `donthuoc` text,
   `ghichu` text,
   `dinhkem` varchar(255) NOT NULL,
   `nguoikham` varchar(40) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

$sql_create_module[] = "CREATE TABLE `" . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_benhan` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `cmnd` int(20) NOT NULL,
   `tenbenh` varchar(255) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

?>