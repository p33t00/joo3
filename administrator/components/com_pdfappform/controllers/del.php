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

jimport('joomla.application.component.controlleradmin');

/**
 * @package     Peet.Administrator
 * @subpackage  com_peetcontact
 * @since       2.5
 */
class PdfappformControllerDel extends JControllerAdmin
{

	/*
	*	Override this method to get JModelAdmin instance since it has delete method
	*/

	public function getModel($name = 'Del', $prefix = 'PdfappformModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

	public function delete(&$pks)
	{
		parent::delete($pks);

		$this->setRedirect(JRoute::_('index.php?option=' . $this->option, false));
	}
}
