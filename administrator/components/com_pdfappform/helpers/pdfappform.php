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
 * @package		Peet.Administrator
 * @subpackage	com_pdfappform
 * @since		2.5
 */
class PdfappformHelper extends JHelperContent
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_PDFAPPFORM_SUBMENU_MESSAGES'),
			'index.php?option=com_pdfappform',
			$vName == 'pdfappform'	
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_PDFAPPFORM_SUBMENU_SETTINGS'),
			'index.php?option=com_pdfappform&view=message',
			$vName == 'message'
		);

		$name = ($vName=='pdfappform') ? JText::_('COM_PDFAPPFROM_SUBMENU_MESSAGES') : JText::_('COM_PDFAPPFROM_SUBMENU_SETTINGS');

		JToolBarHelper::title(JText::_(sprintf(JText::_('COM_PDFAPPFORM'), JText::_($name))));
	}
}