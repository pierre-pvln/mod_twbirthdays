<?php 
/**
 * @package     mod_twbirthdays
 * @author      Pierre Veelen, www.pvln.nl
 * @copyright   Copyright (C) 2015 Pierre Veelen. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 *
 * @requires	Community Builder 1.9
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_twbirthdays
 */

abstract class ModTWBirthdaysHelper
{
    /**
     * The class ModTWBirthdaysHelper gets a list of Community Builder members who's birthday is in the current week
     *
     **/
	 
    public static function getItems(&$params)
    {
    	/**
    	 * Retrieves the Community Builder members who's birthday is in the current week
    	 * 
    	 * @params	An object containing the module parameters as set in the back-end for the module; 
    	 * 			Not used in this function yet (For future use). 
    	 * 
    	 * 			&$params: It's a pass by reference. 
    	 * 			The variable inside the function "points" to the same data as the variable from the calling context.	
    	 * 
    	 * @access	Public
    	 *
    	 **/
    	
		/* Get a db connection */
		$db = JFactory::getDbo();

		/* Create a new query object. */
		$query = $db->getQuery(true);

		/* Create the query to select the required records */
		$query =  "SELECT `firstname`,`middlename`,`lastname`,DATE_FORMAT(`cb_geboortedatum` ,'%e %b') as birthdate, `cb_voluntasteam` as team \n"
				. "FROM #__comprofiler \n"
				. "WHERE WEEK(STR_TO_DATE((CONCAT(DATE_FORMAT(`cb_geboortedatum`,'%e %b'), YEAR(CURRENT_DATE))),'%e %b %Y')) = WEEK(CURRENT_DATE) \n"
				. "AND `cb_voluntaslidactief` = \"Ja\" \n"
				. "ORDER BY DATE_FORMAT(`cb_geboortedatum`,'%e %b') ASC"
			    ;
			
		/* Reset the query using our newly populated query object. */
		$db->setQuery($query);
	 
		/* Returns an indexed array of PHP objects from the table records returned by the query. */ 
		$list = $db->loadObjectList();

		return $list;
    }
}
?>
