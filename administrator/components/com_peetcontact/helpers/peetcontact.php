<?php
/**
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Contact component helper.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_contact
 * @since		1.6
 */
class PeetcontactHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	$vName	The name of the active view.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public static function addSubmenu($vName = 'peetcontact')	// this param determines what view is active
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_PEETCONTACT_SUBMENU_MESSAGES'),
			'index.php?option=com_peetcontact',
			$vName == 'peetcontact'								//  <--
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_PEETCONTACT_SUBMENU_SETTINGS'),
			'index.php?option=com_peetcontact&view=form',
			$vName == 'form'									//	<--
		);

		$name = ($vName=='peetcontact') ? JText::_('COM_PEETCONTACT_SUBMENU_MESSAGES') : JText::_('COM_PEETCONTACT_SUBMENU_SETTINGS');

			JToolBarHelper::title(JText::_(sprintf(JText::_('COM_PEETCONTACT'), JText::_($name))));
		
	}
}
