<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if (!defined('NV_SYSTEM')) die('Stop!!!');

$allow_func = array('main', 'search', 'view', 'crebook', 'examine'); 

define('NV_IS_MOD_EMREPORT', true);

$get_array = explode('-',isset($array_op[0]) ? $array_op[0] : '');
$Lfunc = (isset($get_array[0])) ? $get_array[0] : 0;
$Lname = (isset($get_array[1])) ? ($get_array[1]) : 0;

?>