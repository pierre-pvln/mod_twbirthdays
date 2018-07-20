<?php 
/**
 * @package     mod_twbirthdays
 * @author      Pierre Veelen, www.pvln.nl
 * @copyright   Copyright (C) 2015 Pierre Veelen. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 *
 * @requires	Community Builder 1.9 
 */

 defined('_JEXEC') or die; ?>

<!-- Get the module class suffix-->
<div class="<?php echo $params->get("moduleclass_sfx");?>">

	<!-- Get the text to be displayd before the module-->
	<div> <?php echo $params->get("pretext");?> </div>

<!-- Display the birthday, name and team -->	
<?php
	
	if (count($list)) 
		{
		if ($params->get("listtype") == "0" )
			{
			$birthdayticker="";
			foreach ($list as $i => $item) :
				{
				/* Format date using "d M"
			 	 * d = Day of the month; two digits with leading zeros 
				 * M = A short textual representation of a month, three letter
			 	 *
			 	 * http://php.net/manual/en/function.date.php
			 	 */
				$birthdayticker = $birthdayticker."<b>".JHtml::_('date', $item->birthdate, JText::_("d M"))."</b>"." \n"
						  .$item->firstname." ".$item->middlename." ".$item->lastname." \n"
						  ."(".$item->team.")\n"
						  ."&nbsp;&nbsp;&nbsp;";
				}		
			endforeach;
			$birthdayticker = $birthdayticker."<b>".JText::_('MOD_TWBIRTHDAYS_CONGRATS')."</b> ";
			
			/* ticker text */
			echo "<marquee scrollamount=".$params->get("tickerscrollamount").">".$birthdayticker." </marquee>";
			}
		elseif ($params->get("listtype") == "1" )
			{
			$birthdaylist="";
			foreach ($list as $i => $item) :
				{
				/* Format date using "d M"
			 	 * d = Day of the month; two digits with leading zeros 
				 * M = A short textual representation of a month, three letter
			 	 *
			 	 * http://php.net/manual/en/function.date.php
			 	 */
				$birthdaylist = $birthdaylist."<b>".JHtml::_('date', $item->birthdate, JText::_("d M"))."</b> "."\n"
						.$item->firstname." ".$item->middlename." ".$item->lastname." \n"
						."(".$item->team.")\n"
						."</br>" ;	
				}		
			endforeach;
			$birthdaylist = $birthdaylist."<b>".JText::_('MOD_TWBIRTHDAYS_CONGRATS')."</b> ";
			
			/* list text */
			echo $birthdaylist;
			}
		}	

	else /* no birthdays found in current week */
		{
		echo JText::_('MOD_TWBIRTHDAYS_NO_BIRTHDAYS');
		}	
?>
	
	<!-- Get the text to be displayd after the module-->	
	<div><?php echo $params->get("posttext");?></div>

</div>
