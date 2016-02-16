<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * @package     Peet.Administrator
 * @subpackage  com_peetcontact
 * @since       2.5
 */
class PdfappformControllerEdit extends JControllerForm
{

	public function save($key = null, $urlVar = null)
	{
		parent::save();
		$this->setRedirect(JRoute::_('index.php?option=' . $this->option, false));
	}
}
