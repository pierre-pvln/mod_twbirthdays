<?php 
/**
 * @package     mod_thisweeksbirthdays
 * @author      Pierre Veelen, www.pvln.nl
 * @copyright   Copyright (C) 2015 Pierre Veelen. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 *
 * @requires	Community Builder 1.9
 */
 
defined('_JEXEC') or die;

/* Include dependencies; include helper.php */
	require_once __DIR__ . '/helper.php';

/**
 * Retrieve Community Builder database data in $list
 *
 * @params	An object containing the module parameters as set in the back-end for the module;
 * 			Not used in this one yet (for future use).
 *
 */
	$list = ModThisWeeksBirthdaysHelper::getItems($params);
 	
/**
 * Get layout values from back-end setting tab advanced in $params 
 * This retrieves the 'layout' parameter. Note the second part
 * which states to use a default value of 'default' if the parameter 'layout' cannot be
 * retrieved for some reason
 * 
 */
	$layout = $params->get('layout','default');

	
/**
 * This method returns the path to the layout file for the module.
 * Output depends if the layout has not been overridden or not. 
 * 
 */
	require JModuleHelper::getLayoutpath('mod_thisweeksbirthdays', $layout);
	
?>
